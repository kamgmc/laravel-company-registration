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
<body class="antialiased">
<div class="w-full max-w-screen-lg mx-auto mt-8">
    <div class="w-full flex justify-end py-4">
        <a class="no-underline bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 ml-4 rounded cursor-pointer"
             href="{{ route('login') }}">
            Iniciar sesión
        </a>
    </div>
    @if(session("status"))
        <div class="bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div>
                    <p class="font-bold">{{session("status")}}</p>
                </div>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div>
                    <p class="font-bold">Ha ocurrido un error en el proceso de registro</p>
                    @foreach($errors->all() as $error)
                        <p class="text-sm">{{$error}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <form class="register-form w-full" method="post" action="{{route('register.user')}}">
        @csrf
        <section class="form-section">
            <div class="py-4">
                <div class="uppercase text-xl text-blue-400 font-bold">
                    Registrar empresa
                </div>
                <div class="text-gray-400">
                    Datos básicos para registrar su empresa en el sistema
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="company-name">
                        Nombre <span class="text-red-700">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-400 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="company-name"
                        name="company_name"
                        type="text"
                        required="required"
                        placeholder="Nombre de la empresa">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="company-rif">
                        RIF <span class="text-red-700">*</span>
                    </label>
                    <div class="flex">
                        <div class="relative w-20">
                            <select
                                class="block appearance-none w-full border border-r-0 border-blue-300 text-gray-700 py-3 px-4 pr-8 rounded-tl rounded-bl leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                                id="company-rif"
                                name="company_rif_prefix">
                                <option>J</option>
                                <option>V</option>
                                <option>G</option>
                                <option>E</option>
                            </select>
                        </div>
                        <input
                            class="appearance-none inline-block w-full text-gray-700 border border-l-0 border-blue-300 rounded-tr rounded-br py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                            id="company-rif"
                            name="company_rif"
                            type="text"
                            required
                            placeholder="12345678"
                            data-parsley-type="digits"
                            minlength="6"
                            maxlength="10"
                            data-parsley-errors-container="#rif-errors">
                    </div>
                    <div id="rif-errors"></div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="company-phone">
                        Teléfono <span class="text-red-700">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full text-gray-700 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="company-phone"
                        name="company_phone"
                        type="text"
                        required
                        placeholder="02124567890"
                        minlength="10"
                        maxlength="14"
                        data-parsley-type="digits">
                </div>
                <div class="w-full md:w-2/3 px-3 ">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="company-email">
                        Email
                    </label>
                    <input
                        class="appearance-none block w-full text-gray-700 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="company-email"
                        name="company_email"
                        type="email"
                        placeholder="test@example.com">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="company-address">
                        Dirección <span class="text-red-700">*</span>
                    </label>
                    <textarea
                        class="appearance-none block w-full text-gray-700 border border-blue-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="company-address"
                        name="company_address"
                        required
                        placeholder="Dirección de la empresa"></textarea>
                </div>
            </div>
            <div class="w-full pl-4 text-xs italic">
                (<span class="text-red-700">*</span>) Campos requeridos
            </div>
        </section>
        <section class="form-section">
            <div class="py-4">
                <div class="uppercase text-xl text-blue-400 font-bold">
                    Registrar usuario
                </div>
                <div class="text-gray-400">
                    Datos básicos para registrar el usuario en el sistema
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="user-first-name">
                        Nombre <span class="text-red-700">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-400 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="user-first-name"
                        name="user_first_name"
                        type="text"
                        required="required"
                        placeholder="Nombre"
                        data-parsley-pattern="^[a-zA-Z]+$">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="user-last-name">
                        Apellido <span class="text-red-700">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-400 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="user-last-name"
                        name="user_last_name"
                        type="text"
                        required="required"
                        placeholder="Apellido"
                        data-parsley-pattern="^[a-zA-Z]+$">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="user-document">
                        Cedula o RIF <span class="text-red-700">*</span>
                    </label>
                    <div class="flex">
                        <div class="relative w-20">
                            <select
                                class="block appearance-none w-full border border-r-0 border-blue-300 text-gray-700 py-3 px-4 pr-8 rounded-tl rounded-bl leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                                id="user-document"
                                name="user_document_prefix">
                                <option selected>V</option>
                                <option>J</option>
                                <option>G</option>
                                <option>E</option>
                            </select>
                        </div>
                        <input
                            class="appearance-none inline-block w-full text-gray-700 border border-l-0 border-blue-300 rounded-tr rounded-br py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                            id="user-document"
                            name="user_document"
                            type="text"
                            required
                            placeholder="12345678"
                            data-parsley-type="digits"
                            minlength="6"
                            maxlength="10"
                            data-parsley-errors-container="#user-document-errors">
                    </div>
                    <div id="user-document-errors"></div>
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="user-phone">
                        Teléfono <span class="text-red-700">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full text-gray-700 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="user-phone"
                        name="user_phone"
                        type="text"
                        required
                        placeholder="02124567890"
                        minlength="10"
                        maxlength="14"
                        data-parsley-type="digits">
                </div>
                <div class="w-full md:w-1/3 px-3 ">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="user-email">
                        Email <span class="text-red-700">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full text-gray-700 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="user-email"
                        name="user_email"
                        type="email"
                        required
                        placeholder="test@example.com">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="user-password">
                        Contraseña <span class="text-red-700">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-400 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="user-password"
                        name="user_password"
                        type="password"
                        required="required"
                        minlength="8"
                        placeholder="Contraseña">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="user-password-validation">
                        Repetir contraseña <span class="text-red-700">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-400 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="user-password-validation"
                        name="user_password_confirmation"
                        type="password"
                        required="required"
                        placeholder="Repetir contraseña"
                        data-parsley-equalto="#user-password">
                </div>
            </div>
            <div class="w-full pl-4 text-xs italic">
                (<span class="text-red-700">*</span>) Campos requeridos
            </div>
        </section>
        <div class="form-navigation w-full flex justify-end">
            <button class="previous bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 mx-2 rounded"
                    type="button">
                Regresar
            </button>
            <button class="next bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 ml-2 rounded"
                    type="button">
                Continuar
            </button>
            <button class="send bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 ml-4 rounded"
                    type="submit">
                Registrar
            </button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://parsleyjs.org/dist/parsley.min.js"></script>
<script src="{{ asset('js/parsley-es.js') }}"></script>
<script>
    $(function () {
        let $sections = $('.form-section')
        const $nextButton = $('.form-navigation .next')
        const $previousButton = $('.form-navigation .previous')
        const $sendButton = $('.form-navigation .send')
        const $form = $('.register-form')

        function navigateTo(index) {
            $sections.removeClass('current').eq(index).addClass('current')
            $previousButton.toggle(index > 0)
            const isLastSection = index >= $sections.length - 1
            $nextButton.toggle(!isLastSection)
            $sendButton.toggle(isLastSection)
        }

        function currentIndex() {
            return $sections.index($sections.filter('.current'))
        }

        $previousButton.click(function () {
            navigateTo(currentIndex() - 1)
        })

        $nextButton.click(function () {
            $form.parsley().whenValidate({
                group: 'block-' + currentIndex()
            }).done(function () {
                navigateTo(currentIndex() + 1);
            });
        });

        $sendButton.click(function () {
            $form.parsley().whenValidate({
                group: 'block-' + currentIndex()
            }).done(function () {
                $form.submit()
            });
        });

        $sections.each((index, section) => $(section).find(':input').attr('data-parsley-group', 'block-' + index))
        navigateTo(0)
    })
</script>
</body>
</html>
