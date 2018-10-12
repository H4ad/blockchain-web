@php
$name = trans('messages.canteen');
@endphp

@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 col-md-6">
	<div class="card">
		<div class="card-header card-header-info">
			<h4 class="card-title">{{ trans('messages.quality') }}</h4>
			<p class="card-category">{{ trans('messages.quality_product_text_01') }}</p>
		</div>
		<div class="card-body">
			<form id="qualityForm">
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
	                 	<label class="bmd-label-floating">{{ trans('messages.identity_of_quality_expired') }}</label>
	                 	<input name="product_expired" type="text" class="form-control mr-5"/>
	                </div>
	            </div>
				<div class="input-group col-md-6 mt-3">
					<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="fas fa-boxes"></i>
				    	</span>
				    </div>
	                <div class="form-group bmd-form-group">
	                 	<label class="bmd-label-floating">{{ trans('messages.identity_of_stock_expired') }}</label>
	                 	<input name="stock_expired" type="text" class="form-control mr-5"/>
	                </div>
	            </div>
	            <hr/>
	            <div class="input-group col-md-6 mt-3">
					<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="fas fa-fingerprint"></i>
				    	</span>
				    </div>
	                <div class="form-group bmd-form-group">
	                 	<label class="bmd-label-floating">{{ trans('messages.identity_of_product_to_post') }}</label>
	                 	<input name="product" type="text" class="form-control mr-5"/>
	                 	<small id="passwordHelpBlock" class="form-text text-muted">{!! trans('messages.quality_product_text_02') !!}</small>
	                </div>
	            </div>
	            <input name="seller" type="hidden" value="{{ sprintf("%06s", \Auth::user()->id) }}"/>
				<div class="float-sm-right">
					<button id="submitQuality" type="button" class="btn btn-info">{{ trans('messages.quality') }}</button>
				</div>
			</form>

			@include('management.modals.progress')
		</div>
	</div>
@endsection

@push('scripts')

{{-- Script para adicionar um produto --}}
<script src="{{ asset('js/views/management/product/quality.js') }}"></script>

@endpush