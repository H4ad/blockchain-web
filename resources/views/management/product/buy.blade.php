@php
$name = trans('messages.canteen');
@endphp

@extends('layouts.management.master')

@section('content')
<div class="col-lg-12">
	<div class="card">
		<div class="card-header card-header-info">
			<h4 class="card-title">{{ trans('messages.buy_product') }}</h4>
			<p class="card-category">{{ trans('messages.buy_product_text_01') }}</p>
		</div>
		<div class="card-body">
			<form id="buyForm">
				<div class="input-group col-md-6 mt-3">
					<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="fas fa-store"></i>
				    	</span>
				    </div>
	                <div class="form-group bmd-form-group">
	                 	<label class="bmd-label-floating">{{ trans('messages.choose_product') }}</label>
	                 	<div class="select">
						    <select id="inputProductsOnBuyProduct" name="product">

						    </select>
						</div>
	                </div>
	            </div>
	            <div class="input-group col-md-6 mt-3">
	            	<div class="input-group-prepend mr-1">
				    	<span class="input-group-text">
				        	<i class="fas fa-sort-numeric-up"></i>
				    	</span>
				    </div>
				    <div class="form-group bmd-form-group">
                     	<label class="bmd-label-floating">{{ trans('messages.quantity') }}</label>
                     	<input name="quantity" class="form-control mr-5" type="number" value="1" min="1" max="9">
                    </div>
				</div>
				<div class="float-sm-right">
					<button id="submitBuy" type="button" class="btn btn-info">{{ trans('messages.buy') }}</button>
				</div>
			</form>

			@include('management.modals.progress')
		</div>
	</div>
@endsection

@push('scripts')

{{-- Script para adicionar um produto --}}
<script src="{{ asset('js/views/management/product/buy.js') }}"></script>

@endpush