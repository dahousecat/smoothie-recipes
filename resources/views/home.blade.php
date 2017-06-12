@extends('layouts.app')

@section('title', config('app.name', 'Smoothie Recipes'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <p>Search smoothie recipes</p>
                        <p><a href="recipe/create">Create smoothie recipe</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
