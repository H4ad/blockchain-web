<div class="card card-chart">
  <div class="card-header card-header-danger">
    <div class="ct-chart" id="stockInformationChart"></div>
  </div>
  <div class="card-body">
    <h4 class="card-title">{{ trans('messages.stock_information') }}</h4>
    <p id="stockInformationChartMessage" class="card-category">{{ trans('messages.dont_have_information') }}</p>
  </div>
  <div class="card-footer">
    <div class="stats">
      <i class="material-icons">access_time</i>
      <p id="stockInformationChartLastUpdate"> {{ trans('messages.dont_have_information') }}</p>
    </div>
  </div>
</div>

@push('scripts')
<script src="{{ asset('js/views/management/home/loadStockInformationChart.js') }}"></script>
@endpush