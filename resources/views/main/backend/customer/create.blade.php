@extends('layouts.backend.app')

@section('content')
	<div class="container">
		@include('layouts.backend.partials._bread', ['data' => empty($bread) ? '' : $bread])

        <div class="row">
			<div class="col-lg-6">
				<div class="card-box">
					<h4 class="m-t-0 header-title"><b>Tambah Customer</b></h4>
					<p class="text-muted font-13 m-b-30">
	                    Tambah Data Customer
	                </p>
	                       
	                {!! Form::open(['method' => 'POST', 'route' => 'admin.customer.store', 'class' => 'form-horizontal']) !!}
						@include('main.backend.customer._form')				
					{!! Form::close() !!}     
					
				</div>
			</div>
		</div>
	</div>
@stop