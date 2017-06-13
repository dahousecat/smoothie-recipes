<?php

namespace App\Http\Controllers\Api;

use App\Models\Ingredient;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Input;
use Response;

use App\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\CreateIngredientFormRequest;

use Neomerx\JsonApi\Document\Error;
use Neomerx\JsonApi\Document\Link;
use Neomerx\JsonApi\Encoder\Encoder;

class IngredientApiController //extends JsonApiController
{
    /**
     * Store an ingredient in the DB
     */
    public function store() {

        if (Session::token() !== Input::get('_token')) {
            //return Response::json(['error' => 'Unauthorized attempt to create ingredients']);
            $error = new Error('Unauthorized attempt to create ingredients');
            Encoder::instance()->encodeError($error);
        }

        $user = auth()->user();

//        d($_SESSION);
        d($user);
        die();

        $ingredient = new Ingredient;

        $ingredient->name = Input::get('name');
        $ingredient->description = Input::get('description');
        $ingredient->image = Input::get('image');
        $ingredient->user_id = $user->id;

        if(!$ingredient->save()) {
            return Response::json([
                'error' => 'Not saved'
            ]);
        }

        // Create ingredient unit relationships
        foreach(Unit::getTypes() as $type) {
            if(Input::get('unit_' . $type)) {
                $units = Unit::loadByType($type);
                $ingredient->units()->saveMany($units);
            }
        }

        // Encode the model data for json:api consumption
        $encoder = Encoder::instance($this->modelSchemaMappings, $this->encoderOptions);
        $encodedData = $encoder->encodeData($ingredient);

        return response($encodedData)
            ->header('Content-Type', 'application/json');

    }
}