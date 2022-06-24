<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<x-guest-layout>
    <x-auth-card class="bg-dark">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            
            <div class="container bg-dark d-flex aligns-items-center justify-content-center" style="height:100vh;">
                <div class="row">
                    <div class=" col-12"></div>
                    <div class=" col-12">
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <tr>
                                    <td>Nama </td>
                                    <td>: </td>
                                    <td>
                                        <x-input id="name" class="block mt-1 form-control w-full" type="text" name="name" :value="old('name')" required autofocus />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email </td>
                                    <td>: </td>
                                    <td>
                                        <x-input id="email" class="block mt-1 form-control w-full" type="email" name="email" :value="old('email')" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password </td>
                                    <td>: </td>
                                    <td>
                                        <x-input id="password" class="block mt-1 form-control w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Confirm Password </td>
                                    <td>: </td>
                                    <td>
                                        <x-input id="password_confirmation" class="block mt-1 form-control w-full"
                                        type="password"
                                        name="password_confirmation" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                           {{ __('Already registered?') }}
                                        </a>     
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="d-grid">
                                            <x-button class="btn ml-4">
                                                {{ __('Register') }}
                                            </x-button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-12"></div>
                </div>
                
<!--             
                
            
                <div>
                    <x-label for="name" :value="__('Name')" />

                    
                </div>

                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    
                </div>

                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div> -->
            </div> 
        </form>
    </x-auth-card>
</x-guest-layout>

</body>
</html>