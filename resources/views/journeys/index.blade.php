@extends('layouts.app')

@section('content')
    <p>Here are our journey destinations: </p>

    @if (session()->has('msg'))
        <p class="sessionMsg">{{ session()->get('msg') }}</p>
    @endif

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
                        @if (isset($journey->deleted_at))
                            <form action="{{ route('journeys.restore', $journey) }}" method="POST">
                                @csrf
                                <button class="likeAtag">Restore</button>
                            </form>
                        @else
                            <a href="{{ route('journeys.show', $journey) }}">Show</a>

                            <a href="{{ route('journeys.edit', $journey) }}" class="likeAtag">Edit</a>

                            <form action="{{ route('journeys.destroy', $journey) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="likeAtag">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
