@php
$name = trans('messages.canteen');
@endphp

@extends('layouts.management.master')

@section('content')
<div class="col-lg-12">
	<div class="card">
		<div class="card-header card-header-info">
			<h4 class="card-title">{{ trans('messages.exchange_product') }}</h4>
			<p class="card-category">{{ trans('messages.exchange_product_text_01') }}</p>
		</div>
		<div class="card-body">
			<form id="exchangeForm">
				<div class="input-group col-md-6 mt-3">
					<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="fas fa-id-card"></i>
				    	</span>
				    </div>
	                <div class="form-group bmd-form-group">
	                 	<label class="bmd-label-floating">{{ trans('messages.identity_of_student') }}</label>
	                 	<input name="student" type="text" class="form-control mr-5"/>
	                </div>
	            </div>
	            <div class="input-group col-md-6 mt-3">
					<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="fas fa-fingerprint"></i>
				    	</span>
				    </div>
	                <div class="form-group bmd-form-group">
	                 	<label class="bmd-label-floating">{{ trans('messages.identity_of_product_received') }}</label>
	                 	<input name="product_received" type="text" class="form-control mr-5"/>
	                </div>
	            </div>
	            <div class="input-group col-md-6 mt-3">
					<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="fas fa-shopping-bag"></i>
				    	</span>
				    </div>
	                <div class="form-group bmd-form-group">
	                 	<label class="bmd-label-floating">{{ trans('messages.product_gived') }}</label>
	                 	<input name="product_gived" type="text" class="form-control mr-5"/>
	                </div>
	            </div>
	            <input name="seller" type="hidden" value="{{ sprintf("%06s", \Auth::user()->id) }}"/>
				<div class="float-sm-right">
					<button id="submitExchange" type="button" class="btn btn-info">{{ trans('messages.exchange') }}</button>
				</div>
			</form>

			@include('management.modals.progress')
		</div>
	</div>
@endsection

@push('scripts')
{{-- Executa a transação--}}
<script src="{{ asset('js/views/management/product/exchange.js') }}" type="text/javascript"></script>
@endpush