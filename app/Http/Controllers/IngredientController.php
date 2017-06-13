<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\CreateIngredientFormRequest;
use Illuminate\Auth\Access\Response;

class IngredientController extends Controller
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
        //
    }

    /**
     * Store a newly created ingredient in the DB.
     *
     * @param CreateFormRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateIngredientFormRequest $request)
    {
        $user = auth()->user();

        $ingredient = new Ingredient;

        $ingredient->name = $request->input('name');
        $ingredient->description = $request->input('description');
        $ingredient->image = $request->input('image');
        $ingredient->user_id = $user->id;

        if(!$ingredient->save()) {
//            return redirect()
//                ->route('recipe.create')
//                ->withInput()
//                ->withErrors(['url' => CreateFormRequest::$messages['url.invalid']]);
//            return Response::json([
//                'error' => 'Not saved'
//            ]);
            die(json_encode(['error' => 'Not saved']));
        }

        // Create ingredient unit relationships
        foreach(Unit::getTypes() as $type) {
            if($request->input('unit_' . $type)) {
                $units = Unit::loadByType($type);
                $ingredient->units()->saveMany($units);
            }
        }

//        return redirect()->route('recipe.create');

        die($ingredient->toJson());

//        return Response::json([
//            'ingredient' => $ingredient->toJson()
//        ])->header('Content-Type', 'application/json');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        //
    }
}
