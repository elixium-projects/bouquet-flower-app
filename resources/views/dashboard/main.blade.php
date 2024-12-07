@extends('layouts.dashboard')


@section('content')
    <h2>Welcome</h2>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <x-ui.button type="submit" label="Logout" />
    </form>
@endsection
