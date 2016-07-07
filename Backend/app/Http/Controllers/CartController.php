<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Libraries\Repositories\CartRepository;
use Flash;
use Mitul\Controller\AppBaseController as MController;
use Response;

class CartController extends MController
{

	/** @var  CartRepository */
	private $cartRepository;

	function __construct(CartRepository $cartRepo)
	{
		$this->cartRepository = $cartRepo;
	}

	/**
	 * Display a listing of the Cart.
	 *
	 * @return Response
	 */
	public function index()
	{
		$carts = $this->cartRepository->paginate(10);

		return view('carts.index')
			->with('carts', $carts);
	}

	/**
	 * Show the form for creating a new Cart.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('carts.create');
	}

	/**
	 * Store a newly created Cart in storage.
	 *
	 * @param CreateCartRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCartRequest $request)
	{
		$input = $request->all();

		$cart = $this->cartRepository->create($input);

		Flash::success('Cart saved successfully.');

		return redirect(route('carts.index'));
	}

	/**
	 * Display the specified Cart.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$cart = $this->cartRepository->find($id);

		if(empty($cart))
		{
			Flash::error('Cart not found');

			return redirect(route('carts.index'));
		}

		return view('carts.show')->with('cart', $cart);
	}

	/**
	 * Show the form for editing the specified Cart.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$cart = $this->cartRepository->find($id);

		if(empty($cart))
		{
			Flash::error('Cart not found');

			return redirect(route('carts.index'));
		}

		return view('carts.edit')->with('cart', $cart);
	}

	/**
	 * Update the specified Cart in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCartRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCartRequest $request)
	{
		$cart = $this->cartRepository->find($id);

		if(empty($cart))
		{
			Flash::error('Cart not found');

			return redirect(route('carts.index'));
		}

		$cart = $this->cartRepository->updateRich($request->all(), $id);

		Flash::success('Cart updated successfully.');

		return redirect(route('carts.index'));
	}

	/**
	 * Remove the specified Cart from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$cart = $this->cartRepository->find($id);

		if(empty($cart))
		{
			Flash::error('Cart not found');

			return redirect(route('carts.index'));
		}

		$this->cartRepository->delete($id);

		Flash::success('Cart deleted successfully.');

		return redirect(route('carts.index'));
	}
}
