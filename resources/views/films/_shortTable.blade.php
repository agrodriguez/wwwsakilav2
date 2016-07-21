            <div class="panel panel-default">
                <div class="panel-heading"><b>{{ trans('film.films')}} - {{ $count }}</b></div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('film.title') }}</th>
                            <th class="text-center">{{ trans('film.description') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="2">{!! $films->links() !!}</td></tr></tfoot>
                    <tbody>                         
                        @foreach ($films as $film)
                        <tr>                                    
                            <td><a href="{{ action('FilmsController@show', $film->{'film_id'}) }}" title="" alt="">{{ $film->{'title'} }}</a></td>
                            <td>{{ $film->{'description'} }}</td>
                        </tr>   
                        @endforeach                         
                    </tbody>
                </table>                
            </div>