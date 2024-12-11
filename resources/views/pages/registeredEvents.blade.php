@extends('app')

@section('header')
    @include('components.navbar', ['page' => 'registered'])
@endsection

@section('content')
    <div class="container-fluid">
        <br>
        <br>
        <div class="heading">
            <h1>Events that you have registered</h1>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Poster</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                    <tr>
                        <td>
                            <img src="{{ $event->image }}" height="200px" width="120px" alt="Event Image">
                        </td>
                        <td>
                            <p>{{ $event->title }}</p>
                        </td>
                        <td>
                            <p>{{ $event->dateTime }}</p>
                        </td>
                        <td>
                            <a href="/registeredDetail?id={{ $event->id }}" class="green"><i
                                    class="fa-regular fa-eye"></i>Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No events yet!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
