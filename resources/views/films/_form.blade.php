		<div class="form-group">
            <div class="col-sm-6">
            	{!! Form::label('title',trans('film.title'),['class'=>'control-label']) !!}
                {!! Form::text('title',null,['class'=>'form-control','placeholder'=>trans('film.title')]) !!}
                <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>
            <div class="col-sm-2">
            	{!! Form::label('release_year',trans('film.release_year'),['class'=>'control-label']) !!}
                {!! Form::selectYear('release_year',1920,2020,$year,['class'=>'form-control']) !!}
                <small class="text-danger">{{ $errors->first('release_year') }}</small>
            </div>
            <div class="col-sm-2">
            	{!! Form::label('length',trans('film.length'),['class'=>'control-label']) !!}
                <div class="input-group">
					<div class="input-group-addon">{{ trans('labels.mins') }}</div>
					{!! Form::text('length',null,['class'=>'form-control', 'placeholder'=>trans('film.length')]) !!}
				</div>
                <small class="text-danger">{{ $errors->first('length') }}</small>
            </div>
            <div class="col-sm-2">
            	{!! Form::label('rating',trans('film.rating'),['class'=>'control-label']) !!}
            	{!! Form::select('rating',$ratings,null,['class'=>'form-control']) !!}                
                <small class="text-danger">{{ $errors->first('rating') }}</small>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
            	{!! Form::label('description',trans('film.description'),['class'=>'control-label']) !!}
            	{!! Form::textarea('description', null, ['class' => 'form-control','size' => '30x2', 'placeholder'=>trans('film.description')]) !!}
            	<small class="text-danger">{{ $errors->first('description') }}</small>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">
                {!! Form::label('language',trans('film.language'),['class'=>'control-label']) !!}
                {!! Form::select('language_id',$languages,null, ['class'=>'form-control']) !!}
				<small class="text-danger">{{ $errors->first('language_id') }}</small>
            </div>
            <div class="col-sm-2">
                {!! Form::label('original_language',trans('film.original_language'),['class'=>'control-label']) !!}
                {!! Form::select('original_language_id',$languages,null, ['class'=>'form-control']) !!}
				<small class="text-danger">{{ $errors->first('original_language_id') }}</small>
            </div>
            <div class="col-sm-2">
                {!! Form::label('rental_duration',trans('film.rental_duration'),['class'=>'control-label']) !!}
                <div class="input-group">
					<div class="input-group-addon">{{ trans('labels.days') }}</div>
					{!! Form::text('rental_duration',null,['class'=>'form-control', 'placeholder'=>trans('film.rental_duration')]) !!}
				</div>
				<small class="text-danger">{{ $errors->first('rental_duration') }}</small>
                
            </div>
            <div class="col-sm-2">
                {!! Form::label('rental_rate',trans('film.rental_rate'),['class'=>'control-label']) !!}
                <div class="input-group">
					<div class="input-group-addon">$</div>
					{!! Form::text('rental_rate',null,['class'=>'form-control', 'placeholder'=>trans('film.rental_rate')]) !!}
				</div>
				<small class="text-danger">{{ $errors->first('rental_rate') }}</small> 
            </div>
            <div class="col-sm-2">
                {!! Form::label('replacement_cost',trans('film.replacement_cost'),['class'=>'control-label']) !!}
                <div class="input-group">
					<div class="input-group-addon">$</div>
					{!! Form::text('replacement_cost',null,['class'=>'form-control', 'placeholder'=>trans('film.replacement_cost')]) !!}
				</div>
				<small class="text-danger">{{ $errors->first('replacement_cost') }}</small>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6">
            	{!! Form::label('special_features',trans('film.special_features'),['class'=>'control-label']) !!}
            	{!! Form::select('special_features[]',$specialFeatures,null,['id'=>'special_features','class'=>'form-control','multiple']) !!}
				<small class="text-danger">{{ $errors->first('special_features') }}</small>                                
            </div>
			<div class="col-sm-6">
				{!! Form::label('category_list',trans('category.categories'),['class'=>'control-label']) !!}
				{!! Form::select('category_list[]',$categories,null, ['id'=>'category_list', 'class'=>'form-control','multiple']) !!}
				<small class="text-danger">{{ $errors->first('category_list') }}</small>
			</div>
        </div> 

		<div class="form-group">
			<div class="col-sm-12">
				{!! Form::label('actor_list',trans('actor.actors'),['class'=>'control-label']) !!}
				{!! Form::select('actor_list[]',$actors,null, ['id'=>'actor_list', 'class'=>'form-control','multiple']) !!}
				<small class="text-danger">{{ $errors->first('actor_list') }}</small>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-12">
				{!! Form::submit($submitButtonText,['class'=>'btn btn-primary pull-right']) !!}
			</div>
		</div>		

		@section('footer')
			<script type="text/javascript">
			  $('#category_list,#actor_list,#special_features').select2();
			</script>
		@endsection
