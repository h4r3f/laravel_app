<table class="table table-hover">
    <thead>
    <th>Name</th>
    <th>Details</th>
    <th>Image</th>
    <th>Price</th>
    <th>Package</th>
    <th>Category</th>
    <th>Slider</th>
    <th>Special</th>
    <th>Activate</th>
    <th>Type</th>
    <th>Cooking Type</th>
    <th width="110px">Action</th>
</thead>
<tbody>
    @foreach($foods as $food)
    <tr>
        <td> <a href="{!! route('foods.show', [$food->id]) !!}">{!! $food->name !!}</a></td>
        <td>{!! $food->details !!}</td>
        <td>  <img src="{{asset('images/foods/'.$food->image)}}" alt="{{$food->image}}" width="50" height="50" /></td>
        <td>{!! $food->price !!}</td>
        <td>
            @foreach (\App\Food::find($food->id)->packages as $package)
            {{$package->name.'/'}}
            @endforeach
        </td>
        <td>
            @foreach (\App\Food::find($food->id)->categories as $category)
            {{$category->name.'/'}}
            @endforeach
        </td>
        <td>{!! $food->slider !!}</td>
        <td>{!! $food->special !!}</td>
        <td>{!! $food->activate !!}</td>
        <td>{!! $food->type !!}</td>
        <td>{!! $food->cooking_type !!}</td>
        <td>
            <a href="{!! route('foods.edit', [$food->id]) !!}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
            <a href="{!! route('foods.show', [$food->id]) !!}" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"></i></a>
            <a href="{!! route('foods.delete', [$food->id]) !!}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wants to delete this food?')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>

        </td>
    </tr>
    @endforeach
</tbody>
</table>
