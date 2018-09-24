<?php $name = trans('messages.begin') ?>
@extends('layouts.management.master')

@section('content')
 <div class="container-fluid">
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
  <div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">unarchive</i>
          </div>
          <p class="card-category">{{ trans('messages.solds') }}</p>
          <h3 class="card-title">5000 u.</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">date_range</i> {{ trans('messages.last_24_hours') }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">archive</i>
          </div>
          <p class="card-category">{{ trans('messages.entering') }}</p>
          <h3 class="card-title">$34,245</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">date_range</i> {{ trans('messages.last_24_hours') }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="fas fa-exchange-alt"></i>
          </div>
          <p class="card-category">{{ trans('messages.exchanges') }}</p>
          <h3 class="card-title">75</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">date_range</i> {{ trans('messages.last_24_hours') }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="fas fa-coins"></i>
          </div>
          <p class="card-category">{{ trans('messages.transactions') }}</p>
          <h3 class="card-title">245</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">date_range</i> {{ trans('messages.last_24_hours') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection