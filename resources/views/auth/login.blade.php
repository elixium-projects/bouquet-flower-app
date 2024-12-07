@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="grid min-h-screen grid-cols-2">
        <div class="px-28 place-content-center">
            <h2 class="mb-8">Login</h2>

            <form action="{{ route('login') }}" method="post" autocomplete="off">
                @csrf

                <div class="mb-14">
                    <div class="mb-4 space-y-2">
                        <x-ui.input-label value="Alamat email" isRequired />
                        <x-ui.input-element type="text" placeholder="Alamat email" name="email" />
                        <x-ui.input-error :messages="$errors->get('email')" />
                    </div>
                    <div class="space-y-2">
                        <x-ui.input-label value="Kata sandi" isRequired />
                        <x-ui.input-element type="password" name="password" placeholder="Kata sandi" />
                        <x-ui.input-error :messages="$errors->get('password')" />
                    </div>
                </div>

                <x-ui.button type="submit" label="Masuk" class="w-full rounded-lg" />
            </form>
        </div>
        <div class="bg-primary-600"></div>
    </div>
@endsection
