@php
$name = trans('messages.canteen');
@endphp

@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 col-md-6">
	<div class="card">
		<div class="card-header card-header-info">
			<h4 class="card-title">{{ trans('messages.add_product') }}</h4>
			<p class="card-category">{{ trans('messages.add_product_text_01') }}</p>
		</div>
		<div class="card-body">
			<form id="addProductForm">
				<div class="input-group col-md-6 mt-3">
					<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="material-icons">category</i>
				    	</span>
				    </div>
	                <div class="form-group bmd-form-group">
	                 	<label class="bmd-label-floating">{{ trans('messages.type') }}</label>
	                 	<input name="type" type="text" class="form-control"/>
	                </div>
	            </div>
	            <div class="input-group col-md-6 mt-3">
					<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="material-icons">description</i>
				    	</span>
				    </div>
	                <div class="form-group bmd-form-group">
	                 	<label class="bmd-label-floating">{{ trans('messages.description') }}</label>
	                 	<input name="description" type="text" class="form-control"/>
	                </div>
	            </div>
				<div class="input-group col-md-6 mt-3">
					<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="material-icons">attach_money</i>
				    	</span>
				    </div>
	                <div class="form-group bmd-form-group">
	                 	<label class="bmd-label-floating">{{ trans('messages.value') }}</label>
                     	<input name="value" class="form-control" type="text">
	                </div>
	            </div>
	            <div class="input-group col-md-6 mt-3">
	            	<div class="input-group-prepend">
				    	<span class="input-group-text">
				        	<i class="material-icons">local_offer</i>
				    	</span>
				    </div>
				    <div class="form-group bmd-form-group">
                     	<label class="bmd-label-floating">{{ trans('messages.status') }}</label>
                     	<div class="select">
						    <select id="selectStatus">
						    	<option value="Bom" selected="selected">Bom</option>
						    	<option value="Ruim">Ruim</option>
						    </select>
						</div>
                    </div>
				</div>
	            <input name="owner" type="hidden" value="{{ sprintf("%06s", \Auth::user()->id) }}"/>
				<div class="float-sm-right">
					<button id="submitAddProduct" type="button" class="btn btn-info">{{ trans('messages.add') }}</button>
				</div>
			</form>

			@include('management.modals.progress')
		</div>
	</div>
@endsection

@push('scripts')

{{-- Script para adicionar um produto --}}
<script src="{{ asset('js/UUID.js') }}" type="text/javascript"></script>

{{-- Script para adicionar um produto --}}
<script src="{{ asset('js/views/management/product/add.js') }}"></script>

@endpush