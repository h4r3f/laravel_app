<table class="table table-hover">
    <thead>
    <th>Customer Name</th>
    <th>Address</th>
    <th>Total</th>
    <th>Date</th>
    <th width="110px">Action</th>
</thead>
<tbody>
    @foreach($carts as $cart)
    <tr>
        <td><a href="{!! route('carts.show', [$cart->id]) !!}">{!! $cart->customer->name !!}</a></td>
        <td>{!! $cart->address !!}</td>
        <td>{!! $cart->price !!}</td>
        <td>{!! $cart->created_at !!}</td>
        <td>

            <a href="{!! route('carts.show', [$cart->id]) !!}" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"></i></a>
            <a href="{!! route('carts.delete', [$cart->id]) !!}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wants to delete this cart?')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
