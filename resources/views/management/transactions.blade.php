@php
$name = trans('messages.transactions');
@endphp

@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 col-md-6">

	@role('canteen')

		<div class="row">

			@include('management.cards.products_solds')
			@include('management.cards.money_entering')
			@include('management.cards.products_exchangeds')
			@include('management.cards.number_transactions')

		</div>

	@endrole

	<div class="card">
		<div class="card-header card-header-info">
			<h4 class="card-title">{{ trans('messages.list_transactions') }}</h4>
			<p class="card-category">{{ trans('messages.list_transactions_text_01') }}</p>
		</div>
		<div class="card-body">
			<div class="card-body table-responsive">
				<table id="tableListProduct" class="table table-hover">
					<thead class="text-warning">
						<tr>
							<th>Horário</th>
							<th>Tipo de entidade</th>
							<th>Participante</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>2018-09-22, 12:54:45</td>
							<td>AddParticipant</td>
							<td>none</td>
							<td>
				                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewRecordModal">{{ trans('messages.view_record') }}</button>
				            </td>
						</tr>
					</tbody>
				</table>

				@include('management.modals.view_record')
			</div>
			<nav>
				<ul class="pagination justify-content-center">
					<li class="page-item">
						<a class="page-link" href="#" tabindex="-1">{!! trans('pagination.previous') !!}</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">{!! trans('pagination.next') !!}</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
@endsection