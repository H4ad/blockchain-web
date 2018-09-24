{{ $name = trans('errors.title_page') }}
@extends('layouts.management.master')

@section('content')
<div class="main_container">
  <!-- page content -->
  <div class="col-md-12">
    <div class="col-middle">
      <div class="text-center text-center">
        <h1 class="error-number">403</h1>
        <h2>{{ trans('errors.403.title') }}</h2>
        <p>{{ trans('errors.403.message') }}</p>
      </div>
    </div>
  </div>
  <!-- /page content -->
</div>
@endsection