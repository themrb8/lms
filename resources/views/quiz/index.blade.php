<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quizzes') }}
            </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('quiz.store')}}" method="POST">@csrf
                        <div class="mb-4">
                            <label for="name" class="uppercase">Name</label>
                            <input type="text" name="name" id="name" class="w-full">
                        </div>
                        <button type="submit" class="py-2 px-4 bg-green-500 text-white rounded">Add</button>
                    </form>

                    <livewire:quiz-index />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
