<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Cтраница А
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form METHOD="post" style="display: inline" action="{{ route('page.generate.link') }}">
                        @csrf
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Cгенерировать новый уникальный линк
                        </button>
                    </form>

                    <form METHOD="post" style="display: inline" action="{{ route('page.disable', $link) }}">
                        @csrf
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Деактивировать данный уникальный линк
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button id="Imfeelinglucky" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Imfeelinglucky
                    </button>
                    <button id="game_history_bnt" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        History
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12" style="display: none" id="game_wrap">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Число: <b id="game_num"> </b>
                    Результат: <b id="game_res"> </b>
                    Cумма выиграша: <b id="game_sum"> </b>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12"  >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="game_history_wrap">
            <b style="color: #fff">История</b>
        </div>

    </div>


</x-app-layout>
