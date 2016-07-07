<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CustomerRepository;
use App\Models\Customer;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as MController;
use Response;

class CustomerAPIController extends MController
{
	/** @var  CustomerRepository */
	private $customerRepository;

	function __construct(CustomerRepository $customerRepo)
	{
		$this->customerRepository = $customerRepo;
	}

	/**
	 * Display a listing of the Customer.
	 * GET|HEAD /customers
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = $this->customerRepository->all();

		return $this->sendResponse($customers->toArray(), "Customers retrieved successfully");
	}

	/**
	 * Show the form for creating a new Customer.
	 * GET|HEAD /customers/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Customer in storage.
	 * POST /customers
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Customer::$rules) > 0)
			$this->validateRequestOrFail($request, Customer::$rules);

		$input = $request->all();

		$customers = $this->customerRepository->create($input);

		return $this->sendResponse($customers->toArray(), "Customer saved successfully");
	}

	/**
	 * Display the specified Customer.
	 * GET|HEAD /customers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$customer = $this->customerRepository->apiFindOrFail($id);

		return $this->sendResponse($customer->toArray(), "Customer retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Customer.
	 * GET|HEAD /customers/{id}/edit
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
	 * Update the specified Customer in storage.
	 * PUT/PATCH /customers/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Customer $customer */
		$customer = $this->customerRepository->apiFindOrFail($id);

		$result = $this->customerRepository->updateRich($input, $id);

		$customer = $customer->fresh();

		return $this->sendResponse($customer->toArray(), "Customer updated successfully");
	}

	/**
	 * Remove the specified Customer from storage.
	 * DELETE /customers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->customerRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Customer deleted successfully");
	}
}
