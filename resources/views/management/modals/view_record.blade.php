@push('css')
<link type="text/css" rel="stylesheet" href="{{ asset('css/prettifycode.css') }}" />
@endpush

{{-- Modal que exibe as informações em de uma transação --}}
<div class="modal fade" id="viewRecordModal" tabindex="-1" role="dialog" aria-labelledby="viewRecordLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="viewRecordLabel">{{ trans('messages.record') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="bd-example" data-example-id="">
					<div class="card card-nav-tabs card-plain">
						<div class="card-header card-header-info">
							<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
							<div class="nav-tabs-navigation">
								<div class="nav-tabs-wrapper">
									<ul class="nav nav-tabs" data-tabs="tabs">
										<li class="nav-item">
											<a class="nav-link active show" href="#transactions" data-toggle="tab">{{ trans('messages.transactions') }}<div class="ripple-container"></div></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#events" data-toggle="tab">{{ trans('messages.events') }}<div class="ripple-container"></div></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="card-body ">
							<div class="tab-content text-center">
								<div class="tab-pane active show" id="transactions">
									<pre class="prettyprint text-left">@json(request()->headers->all(), JSON_PRETTY_PRINT)p</pre>
								</div>
								<div class="tab-pane" id="events">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('messages.close') }}</button>
			</div>
		</div>
	</div>
</div>

@push('scripts')
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
@endpush