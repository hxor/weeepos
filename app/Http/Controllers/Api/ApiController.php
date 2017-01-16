<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Point;
use App\Models\Reward;
use Validator;

class ApiController extends Controller
{
    public function doLogin(Request $request){
    	$v = Validator::make($request->all(),[
    		'code' => 'required',
    		'phone' => 'required'
    	]);
    	if ($v->fails()) {
    		return response()->json([
    			'status' => false,
    			'message' => $v->getMessageBag()->toArray()
    		]);
    	}
    	try {
    		if (Customer::where('code', $request->code)->where('phone', $request->phone)->exists()) {
    			$customer = Customer::where('code', $request->code)->first();
                if (!Point::where('customer_id', $customer->id)->exists()) {
                    $data = [
                        'customer' => $customer,
                        'point' => [],
                        'balance' => 0
                    ];
                    return response()->json([
                        'status' => true,
                        'message' => 'Akun belum memiliki Point',
                        'data' => $data
                    ]);
                }
                $point = Point::where('customer_id', $customer->id)->get();
                $balance = Point::where('customer_id', $customer->id)->orderBy('id', 'desc')->select('point_balance')->first();
                $data = [
                    'customer' => $customer,
                    'point' => $point,
                    'balance' => $balance->point_balance
                ];
                return response()->json([
                    'status' => true,
                    'message' => 'berhasil',
                    'data' => $data
                ]);
    		}
    		return response()->json([
    			'status' => false,
    			'message' => 'Tidak ada data pelanggan'
    		]);
    	} catch (Exception $e) {
    		return response()->json([
                'status' => false,
                'message' => 'System gagal'
            ]);
    	}
    }

    public function showReward(){
        $reward = Reward::all();
        if (count($reward) == 0) {
            return response()->json([
                'status' => false,
                'message' => 'Belum ada reward',
            ]);
            
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil',
                'data' => $reward
            ]);
        }
    }
}
