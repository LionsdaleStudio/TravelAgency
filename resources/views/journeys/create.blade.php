@extends('layouts.app')

@section('content')
    <h4>Create a new destination</h4>

    <div class="form-container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="Firenze">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" value="250000">
            </div>
            <div class="form-group">
                <label for="travel_time">Travel time (hours):</label>
                <input type="number" name="travel_time" id="travel_time" value="2.50" step=".00">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="Firenze is the home of quality leather stuff...">
            </div>
            <div class="form-group-check">
                <label for="visa">Visa:</label>
                <input type="checkbox" name="visa" id="visa">
            </div>
            <div style="text-align:center;">
                <button class="likeAtag">Add new destination</button>
            </div>
        </form>
    </div>
@endsection