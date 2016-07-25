            <div class="panel panel-default">
               <div class="panel-heading"><b>{{ trans('category.categories') }}</b> </div>
               @if(isset($show))
               <div class="panel-body">
                   <a class="btn btn-primary pull-left" href="{{ action('CategoriesController@create', ['locale'=>App::getLocale()]) }}" title="{{ trans('category.create') }}" alt="{{ trans('category.create') }}">{{ trans('category.create') }}</a>
               </div>
               @endif
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('category.name') }}</th>
                            <th class="text-center">{{ trans('film.films') }}</th>
                        </tr>
                    </thead>
                    @if($categories->links())
                    <tfoot><tr><td colspan="2">
                    @if(isset($actors))
                    {!! $categories->appends(['actors_page'=>$actors->currentPage()]) !!}
                    @else
                    {!! $categories->links() !!}
                    @endif
                    </td></tr></tfoot>
                    @endif
                    <tbody> 
                        @foreach ($categories as $category)
                            <tr>
                                <td><a href="{{ action('CategoriesController@show',[ $category->{'name'}, 'locale'=>App::getLocale()]) }}" title="" alt="">{{ $category->{'name'} }}</a></td>
                                <td class="text-right">{{ $category->films->count() }}</td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>             
            </div>