        <div class="panel panel-default">            
            <div class="panel-heading"><b>{{ trans('actor.actors') }}</b></div>
            @if(isset($show))
                <div class="panel-body">
                   <a class="btn btn-primary pull-left" href="{{ action('ActorsController@create', ['locale'=>App::getLocale()]) }}" title="{{ trans('actor.create') }}" alt="{{ trans('actor.create') }}">{{ trans('actor.create') }}</a>
               </div>
            @endif
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('actor.first_name') }}</th>
                            <th class="text-center">{{ trans('film.films') }}</th>
                        </tr>
                    </thead>
                    @if($actors->links())
                    <tfoot><tr><td colspan="2">
                    @if(isset($categories))
                    {!! $actors->appends(['categories_page'=>$categories->currentPage()]) !!}
                    @else
                    {!! $actors->links() !!}
                    @endif
                    </td></tr></tfoot>
                    @endif
                    <tbody> 
                        @foreach ($actors as $actor)
                            <tr>                                    
                                <td><a href="{{ action('ActorsController@show', [$actor->{'slug'}, 'locale'=>App::getLocale()]) }}" title="" alt="">{{ $actor{'fullName'} }}</a></td>
                                <td class="text-right">{{ $actor->films->count() }}</td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
        </div>
        