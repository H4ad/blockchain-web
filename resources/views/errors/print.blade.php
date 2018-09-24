@if ($errors->any())
    <div class="alert" role="alert">
        <ul class="list-group">
        	@foreach ($errors->all() as $error)
		 		<li class="list-group-item list-group-item-danger">
		 			<p class="text-center">{{ $loop->iteration }}° - {{ $error }}</p>
		 		</li>
            @endforeach
		</ul>
    </div>
@endif