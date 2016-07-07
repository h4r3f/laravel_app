<table class="table table-hover">
    <thead>
    <th>Name</th>
    <th>Image</th>
    <th width="110px">Action</th>
</thead>
<tbody>
    @foreach($categories as $category)
    <tr>
        <td><a href="{!! route('categories.show', [$category->id]) !!}">{!! $category->name !!}</a></td>
        <td>  <img src="{{asset('images/categories/'.$category->image)}}" alt="{{$category->image}}" width="50" height="50" /></td>
        <td>
            <a href="{!! route('categories.edit', [$category->id]) !!}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
            <a href="{!! route('categories.show', [$category->id]) !!}" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"></i></a>
            <a href="{!! route('categories.delete', [$category->id]) !!}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wants to delete this category?')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>

        </td>
    </tr>
    @endforeach
</tbody>
</table>
