@extends('layouts.app')

@section('content')
    <h4>Edit the {{ $journey->name }} destination</h4>
    {{-- Összes error kilistázása --}}
    @if ($errors->any())
        {{-- Ha van error a validáció után --}}
        <ul class="errorList">
            @foreach ($errors->all() as $error)
                {{-- lekéred az összes error-t --}}
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {{-- Errorok vége --}}
    <div class="form-container">
        <form action="{{ route('journeys.store') }}" method="POST">
            @csrf {{-- Hidden változó _token --}}
            <div class="form-group">
                <label for="name">Name:</label>
                @error('name')
                    {{-- Error üzenet specifikus input --}}
                    <span>{{ $errors->first('name') }}</span> {{-- get("name") tömbként az összes névhez tartozó error-t hozná --}}
                @enderror
                <input type="text" name="name" id="name" value="{{ old("name", $journey->name) }}"
                    @error('name') style="border: 2px solid red"
                @enderror>

            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                @error('price')
                    <span>{{ $errors->first('price') }}</span>
                @enderror
                <input type="number" id="price" name="price" value="{{ old("price", $journey->price) }}">
            </div>
            <div class="form-group">
                <label for="travel_time">Travel time (hours):</label>
                <input type="number" name="travel_time" id="travel_time" step=".01" value="{{ old("travel_time", $journey->travel_time) }}">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="{{ old("description", $journey->description) }}">
            </div>
            <div class="form-group-check">
                <label for="visa">Visa:</label>
                <input type="checkbox" name="visa" id="visa" value="1" {{ old("visa") ? "checked" : "" }} {{ $journey->visa ? "checked" : "" }}>
            </div>
            <div style="text-align:center;">
                <button class="likeAtag">Add new destination</button>
            </div>
        </form>
    </div>

@endsection
