<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\SettingRepository;
use App\Models\Setting;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as MController;
use Response;

class SettingAPIController extends MController
{
	/** @var  SettingRepository */
	private $settingRepository;

	function __construct(SettingRepository $settingRepo)
	{
		$this->settingRepository = $settingRepo;
	}

	/**
	 * Display a listing of the Setting.
	 * GET|HEAD /settings
	 *
	 * @return Response
	 */
	public function index()
	{
		$settings = $this->settingRepository->all();

		return $this->sendResponse($settings->toArray(), "Settings retrieved successfully");
	}

	/**
	 * Show the form for creating a new Setting.
	 * GET|HEAD /settings/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Setting in storage.
	 * POST /settings
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Setting::$rules) > 0)
			$this->validateRequestOrFail($request, Setting::$rules);

		$input = $request->all();

		$settings = $this->settingRepository->create($input);

		return $this->sendResponse($settings->toArray(), "Setting saved successfully");
	}

	/**
	 * Display the specified Setting.
	 * GET|HEAD /settings/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$setting = $this->settingRepository->apiFindOrFail($id);

		return $this->sendResponse($setting->toArray(), "Setting retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Setting.
	 * GET|HEAD /settings/{id}/edit
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
	 * Update the specified Setting in storage.
	 * PUT/PATCH /settings/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Setting $setting */
		$setting = $this->settingRepository->apiFindOrFail($id);

		$result = $this->settingRepository->updateRich($input, $id);

		$setting = $setting->fresh();

		return $this->sendResponse($setting->toArray(), "Setting updated successfully");
	}

	/**
	 * Remove the specified Setting from storage.
	 * DELETE /settings/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->settingRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Setting deleted successfully");
	}
}
