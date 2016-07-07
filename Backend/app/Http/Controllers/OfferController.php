<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Libraries\Repositories\OfferRepository;
use Flash;
use Mitul\Controller\AppBaseController as MController;
use Response;
use App\Offer;

class OfferController extends MController {

    /** @var  OfferRepository */
    private $offerRepository;

    function __construct(OfferRepository $offerRepo) {
        $this->offerRepository = $offerRepo;
    }

    /**
     * Display a listing of the Offer.
     *
     * @return Response
     */
    public function index() {
        $offers = $this->offerRepository->paginate(10);

        return view('offers.index')
                        ->with('offers', $offers);
    }

    /**
     * Show the form for creating a new Offer.
     *
     * @return Response
     */
    public function create() {
        return view('offers.create');
    }

    /**
     * Store a newly created Offer in storage.
     *
     * @param CreateOfferRequest $request
     *
     * @return Response
     */
    public function store(CreateOfferRequest $request) {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $input['image'] = Offer::moveFile($request->file('image'));
        }

        $offer = $this->offerRepository->create($input);

        Flash::success('Offer saved successfully.');

        return redirect(route('offers.index'));
    }

    /**
     * Display the specified Offer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $offer = $this->offerRepository->find($id);

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }

        return view('offers.show')->with('offer', $offer);
    }

    /**
     * Show the form for editing the specified Offer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $offer = $this->offerRepository->find($id);

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }

        return view('offers.edit')->with('offer', $offer);
    }

    /**
     * Update the specified Offer in storage.
     *
     * @param  int              $id
     * @param UpdateOfferRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOfferRequest $request) {
        $offer = $this->offerRepository->find($id);
        $input = $request->all();

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }

        if ($request->hasFile('image')) {
            \File::Delete(public_path('images/offers/' . $offer->image));

            $input['image'] = Offer::moveFile($request->file('image'));
        }

        $offer = $this->offerRepository->updateRich($input, $id);

        Flash::success('Offer updated successfully.');

        return redirect(route('offers.index'));
    }

    /**
     * Remove the specified Offer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $offer = $this->offerRepository->find($id);

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }
        
         if ($offer->image != null) {

            \File::Delete(public_path('images/offers/' . $offer->image));
        }

        $this->offerRepository->delete($id);

        Flash::success('Offer deleted successfully.');

        return redirect(route('offers.index'));
    }

}
