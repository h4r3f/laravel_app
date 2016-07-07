<table class="table table-hover">
    <thead>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Message</th>
    <th width="110px">Action</th>
</thead>
<tbody>
    @foreach($contacts as $contact)
    <tr>
        <td><a href="mailto:{!!$contact->email!!}">{!! $contact->name !!}</a></td>
        <td>{!! $contact->email !!}</td>
        <td>{!! $contact->phone !!}</td>
        <td>{!! $contact->message !!}</td>
        <td>
            <a href="{!! route('contacts.edit', [$contact->id]) !!}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
            <a href="{!! route('contacts.show', [$contact->id]) !!}" class="btn btn-xs btn-info"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"></i></a>
            <a href="{!! route('contacts.delete', [$contact->id]) !!}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wants to delete this contact?')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>


        </td>
    </tr>
    @endforeach
</tbody>
</table>
