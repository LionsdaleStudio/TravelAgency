@extends('layouts.app')

@section('content')
    <p>Here are our journey destinations: </p>
    <table>
        <thead>
            <th>Name</th>
            <th>Price</th>
            <th>Travel Time</th>
            <th>Visa needed</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($journeys as $journey)
                <tr class="datarow">
                    <td>{{ $journey->name }}</td>
                    <td>{{ $journey->price }} HUF</td>
                    <td>{{ $journey->travel_time }} hours</td>
                    <td><input type="checkbox" {{ $journey->visa ? 'checked' : '' }} disabled></td>
                    <td class="actions">
                        <a href="">Show</a>
                        <form action="">
                            <button class="likeAtag">Edit</button>
                        </form>
                        <form action="">
                            <button class="likeAtag">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
