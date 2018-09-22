@extends ('layouts.login.master')

@section ('header')

<title>Entrar</title>

@endsection

@section ('content')

<form class="form-signin">
    <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Por favor, entre</h1>
    <label for="inputEmail" class="sr-only">Endereço de e-mail</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Endereço de e-mail" required autofocus>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
    <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Lembre-me
    </label>
    </div>
    <a class="btn btn-lg btn-primary btn-block" href="/management">Entre</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>

@endsection