<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registro</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    </style>
</head>
<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
<body class="antialiased">
<div class="w-full max-w-screen-lg mx-auto mt-8">
    <div class="w-full flex justify-end py-4">
        <a class="no-underline bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 ml-4 rounded cursor-pointer"
           href="{{ route('logout') }}">
            Cerrar sesión
        </a>
    </div>
    <div class="login-form w-full">
        <div class="py-4">
            <div class="uppercase text-xl text-blue-400 font-bold">
                {{$user->first_name}} {{$user->last_name}}
            </div>
            <div class="text-xl text-blue-300">
                {{$user->email}}
            </div>
            <div class="text-lg text-gray-400">
                {{$user->document}}
            </div>
            <div class="text-lg text-gray-400">
                Teléfono: {{$user->phone}}
            </div>
            <hr class="my-4"/>
            <div class="uppercase text-xl text-blue-400 font-bold">
                {{$user->company->name}}
            </div>
            @if($user->company->email)
                <div class="text-xl text-blue-300">
                    {{$user->company->email}}
                </div>
            @endif
            <div class="text-lg text-gray-400">
                {{$user->company->rif}}
            </div>
            <div class="text-lg text-gray-400">
                Teléfono: {{$user->company->phone}}
            </div>
            <div class="text-gray-400">
                Dirección: {{$user->company->address}}
            </div>
        </div>
    </div>
</div>
</body>
</html>
