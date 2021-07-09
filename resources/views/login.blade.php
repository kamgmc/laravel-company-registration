<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    </style>
</head>
<body class="antialiased">
<div class="w-full max-w-screen-lg mx-auto mt-8">
    <div class="w-full flex justify-end py-4">
        <a class="no-underline bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 ml-4 rounded cursor-pointer"
           href="/">
            Registro
        </a>
    </div>
    @if(session('error'))
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div>
                    <p class="font-bold">Ha ocurrido un error</p>
                    <p class="text-sm">{{session('error')}}</p>
                </div>
            </div>
        </div>
    @endif
    <form class="login-form w-full" method="post" action="{{route('login.form')}}">
        @csrf
        <div class="py-4">
            <div class="uppercase text-xl text-blue-400 font-bold">
               Iniciar sesión
            </div>
            <div class="text-gray-400">
                Inicia sesión con tus credenciales
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-4">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                       for="email">
                    Email <span class="text-red-700">*</span>
                </label>
                <input
                    class="appearance-none block w-full bg-white text-gray-700 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                    id="email"
                    name="email"
                    type="email"
                    required="required"
                    placeholder="Email">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                       for="password">
                    Contraseña <span class="text-red-700">*</span>
                </label>
                <input
                    class="appearance-none block w-full bg-white text-gray-700 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                    id="password"
                    name="password"
                    type="password"
                    required="required"
                    placeholder="Contraseña">
            </div>
            <div class="w-full flex justify-end px-3 pt-4">
                <button class="login-btn bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 ml-4 rounded"
                        type="submit">
                    Ingresar
                </button>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://parsleyjs.org/dist/parsley.min.js"></script>
<script src="{{ asset('js/parsley-es.js') }}"></script>
<script>
    $(function () {
        const $sendButton = $('.login-btn')
        const $form = $('.login-form')

        $sendButton.click(function () {
            $form.parsley().done(function () {
                $form.submit()
            });
        });
    })
</script>
</body>
</html>
