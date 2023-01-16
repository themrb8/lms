<div>
    <table class="w-full table-auto mb-12">
        <tr class="bg-slate-300">
            <th class="border px-4 py-2 text-left">Course Name</th>
            <th class="border px-4 py-2">Description</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Total Students</th>
        </tr>

        @foreach ($course as $item)
        <tr>
            <td class="border px-4 py-2 hidden" wire:model="course_id">{{$item->id}}</td>
            <td class="border px-4 py-2">{{$item->name}}</td>
            <td class="border px-4 py-2 text-center">{{$item->description}}</td>
            <td class="border px-4 py-2 text-center">${{$item->price}}</td>
            <td class="border px-4 py-2 text-center">
                    {{count($item->students)}}
            </td>
        </tr>
        @endforeach
        </table>

    <table class="w-full table-auto">
        <tr class="bg-slate-400">
            <th class="border px-4 py-2 text-left">Classes Name ({{count($curriculum)}})</th>
            <th class="border px-4 py-2 text-left">Class Time & Day</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($curriculum as $class)

        <tr>
            <td class="border px-4 py-2">{{$class->name}}</td>
            <td class="border px-4 py-2">{{$class->class_time}} ~ {{$class->week_day}}</td>

            <td class="border px-4 py-2 text-center flex items-center justify-center space-x-4">

                <a href="#">@include('components.icons.edit')</a>
                <a href="{{ route('curriculum.show', $class->id)}}">@include('components.icons.view')</a>

                <form class="inline-block" onsubmit="return" confirm('Are you sure?')" wire:submit.prevent="invoiceDelete()">
                    <button type="submit" class="inline-block">
                        @include('components.icons.delete')
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
        </table>



</div>
