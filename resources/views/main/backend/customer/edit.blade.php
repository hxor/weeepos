@extends('layouts.backend.app')

@section('content')
	<div class="container">
		@include('layouts.backend.partials._bread', ['data' => empty($bread) ? '' : $bread])

        <div class="row">
			<div class="col-lg-6">
				<div class="card-box">
					<h4 class="m-t-0 header-title"><b>Edit Customer</b></h4>
					<p class="text-muted font-13 m-b-30">
	                    Edit Data Customer
	                </p>

					{!! Form::model($customer, ['route' => ['admin.customer.update', $customer->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
				        @include('main.backend.customer._form')	
				    {!! Form::close() !!}     
					
				</div>
			</div>
		</div>
	</div>
@stop