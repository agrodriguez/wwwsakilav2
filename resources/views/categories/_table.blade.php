            <div class="panel panel-default">
               <div class="panel-heading"><b>{{ trans('category.categories') }}</b> </div>
               @if(isset($show))
               <div class="panel-body">
                   <a class="btn btn-primary pull-left" href="{{ action('CategoriesController@create') }}" title="{{ trans('category.create') }}" alt="{{ trans('category.create') }}">{{ trans('category.create') }}</a>
               </div>
               @endif
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('category.name') }}</th>
                        </tr>
                    </thead>
                    @if($categories->links())
                    <tfoot><tr><td>{!! $categories->links() !!}</td></tr></tfoot>
                    @endif
                    <tbody> 
                        @foreach ($categories as $category)
                            <tr>
                                <td><a href="{{ action('CategoriesController@show', $category->{'name'}) }}" title="" alt="">{{ $category->{'name'} }}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>             
            </div>