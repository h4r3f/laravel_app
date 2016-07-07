<table class="table table-hover">
    <thead>
    <th>Name</th>
			<th>Image</th>
			<th>Price</th>
    <th width="110px">Action</th>
    </thead>
    <tbody>
    @foreach($packages as $package)
        <tr>
            <td><a href="{!! route('packages.show', [$package->id]) !!}">{!! $package->name !!}</a></td>
	    <td>  <img src="{{asset('images/packages/'.$package->image)}}" alt="{{$package->image}}" width="50" height="50" /></td>
       
			<td>{!! $package->price !!}</td>
            <td>
                <a href="{!! route('packages.edit', [$package->id]) !!}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                <a href="{!! route('packages.show', [$package->id]) !!}" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"></i></a>
                <a href="{!! route('packages.delete', [$package->id]) !!}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wants to delete this Package?')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
