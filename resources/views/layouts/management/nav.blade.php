<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
	<div class="container-fluid">
		<div class="navbar-wrapper">
			<a class="navbar-brand">{{ $name ?? 'Início' }}</a>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
			<span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end">
			<form class="navbar-form">
				<div class="input-group no-border">
					<input type="text" value="" class="form-control" placeholder="{{ trans('messages.placeholder_search') }}">
					<button type="submit" class="btn btn-default btn-round btn-just-icon">
						<i class="material-icons">search</i>
						<div class="ripple-container"></div>
					</button>
				</div>
			</form>
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link" href="javascript:void(0);" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="material-icons">notifications</i>
						@if($numUnreadNotifications != 0)
							<span class="notification">{{ $numUnreadNotifications }}</span>
						@endif
						<p class="d-lg-none d-md-block">
							{{ trans('messages.notifications')}}
						</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						@foreach($unreadNotifications as $notification)
							<a class="dropdown-item">{{ $notification->data }}</a>
						@endforeach
						@if($numUnreadNotifications == 0)
							<a class="dropdown-item">{{ trans('messages.dont_have_notifications') }}</a>
						@endif
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="javascript:void(0);" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="material-icons">account_circle</i>
						<p class="d-lg-none d-md-block">
							{{ trans('messages.profile')}}
						</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
						<a class="dropdown-item {{ (Request::is('perfil')) ? 'bg-info text-white' : '' }}" href="{{ route('perfil') }}">{{ trans('messages.profile') }}</a>
						<form id="logoutForm" action="{{ route('logout') }}" method="POST">
							@csrf
							<a id="logoutBtn" class="dropdown-item">{{ trans('messages.logout') }}</a>
						</form>

						<script>
							document.getElementById("logoutBtn").onclick = function() {
								document.getElementById("logoutForm").submit();
							};
						</script>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>