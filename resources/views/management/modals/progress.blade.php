<div class="modal fade" id="progressModal" tabindex="-1" data-toggle="modal" role="dialog" aria-labelledby="progressIdentifierLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="progressIdentifierLabel">{{ trans('messages.progress_title') }}</h5>
			</div>
			<div class="modal-body">
				<div class="progress">
				  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
				</div>
			</div>
			<div id="progressFooter" class="modal-footer">
			</div>
		</div>
	</div>
</div>