@extends('layouts.backend.app')

@section('content')
	<div class="container">
		@include('layouts.backend.partials._bread', ['data' => empty($bread) ? '' : $bread])
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
	                <div class="panel-heading">
	                    <h2 class="panel-title">Detail Pelanggan</h2>
	                </div>
	                <div class="panel-body">
	                    <table class="table table-striped">
	                        <tbody>
	                        <tr>
	                            <th>ID</th>
	                            <td>{{ $customer->id }}</td>
	                            <th>Kode ID</th>
	                            <td>{!! $customer->code !!}</td>
	                            <th>Nama</th>
	                            <td>{{ $customer->name }}</td>
	                        </tr>
	                        <tr>
	                            <th>No. Telp</th>
	                            <td>{{ $customer->phone }}</td>
	                            <th>Alamat</th>
	                            <td>{{ $customer->address }}</td>
	                        </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
			</div>
		</div>

		@if (!count($point) == 0)
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Point</h2>
                        </div>
                        <p>
                            <a href="{{ route('admin.customer.point.create', $customer->id) }}" class="btn btn-primary">Tambah/Tukar Point</a>
                            <button class="btn btn-primary pull-right">Saldo: {{ $balance->point_balance }}</button>
                        </p>
                        <div class="panel-body">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Point In</th>
                                    <th>Point Out</th>
                                    <th>Point Balance</th>
                                </tr>
                                </thead>


                                <tbody>
                                @php $x = 0 @endphp
                                @foreach ($point as $data)
                                @php $x++ @endphp
                                    <tr>
                                        <td>{{ $x }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->point_in }}</td>
                                        <td>{{ $data->point_out }}</td>
                                        <td>{{ $data->point_balance }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Detail Point</h2>
                        </div>
                        <div class="panel-body">
                            <p>
                                <a href="{{ route('admin.customer.point.create', $customer->id) }}" class="btn btn-primary">Tambah/Tukar Point</a>
                            </p>
                            <p>Pelanggan belum memiliki point</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
	</div>
@stop