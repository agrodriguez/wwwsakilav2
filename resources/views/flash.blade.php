@if(session()->has('flash_message'))
    <div id="flash_message" class="alert alert-{{ session('flash_message_level') }}" role="alert">
    	{{ session('flash_message') }}
	</div>
@endif