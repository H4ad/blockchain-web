<div class="sidebar" data-color="azure" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
  <div class="logo">
    <a class="simple-text logo-normal">
      {{ trans('messages.home_balance', ['money' => '0,00'])}}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ (Request::is('inicio') || Request::is('inicio/*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('inicio') }}">
          <i class="material-icons">dashboard</i>
          <p>{{ trans('messages.begin') }}</p>
        </a>
      </li>
      <li class="nav-item {{ (Request::is('transacoes') || Request::is('transacoes/*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('transacoes') }}">
          <i class="material-icons">list</i>
          <p>{{ trans('messages.transactions') }}</p>
        </a>
      </li>
      @role('canteen')
        @include('layouts.management.sidebar.canteen')
      @endrole
      @role('student')
        @include('layouts.management.sidebar.student')
      @endrole
    </ul>
  </div>
</div>