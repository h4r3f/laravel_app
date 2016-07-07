<table class="table table-hover">
    <thead>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Persons</th>
    <th>Booking Date</th>
    <th>Booking Time</th>
    <th>Confirmed</th>
    <th width="110px">Action</th>
</thead>
<tbody>
    @foreach($bookings as $booking)
    <tr>
        <td>{!! $booking->name !!}</td>
        <td>{!! $booking->email !!}</td>
        <td>{!! $booking->phone !!}</td>
        <td>{!! $booking->persons !!}</td>
        <td>{!! $booking->booking_date !!}</td>
        <td>{!! $booking->booking_time !!}</td>
        <td>{!! $booking->confirmed !!}</td>
        <td>
            <a href="{!! route('bookings.confirmed', [$booking->id]) !!}" onclick="return confirm('Are you sure wants to confirm this Booking?')"> <button class="btn btn-success btn-xs" type="button">Confirmed</button></a>
            <a href="{!! route('bookings.delete', [$booking->id]) !!}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure wants to delete this Booking?')"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
