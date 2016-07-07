<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Libraries\Repositories\FoodRepository;
use Flash;
use Mitul\Controller\AppBaseController as MController;
use Response;
use Illuminate\Support\Facades\File;
use App\Food;
use App\Http\ViewVomposers\FoodComposer;

class FoodController extends MController {

    /** @var  FoodRepository */
    private $foodRepository;

    function __construct(FoodRepository $foodRepo) {
        $this->foodRepository = $foodRepo;
    }

    /**
     * Display a listing of the Food.
     *
     * @return Response
     */
    public function index() {
        $foods = $this->foodRepository->paginate(10);

        return view('foods.index')
                        ->with('foods', $foods);
    }

    /**
     * Show the form for creating a new Food.
     *
     * @return Response
     */
    public function create() {
        return view('foods.create');
    }

    /**
     * Store a newly created Food in storage.
     *
     * @param CreateFoodRequest $request
     *
     * @return Response
     */
    public function store(CreateFoodRequest $request) {

        $input = $request->all();
        if ($request->hasFile('image')) {
            $input['image'] = Food::moveFile($request->file('image'));
        }

        if ($request->hasFile('thumbnail')) {
            $input['thumbnail'] = Food::moveThumbnailFile($request->file('thumbnail'));
        }
        $food = $this->foodRepository->create($input);
        if (isset($input['package'])) {
            $food->packages()->attach($input['package']);
        }
        if (isset($input['package'])) {
            $food->categories()->attach($input['category']);
        }

        Flash::success('Food saved successfully.');

        return redirect(route('foods.index'));
    }

    /**
     * Display the specified Food.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $food = $this->foodRepository->find($id)->load('packages', 'categories');
        return view('foods.show')->with('food', $food);
    }

    /**
     * Show the form for editing the specified Food.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $food = $this->foodRepository->find($id)->load('packages', 'categories');
        if (empty($food)) {
            Flash::error('Food not found');

            return redirect(route('foods.index'));
        }

        return view('foods.edit')->with('food', $food);
    }

    /**
     * Update the specified Food in storage.
     *
     * @param  int              $id
     * @param UpdateFoodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFoodRequest $request) {
        $fooddetails = $this->foodRepository->find($id)->load('packages', 'categories');
        $input = $request->all();
        if (empty($fooddetails)) {
            Flash::error('Food not found');

            return redirect(route('foods.index'));
        }
        if ($request->hasFile('image')) {
            \File::Delete(public_path('images/foods/' . $fooddetails->image));
            $input['image'] = Food::moveFile($request->file('image'));
        }

        if ($request->hasFile('thumbnail')) {
            \File::Delete(public_path('images/foods/thumb/' . $fooddetails->thumbnail));
            $input['thumbnail'] = Food::moveFile($request->file('thumbnail'));
        }
        $food = $this->foodRepository->updateRich($input, $id);

        if ($request->get('package')) {
            Food::updatePackages($fooddetails, $input['package']);
        }
        if ($request->get('category')) {
            Food::updateCategories($fooddetails, $input['category']);
        }
        Flash::success('Food updated successfully.');

        return redirect(route('foods.index'));
    }

    /**
     * Remove the specified Food from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $food = $this->foodRepository->find($id);

        if (empty($food)) {
            Flash::error('Food not found');
            return redirect(route('foods.index'));
        }
        if ($food->image != null) {

            \File::Delete(public_path('images/foods' . $food->image));
        }

        if ($food->thumbnail != null) {

            \File::Delete(public_path('images/foods/thumb/' . $food->thumbnail));
        }


        $this->foodRepository->delete($id);

        Flash::success('Food deleted successfully.');

        return redirect(route('foods.index'));
    }

}
