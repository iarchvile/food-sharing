<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\StoreProductCardRequest;
use App\Http\Controllers\Requests\UpdateProductCardRequest;
use App\Models\ProductCard;
use App\Models\User;
use App\Services\ProductsCards\ProductsCardsService;
use App\Services\ProductsCategories\ProductsCategoriesService;
use App\Services\Users\UsersService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(ProductCard::class, 'my');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index(UsersService $users_service)
    {
        \View::share([
            'cards' => $users_service->getUserCards(\Auth::user()),
        ]);

        return view('user.cards');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  ProductsCardsService  $service
     *
     * @return Factory|View
     */
    public function create(ProductsCategoriesService $service)
    {
        \View::share([
            'categories' => collect($service->getAll()->items())
                ->mapWithKeys(function ($item) {
                    return [$item['id'] => $item['title']];
                }),
        ]);

        return view('user.card-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductCardRequest  $request
     *
     * @param  ProductsCardsService  $cards_service
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreProductCardRequest $request, ProductsCardsService $cards_service)
    {
        $data = $request->getFormData();
        $cardId = $cards_service->create($data, $request->file('photos'));

        return redirect(route('my.update', ['my' => $cardId]));
    }

    /**
     * Display the specified resource.
     *
     * @param  ProductCard  $my
     *
     * @return Factory|View
     */
    public function show(ProductCard $my)
    {
        \View::share([
            'card' => $my,
        ]);

        return view('pages.card-detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProductCard  $my
     *
     * @return Factory|View
     */
    public function edit(ProductCard $my)
    {
        \View::share([
            'card' => $my,
        ]);

        return view('user.card-edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductCardRequest  $request
     * @param  ProductsCardsService  $cards_service
     * @param  ProductCard  $my
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductCardRequest $request, ProductsCardsService $cards_service, ProductCard $my)
    {
        \View::share([
            'card' => $my,
        ]);

        $data = $request->getFormData();

        $cards_service->update($my, $data, $request->file('photos'));

        return redirect()->route('my.edit', ['my' => $my->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
