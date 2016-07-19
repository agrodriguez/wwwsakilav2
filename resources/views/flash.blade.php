@if(session()->has('flash_message'))    
	<!-- Modal -->
	<div class="modal fade" id="ModalFlash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">{{ session('flash_message_title') }}</h4>
	      </div>
	      <div class="modal-body">
	        <div id="flash_message" class="alert alert-{{ session('flash_message_level') }}" role="alert">
		    	{{ session('flash_message') }}
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('messages.close') }}</button>	        
	      </div>
	    </div>
	  </div>
	</div>
@endif
