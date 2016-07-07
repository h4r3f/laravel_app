<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\OfferRepository;
use App\Models\Offer;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as MController;
use Response;

class OfferAPIController extends MController
{
	/** @var  OfferRepository */
	private $offerRepository;

	function __construct(OfferRepository $offerRepo)
	{
		$this->offerRepository = $offerRepo;
	}

	/**
	 * Display a listing of the Offer.
	 * GET|HEAD /offers
	 *
	 * @return Response
	 */
	public function index()
	{
		$offers = $this->offerRepository->findAllBy('activate', 'Yes');

		return $this->sendResponse($offers->toArray(), "Offers retrieved successfully");
	}

	/**
	 * Show the form for creating a new Offer.
	 * GET|HEAD /offers/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Offer in storage.
	 * POST /offers
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Offer::$rules) > 0)
			$this->validateRequestOrFail($request, Offer::$rules);

		$input = $request->all();

		$offers = $this->offerRepository->create($input);

		return $this->sendResponse($offers->toArray(), "Offer saved successfully");
	}

	/**
	 * Display the specified Offer.
	 * GET|HEAD /offers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$offer = $this->offerRepository->apiFindOrFail($id);

		return $this->sendResponse($offer->toArray(), "Offer retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Offer.
	 * GET|HEAD /offers/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified Offer in storage.
	 * PUT/PATCH /offers/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Offer $offer */
		$offer = $this->offerRepository->apiFindOrFail($id);

		$result = $this->offerRepository->updateRich($input, $id);

		$offer = $offer->fresh();

		return $this->sendResponse($offer->toArray(), "Offer updated successfully");
	}

	/**
	 * Remove the specified Offer from storage.
	 * DELETE /offers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->offerRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Offer deleted successfully");
	}
}
