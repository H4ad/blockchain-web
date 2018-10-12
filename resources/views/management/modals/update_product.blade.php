<div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="updateProductLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateProductLabel">{{ trans('messages.update_product') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="updateProductForm">
					<div class="input-group mt-3">
						<div class="input-group-prepend">
					    	<span class="input-group-text">
					        	<i class="material-icons">category</i>
					    	</span>
					    </div>
		                <div class="form-group bmd-form-group">
		                 	<label class="bmd-label-floating">{{ trans('messages.type') }}</label>
		                 	<input name="type" type="text" class="form-control"/>
		                </div>
		            </div>
		            <div class="input-group mt-3">
						<div class="input-group-prepend">
					    	<span class="input-group-text">
					        	<i class="material-icons">description</i>
					    	</span>
					    </div>
		                <div class="form-group bmd-form-group">
		                 	<label class="bmd-label-floating">{{ trans('messages.description') }}</label>
		                 	<input name="description" type="text" class="form-control"/>
		                </div>
		            </div>
					<div class="input-group mt-3">
						<div class="input-group-prepend">
					    	<span class="input-group-text">
					        	<i class="material-icons">attach_money</i>
					    	</span>
					    </div>
		                <div class="form-group bmd-form-group">
		                 	<label class="bmd-label-floating">{{ trans('messages.value') }}</label>
	                     	<input name="value" class="form-control" type="text">
		                </div>
		            </div>
		            <div class="input-group mt-3">
		            	<div class="input-group-prepend">
					    	<span class="input-group-text">
					        	<i class="material-icons">local_offer</i>
					    	</span>
					    </div>
					    <div class="form-group bmd-form-group">
	                     	<label class="bmd-label-floating">{{ trans('messages.status') }}</label>
	                     	<div class="select">
							    <select name="status" class="pl-2">
							    	<option class="ml-2" value="Bom" selected>Bom</option>
							    	<option value="Ruim">Ruim</option>
							    </select>
							</div>
	                    </div>
					</div>
				</form>
			</div>
			<input type="hidden" id="productId">
			<input type="hidden" id="productOwner">
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('messages.cancel') }}</button>
				<button id="btnUpdateProduct" type="button" class="btn btn-info">{{ trans('messages.update') }}</button>
			</div>
		</div>
	</div>
</div>