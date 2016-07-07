<table class="table table-hover">
    <thead>
    <th>Name</th>
			<th>Address</th>
			<th>Image</th>
			<th>Email</th>
			<th>Phone</th>
                        <th>Currency Type</th>
			<th>Timings</th>
    <th width="110px">Action</th>
    </thead>
    <tbody>
    @foreach($settings as $setting)
        <tr>
            <td>{!! $setting->name !!}</td>
			<td>{!! $setting->address !!}</td>
			<td><img src="{{asset('images/settings/'.$setting->image)}}" alt="{{$setting->image}}" width="50" height="50" /></td>
			<td>{!! $setting->email !!}</td>
			<td>{!! $setting->phone !!}</td>
                        <td>{!! $setting->currencytype !!}</td>
			<td>{!! $setting->timmings !!}</td>
            <td>
                <a href="{!! route('settings.edit', [$setting->id]) !!}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                <a href="{!! route('settings.delete', [$setting->id]) !!}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wants to delete this Setting?')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
