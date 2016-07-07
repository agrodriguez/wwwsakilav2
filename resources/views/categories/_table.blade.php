            <div class="panel panel-default">
               <div class="panel-heading"><b>{{ trans('category.categories') }}  <a href="{{ action('CategoriesController@create') }}" title="{{ trans('category.create') }}" alt="{{ trans('category.create') }}"><span class="glyphicon glyphicon-plus-sign"></span></a></b> </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('category.name') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td>{!! $categories->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($categories as $category)
                            <tr>
                                <td><a href="{{ action('CategoriesController@show', $category->name) }}" title="" alt="">{{ $category->name}}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>             
            </div>