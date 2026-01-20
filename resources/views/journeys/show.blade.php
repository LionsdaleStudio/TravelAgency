@extends('layouts.app')

@section('content')
    <h3>Here are the details of our {{ $journey->name }} destination.</h3>

    <p>{{$journey->description}}</p>

    <table>
        <thead>
            <th>Name</th>
            <th>Price</th>
            <th>Travel Time</th>
            <th>Visa needed</th>
            <th>Actions</th>
        </thead>
        <tbody>
                <tr class="datarow">
                    <td>{{ $journey->name }}</td>
                    <td>{{ $journey->price }} HUF</td>
                    <td>{{ $journey->travel_time }} hours</td>
                    <td><input type="checkbox" {{ $journey->visa ? 'checked' : '' }} disabled></td>
                    <td class="actions">
                        <a href="{{ route('journeys.edit', $journey) }}" class="likeAtag">Edit</a>

                        <form action="{{ route('journeys.destroy', $journey) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="likeAtag">Delete</button>
                        </form>
                    </td>
                </tr>
        </tbody>
    </table>
@endsection
