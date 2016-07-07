<table class="table table-hover">
    <thead>
    <th>Name</th>
    <th>Details</th>
    <th>Image</th>
    <th>Cuponcode</th>
    <th>Price</th>
    <th>Type</th>
    <th>Minimum Purchase</th>
    <th>Activate</th>
    <th width="110px">Action</th>
</thead>
<tbody>
    @foreach($offers as $offer)
    <tr>
        <td><a href="{!! route('offers.show', [$offer->id]) !!}">{!! $offer->name !!}</a></td>
        <td>{!! $offer->details !!}</td>
        <td><img src="{{asset('images/offers/'.$offer->image)}}" alt="{{$offer->image}}" width="50" height="50" /></td>
        <td>{!! $offer->cuponcode !!}</td>
        <td>{!! $offer->price !!}</td>
        <td>{!! $offer->type !!}</td>
        <td>{!! $offer->minimum !!}</td>
        <td>{!! $offer->activate !!}</td>
        <td>
            <a href="{!! route('offers.edit', [$offer->id]) !!}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
            <a href="{!! route('offers.show', [$offer->id]) !!}" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"></i></a>
            <a href="{!! route('offers.delete', [$offer->id]) !!}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wants to delete this Package?')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>

        </td>
    </tr>
    @endforeach
</tbody>
</table>
