<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Price</th>
            <th class="border px-4 py-2 text-center">Total Class
            <th class="border px-4 py-2 text-center">Total Students
            </th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($courses as $course)
            <tr>
                <td class="border px-4 py-2">{{ $course->name }}</td>
                <td class="border px-4 py-2">${{ $course->price }}</td>
                <td class="border px-4 py-2 text-center">
                    {{count($course->curriculums)}}
                </td>
                <td class="border px-4 py-2 text-center">
                    {{count($course->students)}}
                </td>



                <td class="border px-4 py-2 text-center flex items-center justify-center space-x-4">

                    <a href="{{ route('course.edit', $course->id)}}">@include('components.icons.edit')</a>
                    <a href="{{ route('course.show', $course->id)}}">@include('components.icons.view')</a>

                    <form onsubmit="return confirm('Are you sure?');" wire:submit.prevent="courseDelete({{$course->id}})">
                        <button type="submit" class="inline-block">
                            @include('components.icons.delete')
                        </button>
                    </form>

                </td>
            </tr>

            @endforeach
        </table>

        <div class="mt-4">
            {{$courses->links()}}
        </div>
</div>
