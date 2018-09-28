 <li class="nav-item">
  <a class="nav-link" data-target="#list_canteen" data-toggle="collapse">
    <i class="material-icons">store</i>
    <p>{{ trans('messages.canteen') }}</p>
  </a>
  <div class="collapse pt-3 {{ (Request::is('cantina/*')) ? 'show' : '' }}" id="list_canteen">
    <ul>
      <li class="nav-item {{ (Request::is('cantina/trocar')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('trocar') }}">
          <p {{ (Request::is('cantina/trocar')) ? 'class=text-white' : '' }}>
            {{ trans('messages.exchange_product') }}</p>
          </a>
      </li>
      <li class="nav-item {{ (Request::is('cantina/estornar')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('estornar') }}">
          <p {{ (Request::is('cantina/estornar')) ? 'class=text-white' : '' }}>
            {{ trans('messages.to_reverse_product') }}
          </p>
        </a>
      </li>
      <li class="nav-item {{ (Request::is('cantina/qualidade')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('qualidade') }}">
          <p {{ (Request::is('cantina/qualidade')) ? 'class=text-white' : '' }}>
            {{ trans('messages.quality') }}
          </p>
        </a>
      </li>
    </ul>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link" data-target="#list_products" data-toggle="collapse">
    <i class="material-icons">fastfood</i>
    <p>{{ trans('messages.products') }}</p>
  </a>
  <div class="collapse pt-3 {{ (Request::is('produtos/*')) ? 'show' : '' }}" id="list_products">
    <ul>
      <li class="nav-item {{ (Request::is('produtos/adicionar')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('produtos.adicionar') }}">
          <p {{ (Request::is('produtos/adicionar')) ? 'class=text-white' : '' }}>
            {{ trans('messages.add') }}
          </p>
        </a>
      </li>
      <li class="nav-item {{ (Request::is('produtos/listar')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('produtos.listar') }}">
          <p {{ (Request::is('produtos/listar')) ? 'class=text-white' : '' }}>
            {{ trans('messages.list') }}</p>
          </a>
      </li>
    </ul>
  </div>
</li>