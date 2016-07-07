        <div class="panel panel-default">
            
            <div class="panel-heading"><b>{{ trans('actor.actors') }}  <a href="{{ action('ActorsController@create') }}" title="{{ trans('actor.create') }}" alt="{{ trans('actor.create') }}"><span class="glyphicon glyphicon-plus-sign"></span></a></b></div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('actor.first_name') }}</th>                            
                        </tr>
                    </thead>
                    <tfoot><tr><td>{!! $actors->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($actors as $actor)
                            <tr>                                    
                                <td><a href="{{ action('ActorsController@show', $actor->getSlug()) }}" title="" alt="">{{ $actor->getFullName() }}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
        
        </div>
        