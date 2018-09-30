<div class="card card-chart">
  <div class="card-header card-header-warning">
    <div class="ct-chart" id="userSubscriptionsViewChart"></div>
  </div>
  <div class="card-body">
    <h4 class="card-title">{{ trans('messages.users_subscriptions') }}</h4>
    <p id="userSubscriptionsViewChartMessage" class="card-category">{{ trans('messages.dont_have_information') }}</p>
  </div>
  <div class="card-footer">
    <div class="stats">
      <i class="material-icons">access_time</i>
      <p id="userSubscriptionsViewChartLastUpdate">{{ trans('messages.dont_have_information') }}</p>
    </div>
  </div>
</div>

@push('scripts')
<script src="{{ secure_asset('js/views/management/home/loadUserSubscriptionsChart.js') }}"></script>
@endpush