<div>
    <h2 class="text-xl font-bold uppercase mb-4">Course Detail</h2>
    <table class="w-full table-auto mb-12">
        <tr class="bg-slate-300">
            <th class="border px-4 py-2 text-left">Course Name</th>
            <th class="border px-4 py-2">Description</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Total Students</th>
        </tr>
        <tr>

            <td class="border px-4 py-2">{{$curriculum->course->name}}</td>
            <td class="border px-4 py-2 text-center">{{$curriculum->course->description}}</td>
            <td class="border px-4 py-2 text-center">{{$curriculum->course->price}}</td>
            <td class="border px-4 py-2 text-center">{{count($curriculum->course->students)}}</td>
        </tr>
        </table>


    <h2 class="text-xl font-bold uppercase mb-4">Class Detail</h2>
    <table class="w-full table-auto mb-12">
        <tr class="bg-slate-400">
            <th class="border px-4 py-2 text-left">Class Name</th>
            <th class="border px-4 py-2 text-left">Present</th>
            <th class="border px-4 py-2 text-left">Absent</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        <tr>

            <td class="border px-4 py-2">{{$curriculum->name}}</td>
            <td class="border px-4 py-2 text-center">{{$curriculum->presentStudents()}}</td>
            <td class="border px-4 py-2 text-center">{{$curriculum->course->students()->count() - $curriculum->presentStudents()}}</td>

            <td class="border px-4 py-2 text-center flex items-center justify-center space-x-4">

                <a href="#">@include('components.icons.edit')</a>
                <a href="#">@include('components.icons.view')</a>

                <form class="inline-block" onsubmit="return" confirm('Are you sure?')" wire:submit.prevent="invoiceDelete()">
                    <button type="submit" class="inline-block">
                        @include('components.icons.delete')
                    </button>
                </form>

            </td>
        </tr>
        </table>


    <h2 class="text-xl font-bold uppercase mb-4">Student Detail</h2>
    <table class="w-full table-auto mb-12">
        <tr class="bg-slate-400">
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Attendance</th>
        </tr>

        @foreach ($curriculum->course->students as $student)
        <tr>

            <td class="border px-4 py-2">{{$student->name}}</td>
            <td class="border px-4 py-2 text-center">{{$student->email}}</td>
            <td class="border px-4 py-2 text-center">
                @if ($student->is_present($curriculum->id))
                    Presented
                @else
                <button wire:click="attendance({{$student->id}})" class="py-2 px-4 bg-green-500 text-white">Present</button>
                @endif
            </td>
        </tr>
        @endforeach
        </table>


        <h2 class="text-xl font-bold uppercase mb-4">Notes</h2>

        @if (count($notes)>0)

        @foreach($notes as $note)
        <div class="mb-4 border border-gray-100 p-4">{{$note->description}}</div>
        @endforeach

        @else
        <p class="text-red-500 text-sm">Empty</p>
        @endif


        <h2 class="text-xl font-bold uppercase mb-4">Add New Note</h2>
        <form wire:submit.prevent="addNote">
            <div class="mb-6">
                <textarea wire:model="note" placeholder="Write" class="w-full rounded-sm"></textarea>
            </div>
            <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-sm">Save</button>
        </form>

</div>
