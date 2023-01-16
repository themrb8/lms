<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Class Detail") }}
            </h2>
            <a class="bg-orange-500 py-2 px-6 text-white rounded-lg" href="{{ route('course.show', $id)}}">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:curriculum-show :curriculum_id="$id"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
