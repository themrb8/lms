<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Price</th>
            <th class="border px-4 py-2 text-left">Course's Curriculum
            </th>
            <th class="border px-4 py-2">Time</th>
            <th class="border px-4 py-2">Course End Date</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($courses as $course)
            <tr>
                <td class="border px-4 py-2">{{ $course->name }}</td>
                <td class="border px-4 py-2">${{ $course->price }}</td>
                <td class="border px-4 py-2">
                    @foreach ($course->curriculams as $curriculam)
                    {{ $curriculam->name }}
                    @endforeach
                </td>
                <td class="border px-4 py-2 text-center">{{ $course->time }}</td>
                <td class="border px-4 py-2 text-center">{{ $course->end_date }}</td>



                <td class="border px-4 py-2 text-center flex  items-center justify-center space-x-2">

                    <a href="#">@include('components.icons.edit')</a>
                    <a href="#">@include('components.icons.view')</a>

                    <form onsubmit="return confirm('Are you sure?');" wire:submit.prevent="invoiceDelete({{$course->id}})">
                        <button type="submit">
                            @include('components.icons.delete')
                        </button>
                    </form>

                </td>
            </tr>

            @endforeach
        </table>
{{--
       {{dd($curriculams)}} --}}
        {{-- <div class="mt-4">
            {{$courses->links()}}
        </div> --}}
</div>
