@php
$name = trans('messages.canteen');
@endphp

@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 col-md-6">
	<div class="card">
		<div class="card-header card-header-info">
			<h4 class="card-title">{{ trans('messages.to_reverse_product') }}</h4>
			<p class="card-category">{{ trans('messages.to_reverse_product_text_01') }}</p>
		</div>
		<div class="card-body">
			<form id="toReverseForm">
				<div class="input-group col-md-6 mt-3">
					<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="fas fa-id-card"></i>
				    	</span>
				    </div>
	                <div class="form-group bmd-form-group">
	                 	<label class="bmd-label-floating">{{ trans('messages.identity_of_student') }}</label>
	                 	<input name="student" type="text" class="form-control"/>
	                </div>
	            </div>
	            <div class="input-group col-md-6 mt-3">
					<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="fas fa-fingerprint"></i>
				    	</span>
				    </div>
	                <div class="form-group bmd-form-group">
	                 	<label class="bmd-label-floating">{{ trans('messages.identity_of_reversed_product') }}</label>
	                 	<input name="reversed_product" type="text" class="form-control mr-5"/>
	                </div>
	            </div>

	           <input name="seller" type="hidden" value="{{ sprintf("%06s", \Auth::user()->id) }}"/>
				<div class="float-sm-right">
					<button id="submitToReverse" type="button" class="btn btn-info">{{ trans('messages.to_reverse') }}</button>
				</div>
			</form>

			@include('management.modals.progress')
		</div>
	</div>
@endsection

@push('scripts')
{{-- Script para realizar o estorno --}}
<script src="{{ asset('js/views/management/product/to_reverse.js') }}"></script>
@endpush