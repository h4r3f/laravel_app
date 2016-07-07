<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CartRepository;
use App\Libraries\Repositories\CustomerRepository;
use App\Libraries\Repositories\OfferRepository;
use App\Food;
use App\Cart;
use App\Package;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as MController;
use Response;

class CartAPIController extends MController {

    /** @var  CartRepository */
    private $cartRepository;

    function __construct(CartRepository $cartRepo, CustomerRepository $customerRepo, OfferRepository $offerRepo) {
        $this->cartRepository = $cartRepo;
        $this->customerRepository = $customerRepo;
        $this->offerRepository = $offerRepo;
    }

    /**
     * Display a listing of the Cart.
     * GET|HEAD /carts
     *
     * @return Response
     */
    public function index() {
        $carts = $this->cartRepository->all();

        return $this->sendResponse($carts->toArray(), "Carts retrieved successfully");
    }

    /**
     * Show the form for creating a new Cart.
     * GET|HEAD /carts/create
     *
     * @return Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created Cart in storage.
     * POST /carts
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request) {
        if (sizeof(Cart::$rules) > 0)
            $this->validateRequestOrFail($request, Cart::$rules);

        $input = $request->all();
        if (!empty($input['food_ids'])) {
             foreach ($input['food_ids'] as $food) {
                 if(Food::find($food['id'])==''){
                     $foodid=$food['id'];
                     return $this->sendResponse($foodid, "Food not found, Refresh local storage");
                 }
             }
        }
         if (!empty($input['package_ids'])) {
             foreach ($input['package_ids'] as $package) {
                 if(Package::find($package['id'])==''){
                     $packid=$package['id'];
                     return $this->sendResponse($packid, "Package not found, Refresh local storage");
                 }
             }
        }
        if (!empty($input['cupon'])) {
            $offer = $this->offerRepository->findBy('cuponcode', $input['cupon']);
            if ($offer == null) {
                $offer = 'Cupon code does not match';
                return $this->sendResponse($offer, "Cupon code does not match");
            } else {
                $cupon = Cart::applyCupon($offer, $input);
                if ($cupon == 'false') {
                    $carts = 'Minimum purchase should be ' . $offer->minimum;
                    return $this->sendResponse($carts, "Minimum purchase needed");
                } else {
                    $input['price'] = $cupon;
                }
            }
        }

        $carts = Cart::addCartValue($input);
        if (isset($carts)) {
            Cart::mailSend($input);
            Cart::mailAdminSend($input);
            return $this->sendResponse($carts, "Cart saved successfully");
        }
        else{
            $error='Cart not added';
             return $this->sendResponse($error, "Cart not saved successfully");
        }
    }

    /**
     * Display the specified Cart.
     * GET|HEAD /carts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $cart = $this->cartRepository->apiFindOrFail($id);

        return $this->sendResponse($cart->toArray(), "Cart retrieved successfully");
    }

    /**
     * Show the form for editing the specified Cart.
     * GET|HEAD /carts/{id}/edit
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
     * Update the specified Cart in storage.
     * PUT/PATCH /carts/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request) {
        $input = $request->all();

        /** @var Cart $cart */
        $cart = $this->cartRepository->apiFindOrFail($id);

        $result = $this->cartRepository->updateRich($input, $id);

        $cart = $cart->fresh();

        return $this->sendResponse($cart->toArray(), "Cart updated successfully");
    }

    /**
     * Remove the specified Cart from storage.
     * DELETE /carts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $this->cartRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "Cart deleted successfully");
    }

}
