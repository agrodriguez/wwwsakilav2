@extends('layouts.app')
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('categories._table',['show'=>'true'])
        </div>
    </div>
</div>
@section('footer')
<script type="text/javascript">
    $(document).ready(function(){
        $('div#flash_message').delay(2000).slideUp(300);
    });
</script>
@endsection
@stop