<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Libraries\Repositories\BookingRepository;
use Flash;
use Mitul\Controller\AppBaseController as MController;
use Response;
use App\Booking;

class BookingController extends MController {

    /** @var  BookingRepository */
    private $bookingRepository;

    function __construct(BookingRepository $bookingRepo) {
        $this->bookingRepository = $bookingRepo;
    }

    /**
     * Display a listing of the Booking.
     *
     * @return Response
     */
    public function index() {
        $bookings = $this->bookingRepository->paginate(10);

        return view('bookings.index')
                        ->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new Booking.
     *
     * @return Response
     */
    public function create() {
        return view('bookings.create');
    }

    /**
     * Store a newly created Booking in storage.
     *
     * @param CreateBookingRequest $request
     *
     * @return Response
     */
    public function store(CreateBookingRequest $request) {
        $input = $request->all();

        $booking = $this->bookingRepository->create($input);

        Flash::success('Booking saved successfully.');

        return redirect(route('bookings.index'));
    }

    /**
     * Display the specified Booking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified Booking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.edit')->with('booking', $booking);
    }

    /**
     * Update the specified Booking in storage.
     *
     * @param  int              $id
     * @param UpdateBookingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookingRequest $request) {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $booking = $this->bookingRepository->updateRich($request->all(), $id);

        Flash::success('Booking updated successfully.');

        return redirect(route('bookings.index'));
    }

    /*
     * Confirm Booking
     * @param int $id
     * @return Response
     */

    public function confirmed($id) {

        $booking = $this->bookingRepository->find($id);
        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $bookingupdate = $this->bookingRepository->update(array('confirmed' => 'Yes'), $id);
         Booking::sendMail($booking);
        Flash::success('Booking confirmed successfully.');
        return redirect(route('bookings.index'));
    }

    /**
     * Remove the specified Booking from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $this->bookingRepository->delete($id);

        Flash::success('Booking deleted successfully.');

        return redirect(route('bookings.index'));
    }

}
