
@extends('layouts.app')

@section('title', 'Create Recipe')

@section('headerJS')


    {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    {{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>--}}

@endsection

@section('content')

    {!! Form::open(['route' => 'recipe.store', 'class' => 'form-horizontal']) !!}

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Add recipe</div>
                <div class="panel-body">

                    @include('forms.create_recipe')

                </div>
            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Ingredients</div>
                <div class="panel-body">

                    <ul id="recipe_ingredients" class="connectedSortable drop-zone empty ingredients-list">


                    </ul>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Pantry</div>
                <div class="panel-body">

                    <ul id="pantry_ingredients" class="connectedSortable ingredients-list">

                        @foreach($pantry_ingredients as $ingredient)

                            <li class="ingredient btn btn-info"
                                data-id="{{ $ingredient->name }}"
                                data-units="{{ $ingredient->jsonUnitIds() }}">
                                <span class="name">{{ $ingredient->name }}</span>
                            </li>

                        @endforeach

                    </ul>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addIngredientModal">Add ingredient</button>

                </div>
            </div>
        </div>

    </div>

    {!! Form::close() !!}

    <div id="addIngredientModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Ingredient</h4>
                </div>
                <div class="modal-body">

                    @include('forms.create_ingredient')

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@endsection
