@extends ('layouts.login.master')

@section ('header')
<title>{{ trans('messages.register') }}</title>
@endsection

@section ('content')

<form class="form-signin" method="POST" action="{{ route('register') }}">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">{{ trans('messages.please_register') }}</h1>

    {{-- Nome --}}
    <label for="inputEmail" class="sr-only">{{ trans('messages.name') }}</label>
    <input type="text" name="name" id="inputEmail" class="form-control" placeholder="{{ trans('messages.name') }}" required autofocus>

    {{-- E-mail --}}
    <div class="checkbox mt-3">
    <label for="inputEmail" class="sr-only">{{ trans('messages.email') }}</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="{{ trans('messages.email') }}" required autofocus>

    {{-- Senha --}}
    <div class="checkbox mt-3">
    <small id="passwordHelpBlock" class="form-text text-muted">{{ trans('messages.password_need_min') }}</small>
    <label for="inputPassword" class="sr-only">{{ trans('messages.password') }}</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="{{ trans('messages.password') }}" aria-describedby="passwordHelpBlock" minlength="6" required>

    {{-- Confirmar senha --}}
    <div class="checkbox mt-3">
    <label for="inputCpnfirmationPassword" class="sr-only">{{ trans('messages.password_confirmation') }}</label>
    <input type="password" name="password_confirmation" id="inputConfirmationPassword" class="form-control" placeholder="{{ trans('messages.password_confirmation') }}" aria-describedby="passwordHelpBlock" minlength="6" required>

    @include('errors.print')

    <div class="checkbox mt-3">
    <small id="passwordHelpBlock" class="form-text text-muted">{{ trans('messages.already_have_account') }} <a href="{{ route('login') }}">{{ trans('messages.do_login') }}</a></small>
    <button type="submit" class="btn btn-outline-primary btn-lg btn-block">{{ trans('messages.register_enter') }}</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>

@endsection