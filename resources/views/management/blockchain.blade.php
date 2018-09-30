@php
$name = trans('messages.blockchain_informations');
@endphp

@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 col-md-6">
	<div class="card">
		<div class="card-header card-header-info">
			<h4 class="card-title">{{ trans('messages.blockchain_informations') }}</h4>
			<p class="card-category">{{ trans('messages.blockchain_informations_text_01') }}</p>
		</div>
		<div class="card-body">
			@if (session('success'))
			    <div class="alert alert-success">
			        {{ session('success') }}
			    </div>
			@endif

			@if (session('failed'))
			    <div class="alert alert-danger">
			        {{ session('failed') }}
			    </div>
			@endif
		</div>
	</div>
@endsection