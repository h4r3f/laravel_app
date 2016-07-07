<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PackageRepository;
use App\Models\Package;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as MController;
use Response;

class PackageAPIController extends MController {

    /** @var  PackageRepository */
    private $packageRepository;

    function __construct(PackageRepository $packageRepo) {
        $this->packageRepository = $packageRepo;
    }

    /**
     * Display a listing of the Package.
     * GET|HEAD /packages
     *
     * @return Response
     */
    public function index() {
        $packages = $this->packageRepository->all()->load('foods');

        return $this->sendResponse($packages->toArray(), "Packages retrieved successfully");
    }

    /**
     * Show the form for creating a new Package.
     * GET|HEAD /packages/create
     *
     * @return Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created Package in storage.
     * POST /packages
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request) {
        if (sizeof(Package::$rules) > 0)
            $this->validateRequestOrFail($request, Package::$rules);

        $input = $request->all();

        $packages = $this->packageRepository->create($input);

        return $this->sendResponse($packages->toArray(), "Package saved successfully");
    }

    /**
     * Display the specified Package.
     * GET|HEAD /packages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $package = $this->packageRepository->apiFindOrFail($id)->load('foods');
        return $this->sendResponse($package->toArray(), "Package retrieved successfully");
    }

    /**
     * Show the form for editing the specified Package.
     * GET|HEAD /packages/{id}/edit
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
     * Update the specified Package in storage.
     * PUT/PATCH /packages/{id}
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request) {
        $input = $request->all();

        /** @var Package $package */
        $package = $this->packageRepository->apiFindOrFail($id);

        $result = $this->packageRepository->updateRich($input, $id);

        $package = $package->fresh();

        return $this->sendResponse($package->toArray(), "Package updated successfully");
    }

    /**
     * Remove the specified Package from storage.
     * DELETE /packages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $this->packageRepository->apiDeleteOrFail($id);

        return $this->sendResponse($id, "Package deleted successfully");
    }

}
