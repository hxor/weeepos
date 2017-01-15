<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Point;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class CustomerController extends Controller
{
    private $bread;

    /**
     * Data For Breadcrumbs
     */
    public function __construct()
    {
        $this->bread = [
          'page-title' => 'Customers',
          'menu' => 'Data',
          'submenu' => 'Customers',
          'active' => 'All Posts'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        $bread = $this->bread;
        $customer = new Collection;
        if ($request->ajax()) {
            $customers = Customer::all();
            foreach ($customers as $data) {
                $customer->push([
                    'id' => $data->id,
                    'code' => $data->code,
                    'name' => $data->name,
                    'phone' => $data->phone,
                ]);
            }
            return Datatables::of($customer)
                    ->addColumn('action', function($customer){
                        return view('layouts.backend.partials.datatable._action', [
                            'model' => $customer,
                            'form_url' => route('admin.customer.destroy', $customer['id']),
                            'edit_url' => route('admin.customer.edit', $customer['id']),
                            'show_url' => route('admin.customer.show', $customer['id'])
                        ]);
                    })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID'])
            ->addColumn(['data' => 'code', 'name' => 'code', 'title' => 'Kode'])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama'])
            ->addColumn(['data' => 'phone', 'name' => 'phone', 'title' => 'Telepon'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>'false']);

        return view('main.backend.customer.index', compact('bread', 'html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code = randint();
        return view('main.backend.customer.create', compact('code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'code' => 'required|unique:customers',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        if (Customer::where('code', $request->code)->exists()) {
            notify()->flash('Gagal!', 'error', [
                'timer' => 3000,
                'text' => 'Code ID sudah terdaftar',
            ]);
            return back()->withInput($request->except('code'));   
        }
        Customer::create($request->all());
        notify()->flash('Berhasil!', 'success', [
            'timer' => 1500,
            'text' => 'Customers berhasil ditambah'
        ]);
        return redirect()->route('admin.customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        $point = Point::where('customer_id', $id)->orderBy('id','desc')->get();
        $balance = Point::where('customer_id', $id)->orderBy('id','desc')->first();
        return view('main.backend.customer.show', compact('customer', 'point', 'balance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $code = $customer->code;
        return view('main.backend.customer.edit', compact('customer', 'code'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'code' => 'required|unique:customers,code,'.$id,
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        notify()->flash('Berhasil!', 'success', [
            'timer' => 1500,
            'text' => 'Customers berhasil diubah'
        ]);
        return redirect()->route('admin.customer.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Customer::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Customer successfully deleted',
        ]);

        return redirect()->route('admin.customer.index');
    }
}
