<table class="table table-hover">
    <thead>
    <th>Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Phone</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{!! $customer->name !!}</td>
			<td>{!! $customer->address !!}</td>
			<td>{!! $customer->email !!}</td>
			<td>{!! $customer->phone !!}</td>
            <td>
                <!--<a href="{!! route('customers.edit', [$customer->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>-->
                <a href="{!! route('customers.delete', [$customer->id]) !!}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wants to delete this Customer?')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
