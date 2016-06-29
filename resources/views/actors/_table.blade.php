            <div class="panel panel-default">
                <table class="table table-hover table-bordered">
                    <caption>{{ trans('actor.actors') }}</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('actor.first_name') }}</th>                            
                        </tr>
                    </thead>
                    <tfoot><tr><td>{!! $actors->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($actors as $actor)
                            <tr>                                    
                                <td><a href="{{ action('ActorsController@show', $actor->actor_id) }}" title="" alt="">{{ $actor->getFullName() }}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>            
        