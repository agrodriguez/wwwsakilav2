
	<!-- Modal -->
	<div class="modal fade" id="ModalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">{{ $title }}</h4>
	      </div>
	      <div class="modal-body">
	        <div class="alert alert-warning" role="alert">
		    	{{ trans('messages.confirm', ['name' => $name]) }}
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('messages.close') }}</button>
	        <button type="button" class="btn btn-primary" id="btnDelete">{{ $title }}</button>
	      </div>
	    </div>
	  </div>
	</div>

