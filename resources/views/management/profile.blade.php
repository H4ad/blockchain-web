@php
$name = trans('messages.profile');
@endphp

@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 col-md-6">
	<div class="card">
		<div class="card-header card-header-info">
			<h4 class="card-title">{{ trans('messages.profile_informations') }}</h4>
			<p class="card-category">{{ trans('messages.profile_informations_text_01') }}</p>
		</div>
		<div class="card-body">
			<form method="POST" action="{{ route('perfil') }}">
				<div class="input-group col-md-6 mt-3">
					<div class="form-group bmd-form-group">
		            	<label class="bmd-label-floating">{{ trans('messages.identifier') }}</label>
		            	<input name="identity" type="text" value="#0001" class="form-control" disabled>
		            </div>
				</div>
				<div class="input-group col-md-6 mt-3">
					<div class="form-group bmd-form-group">
		            	<label class="bmd-label-floating">{{ trans('messages.name') }}</label>
		            	<input name="name" type="text" value="{{ Auth::user()->name }}" class="form-control">
		            </div>
		            <div class="form-group bmd-form-group ml-3">
		            	<label class="bmd-label-floating">{{ trans('messages.email') }}</label>
		            	<input name="email" type="email" value="{{ Auth::user()->email }}" class="form-control">
		            </div>
		        </div>
				<div class="float-sm-right">
					<button type="submit" class="btn btn-info">{{ trans('messages.save_informations') }}</button>
				</div>
		    </form>
		</div>
	</div>
@endsection