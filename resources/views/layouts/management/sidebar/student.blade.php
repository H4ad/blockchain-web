<li class="nav-item">
  <a class="nav-link" data-target="#list_canteen" data-toggle="collapse">
    <i class="material-icons">store</i>
    <p>{{ trans('messages.canteen') }}</p>
  </a>
  <div class="collapse pt-3 {{ (Request::is('cantina/*')) ? 'show' : '' }}" id="list_canteen">
    <ul>
      <li class="nav-item {{ (Request::is('cantina/comprar')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('comprar') }}">
          <p {{ (Request::is('cantina/comprar')) ? 'class=text-white' : '' }}>
            {{ trans('messages.buy_product') }}
          </p>
        </a>
      </li>
    </ul>
  </div>
</li>