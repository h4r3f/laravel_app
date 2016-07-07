<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\BookingRepository;
use App\Booking;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as MController;
use Response;

class BookingAPIController extends MController {

    /** @var  BookingRepository */
    private $bookingRepository;

    function __construct(BookingRepository $bookingRepo) {
        $this->bookingRepository = $bookingRepo;
    }

    /**
     * Display a listing of the Booking.
     * GET|HEAD /bookings
     *
     * @return Response
     */
    public function index() {
        $bookings = $this->bookingRepository->all();

        return $this->sendResponse($bookings->toArray(), "Bookings retrieved successfully");
    }

    /**
     * Show the form for creating a new Booking.
     * GET|HEAD /bookings/create
     *
     * @return Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created Booking in storage.
     * POST /bookings
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request) {
        if (sizeof(Booking::$rules) > 0)
            $this->validateRequestOrFail($request, Booking::$rules);

        $input = $request->all();

        $bookings = $this->bookingRepository->create($input);
        Booking::sendAdminMail($bookings);
        return $this->sendResponse($bookings->toArray(), "Booking saved successfully");
    }

    /**
     * Display the specified Booking.
     * GET|HEAD /bookings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $booking = $this->bookingRepository->apiFindOrFail($id);

        return $this->sendResponse($booking->toArray(), "Booking retrieved successfully");
    }

    /**
     * Show the form for editing the specified Booking.
     * GET|HEAD /bookings/{id}/edit
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        // maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
    }

    /**
     * Update the specified Booking in storage.
     * PUT/PATCH /bookings/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request) {
        $input = $request->all();

        /** @var Booking $booking */
        $booking = $this->bookingRepository->apiFindOrFail($id);

        $result = $this->bookingRepository->updateRich($input, $id);

        $booking = $booking->fresh();

        return $this->sendResponse($booking->toArray(), "Booking updated successfully");
    }

    /**
     * Remove the specified Booking from storage.
     * DELETE /bookings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $this->bookingRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "Booking deleted successfully");
    }

}
