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
<div class="w-full max-w-screen-lg mx-auto">
    <form class="register-form w-full" method="post">
        @csrf
        <section class="form-section">
            <div class="py-4">
                <div class="uppercase text-xl text-blue-400 font-bold">
                    Registrar empresa
                </div>
                <div class="text-gray-400">
                    Datos basicos para registrar su empresa en el sistema
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="company-name">
                        Nombre <span class="text-red-700">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-400 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="company-name"
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
                                id="company-rif">
                                <option>J</option>
                                <option>V</option>
                                <option>G</option>
                                <option>E</option>
                            </select>
                        </div>
                        <input
                            class="appearance-none inline-block w-full text-gray-700 border border-l-0 border-blue-300 rounded-tr rounded-br py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                            id="company-rif"
                            type="text"
                            required
                            placeholder="12345678"
                            data-parsley-errors-container="#rif-errors">
                    </div>
                    <div id="rif-errors"></div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="company-phone">
                        Telefono <span class="text-red-700">*</span>
                    </label>
                    <input
                        class="appearance-none block w-full text-gray-700 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="company-phone"
                        type="text"
                        required
                        placeholder="+581234567890">
                </div>
                <div class="w-full md:w-2/3 px-3 ">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="company-email">
                        Email
                    </label>
                    <input
                        class="appearance-none block w-full text-gray-700 border border-blue-300 rounded py-3 px-4 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="company-email"
                        type="email"
                        placeholder="test@example.com">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="company-address">
                        Direccion <span class="text-red-700">*</span>
                    </label>
                    <textarea
                        class="appearance-none block w-full text-gray-700 border border-blue-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:shadow-none focus:ring-0 focus:border-blue-500"
                        id="company-address"
                        required
                        placeholder="Direccion de la empresa"></textarea>
                </div>
            </div>
            <div class="w-full pl-4 text-xs italic">
                (<span class="text-red-700">*</span>) Campos requeridos
            </div>
        </section>
        <div class="form-navigation w-full flex justify-end">
            <button class="previous bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 mx-2 rounded"
                    type="button">
                Anterior
            </button>
            <button class="next bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 ml-2 rounded"
                    type="button">
                Siguiente
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

        function navigateTo(index) {
            $sections.removeClass('current').eq(index).addClass('current')
            $previousButton.toggle(index > 0)
            const isLastSection = index >= $sections.length - 1
            $nextButton.toggle(!isLastSection)
            $('.form-navigation .send').toggle(isLastSection)
        }

        function currentIndex() {
            return $sections.index($sections.filter('.current'))
        }

        $previousButton.click(function () {
            navigateTo(currentIndex() - 1)
        })

        $nextButton.click(function () {
            $('.register-form').parsley().whenValidate({
                group: 'block-' + currentIndex()
            }).done(function () {
                navigateTo(currentIndex() + 1);
            });
        });

        $sections.each((index, section) => $(section).find(':input').attr('data-parsley-group', 'block-' + index))
        navigateTo(0)
    })
</script>
</body>
</html>
