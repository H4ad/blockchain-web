<div class="card card-chart">
  <div class="card-header card-header-success">
    <div class="ct-chart" id="dailySalesChart"></div>
  </div>
  <div class="card-body">
    <h4 class="card-title">{{ trans('messages.daily_sells') }}</h4>
    <p id="dailySalesChartMessage" class="card-category">{{ trans('messages.dont_have_information') }}</p>
  </div>
  <div class="card-footer">
    <div class="stats">
      <i class="material-icons">access_time</i>
      <p id="dailySalesChartLastUpdate">{{ trans('messages.dont_have_information') }}</p>
    </div>
  </div>
</div>

@push('scripts')
<script src="{{ asset('js/views/management/home/loadDailyCharts.js') }}"></script>
@endpush