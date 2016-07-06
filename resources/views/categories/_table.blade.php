            <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover table-bordered">
                    <caption>{{ trans('category.categories') }}</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('category.name') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td>{!! $categories->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($categories as $category)
                            <tr>
                                <td><a href="{{ action('CategoriesController@show', $category->category_id) }}" title="" alt="">{{ $category->name}}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>
            </div>