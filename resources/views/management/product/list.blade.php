@php
$name = trans('messages.canteen');
@endphp

@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 col-md-6">
	<div class="card">
		<div class="card-header card-header-info">
			<h4 class="card-title">{{ trans('messages.list_product') }}</h4>
			<p class="card-category">{{ trans('messages.list_product_text_01') }}</p>
		</div>
		<div class="card-body">
			<div class="card-body table-responsive">
				<table id="tableListProduct" class="table table-hover">
					<thead class="text-warning">
						<tr>
							<th>ID</th>
							<th>Tipo</th>
							<th>Preço</th>
							<th>Status</th>
							<th>Descrição</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Dakota Rice</td>
							<td>$36,738</td>
							<td>Niger</td>
							<td>Niger</td>
							<td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-white btn-link btn-sm" data-original-title="Editar produto" data-toggle="modal" data-target="#updateProductModal">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" class="btn btn-white btn-link btn-sm" data-original-title="Deletar produto" data-toggle="modal" data-target="#deleteProductModal">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
						</tr>
					</tbody>
				</table>
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

	@include('management.modals.delete_product')
	@include('management.modals.update_product')
</div>
@endsection