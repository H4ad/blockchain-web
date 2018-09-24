@extends ('layouts.login.master')

@section ('header')
<title>{{ trans('messages.enter') }}</title>
@endsection

@section ('content')

<form class="form-signin" action="{{ route('login') }}" method="POST">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">{{ trans('messages.please_enter') }}</h1>

    <label for="inputEmail" class="sr-only">{{ trans('messages.email') }}</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="{{ trans('messages.email') }}" required autofocus>

    <div class="checkbox mt-3">
    <label for="inputPassword" class="sr-only">{{ trans('messages.password') }}</label>
    <input type="password" name="password" id="inputPassword" class="form-control" minlength="6" placeholder="{{ trans('messages.password') }}" required>

    <div class="checkbox mt-3">
    <label>
        <input type="checkbox" name="remember"> {{ trans('messages.remember_me') }}</input>
    </label>

    </div>
    <small id="passwordHelpBlock" class="form-text text-muted">{{ trans('messages.dont_have_account') }} <a href="{{ route('register') }}">{{ trans('messages.do_register') }}</a></small>

    <button type="submit" class="btn btn-outline-primary btn-lg btn-block">{{ trans('messages.enter')}}</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>

@endsection