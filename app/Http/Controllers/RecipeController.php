<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Unit;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        $pantry_ingredients = Ingredient::all();
        $units = Unit::getAllKeyed();
        return view('recipes.create', [
            'pantry_ingredients' => $pantry_ingredients,
            'units' => $units,
            'api_token' => $user->api_token,
        ]);
    }

    /**
     * Store a newly created recipe in the DB.
     *
     * @param CreateFormRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateFormRequest $request)
    {
        $url = $request->input('url');
        $user = auth()->user();

        // Attempt to create a new item from the provided URL
        $item = ItemFactory::create([
            'user_id' => $user->id,
            'details' => ['url' => $url]
        ]);

        // If a valid item type couldn't be found, don't save to the db
        if (empty($item->type)) {
            return redirect()
                ->route('item.create')
                ->withInput()
                ->withErrors(['url' => CreateFormRequest::$messages['url.invalid']]);
        }

        // If everything looks fine, redirect to home where the item should
        // have been added to the queue
        if ($item->save()) {
            return redirect()->route('home');
        }

        return redirect()
            ->route('item.create')
            ->withInput()
            ->withErrors(['url' => CreateFormRequest::$messages['url.invalid']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
