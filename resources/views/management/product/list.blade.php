@php
$name = trans('messages.canteen');
@endphp

@extends('layouts.management.master')

@push('css')
{{-- Identificação do usuário --}}
<meta name="participant_id" content="{{ sprintf("%06s", \Auth::user()->id) }}">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">
@endpush

@section('content')
<div class="col-lg-12 col-md-6">
	<div class="card">
		<div class="card-header card-header-info">
			<h4 class="card-title">{{ trans('messages.list_product') }}</h4>
			<p class="card-category">{{ trans('messages.list_product_text_01') }}</p>
		</div>
		<div class="card-body">
			<div class="card-body table-responsive">
				<table id="table"
					data-locale="{{ \App::getLocale() }}"
					data-toolbar="#toolbar"
					data-search="true"
					data-show-columns="true"
					data-show-export="true"
					data-minimum-count-columns="2"
					data-pagination="true"
					data-id-field="ProdutoId"
					data-page-list="[10, 25, 50, 100, ALL]"
					data-classes="table table-no-bordered"
       				data-response-handler="responseHandler">
				</table>

				@include('management.modals.progress')
			</div>
		</div>
	</div>

	@include('management.modals.delete_product')
	@include('management.modals.update_product')
</div>
@endsection

@push('scripts')

{{-- Lista as informações das transações --}}
<script src="{{ asset('js/views/management/product/list.js') }}"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

{{-- Traduções --}}
<script src="{{ asset('js/localization/bootstrap-table-en-US.js') }}"></script>
<script src="{{ asset('js/localization/bootstrap-table-pt-BR.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/extensions/export/bootstrap-table-export.min.js"></script>
<script src="//rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
@endpush