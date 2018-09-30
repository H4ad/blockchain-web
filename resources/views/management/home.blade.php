<?php $name = trans('messages.begin') ?>
@extends('layouts.management.master')

@section('content')
<div class="container-fluid">
	@role('canteen')

	<div class="row">
		<div class="col-xl-4 col-lg-12">
			@include('management.charts.daily_sells')
		</div>

		<div class="col-xl-4 col-lg-12">
			@include('management.charts.users_subscriptions')
		</div>

		<div class="col-xl-4 col-lg-12">
			@include('management.charts.stock')
		</div>
	</div>

	@endrole

	@if(is_null(\Auth::user()->participant))

	<div id="cardDontHasParticipant">
		@include('management.cards.dont_has_participant')
	</div>

	@endif

	<div class="card">
		<div class="card-body">
			<h5>{{ trans('messages.welcome') }} {{ Auth::user()->name }}!</h5>
		</div>
	</div>

</div>
@endsection