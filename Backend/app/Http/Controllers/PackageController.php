<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Libraries\Repositories\PackageRepository;
use Flash;
use Mitul\Controller\AppBaseController as MController;
use Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Package;

class PackageController extends MController {

    /** @var  PackageRepository */
    private $packageRepository;

    function __construct(PackageRepository $packageRepo) {
        $this->packageRepository = $packageRepo;
    }

    /**
     * Display a listing of the Package.
     *
     * @return Response
     */
    public function index() {
        $packages = $this->packageRepository->paginate(10);

        return view('packages.index')
                        ->with('packages', $packages);
    }

    /**
     * Show the form for creating a new Package.
     *
     * @return Response
     */
    public function create() {
        return view('packages.create');
    }

    /**
     * Store a newly created Package in storage.
     *
     * @param CreatePackageRequest $request
     *
     * @return Response
     */
    public function store(CreatePackageRequest $request) {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $input['image'] = Package::moveFile($request->file('image'));
        }
        $package = $this->packageRepository->create($input);
        Flash::success('Package saved successfully.');

        return redirect(route('packages.index'));
    }

    /**
     * Display the specified Package.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('packages.index'));
        }

        return view('packages.show')->with('package', $package);
    }

    /**
     * Show the form for editing the specified Package.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('packages.index'));
        }

        return view('packages.edit')->with('package', $package);
    }

    /**
     * Update the specified Package in storage.
     *
     * @param  int              $id
     * @param UpdatePackageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePackageRequest $request) {

        $package = $this->packageRepository->find($id);
        $input = $request->all();
        if (empty($package)) {
            Flash::error('Package not found');
            return redirect(route('packages.index'));
        }
        if ($request->hasFile('image')) {
            \File::Delete(public_path('images/packages/' . $package->image));

            $input['image'] = Package::moveFile($request->file('image'));
        }

        $package = $this->packageRepository->updateRich($input, $id);

        Flash::success('Package updated successfully.');

        return redirect(route('packages.index'));
    }

    /**
     * Remove the specified Package from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('packages.index'));
        }

        if ($package->image != null) {

            \File::Delete(public_path('images/packages/' . $package->image));
        }

        $this->packageRepository->delete($id);

        Flash::success('Package deleted successfully.');

        return redirect(route('packages.index'));
    }

}
