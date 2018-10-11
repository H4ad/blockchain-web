@php
$name = trans('messages.transactions');
@endphp

@extends('layouts.management.master')

@push('css')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">
@endpush

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
				<table id="tableListProduct"
					data-locale="{{ \App::getLocale() }}"
					data-pagination="true"
					data-search="true"
					data-toggle="table"
					data-classes="table table-no-bordered">
					<thead>
						<tr>
							<th data-field="transactionTimestamp">Horário</th>
							<th data-field="transactionType">Tipo de entidade</th>
						</tr>
					</thead>
				</table>

				@include('management.modals.progress')
				@include('management.modals.view_record')
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')

{{-- Lista as informações das transações --}}
<script src="{{ asset('js/views/management/blockchain/getTransactions.js') }}"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

{{-- Traduções --}}
<script src="{{ asset('js/localization/bootstrap-table-en-US.js') }}"></script>
<script src="{{ asset('js/localization/bootstrap-table-pt-BR.js') }}"></script>
@endpush