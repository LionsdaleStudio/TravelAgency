@extends('layouts.app')


@section('content')
    @auth {{-- Be van-e jelentkezve valaki --}}
        @if (isset(Auth::user()->journeys) && count(Auth::user()->journeys) != 0)
            <table>
                <thead>
                    <th>Journey's destination</th>
                    <th>Time of booking</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach (Auth::user()->journeys as $journey)
                        <tr>
                            <td>{{ $journey->name }}</td>
                            <td>{{ $journey->created_at }}</td>
                            <td>---</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1>Unfortunately you don't have any bookings. Book now!</h1>
        @endif
    @else
        <h1>Please log in!</h1>
    @endauth
@endsection
