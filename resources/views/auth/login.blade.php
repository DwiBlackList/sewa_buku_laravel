@extends('layout.login_layout')
@section('content')
<x-guest-layout>
    <x-auth-card>
       

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="container bg-dark d-flex aligns-items-center justify-content-center" style="height:100vh;">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <tr>
                            <td>E - Mail</td>
                            <td>:</td>
                            <td><x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus   /></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td>
                                <x-input id="password" class="block form-control mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <input id="remember_me" type="checkbox" class="rounded form-check-input border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </td>
                            <td colspan="2">
                                <div class="d-grid">
                                    <x-button class="btn">
                                        {{ __('Log in') }}
                                    </x-button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection