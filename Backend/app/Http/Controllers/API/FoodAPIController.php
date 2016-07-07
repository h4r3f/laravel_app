<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\FoodRepository;
use App\Food;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as MController;
use Response;

class FoodAPIController extends MController {

    /** @var  FoodRepository */
    private $foodRepository;

    function __construct(FoodRepository $foodRepo) {
        $this->foodRepository = $foodRepo;
    }

    /**
     * Display a listing of the Food.
     * GET|HEAD /foods
     *
     * @return Response
     */
    public function index() {
        $foods = $this->foodRepository->findAllBy('activate', 'Yes')->load('packages', 'categories');
        return $this->sendResponse($foods->toArray(), "Foods retrieved successfully");
    }

    /**
     * Show the form for creating a new Food.
     * GET|HEAD /foods/create
     *
     * @return Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created Food in storage.
     * POST /foods
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request) {
        if (sizeof(Food::$rules) > 0)
            $this->validateRequestOrFail($request, Food::$rules);

        $input = $request->all();

        $foods = $this->foodRepository->create($input);

        return $this->sendResponse($foods->toArray(), "Food saved successfully");
    }

    /**
     * Display the specified Food.
     * GET|HEAD /foods/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $food = $this->foodRepository->apiFindOrFail($id)->load('packages', 'categories');
        return $this->sendResponse($food->toArray(), "Food retrieved successfully");
    }

    /**
     * Show the form for editing the specified Food.
     * GET|HEAD /foods/{id}/edit
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
     * Update the specified Food in storage.
     * PUT/PATCH /foods/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request) {
        $input = $request->all();

        /** @var Food $food */
        $food = $this->foodRepository->apiFindOrFail($id);

        $result = $this->foodRepository->updateRich($input, $id);

        $food = $food->fresh();

        return $this->sendResponse($food->toArray(), "Food updated successfully");
    }

    /*
     * Display specials foods
     * Get method
     * @return Response
     */

    public function specials() {
        $foods = $this->foodRepository->findAllBy('special', 'Yes');
        return $this->sendResponse($foods->toArray(), "Special foods retrieved successfully");
    }

    /*
     * Display slider items
     * Get method
     * @return Response
     */

    public function sliders() {
        $foods = $this->foodRepository->findAllBy('slider', 'Yes');
        return $this->sendResponse($foods->toArray(), "Slider items retrieved successfully");
    }

    /*
     * Increment like 
     * Get method
     * @return Response
     */

    public function like($id) {
        $food = $this->foodRepository->apiFindOrFail($id);
        $liks = $food->likes + 1;
        $result = $this->foodRepository->update(array('likes' => $liks), $id);

        $food = $food->fresh();
        return $this->sendResponse($liks, "Liked successfully");
    }

    /*
     * Increment Dislike 
     * Get method
     * @return Response
     */

    public function dislike($id) {
        $food = $this->foodRepository->apiFindOrFail($id);
        $likes = $food->likes - 1;
        $result = $this->foodRepository->update(array('likes' => $likes), $id);
        $food = $food->fresh();
        return $this->sendResponse($likes, "Disliked successfully");
    }

    /**
     * Remove the specified Food from storage.
     * DELETE /foods/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $this->foodRepository->apiDeleteOrFail($id);
        return $this->sendResponse($id, "Food deleted successfully");
    }

}
