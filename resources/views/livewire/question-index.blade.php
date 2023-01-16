<div>
    @foreach ($questions as $question)
    <div class="mb-4 bg-slate-100 py-2 px-4 rounded">
        <h2 class="font-bold text-lg">{{$question->name}}</h2>
        <div class="mt-2 grid grid-cols-2 gap-4">
            <p>1. {{$question->answer_a}}</p>
            <p>2. {{$question->answer_b}}</p>
            <p>3. {{$question->answer_c}}</p>
            <p>4. {{$question->answer_d}}</p>
        </div>
        <div class="inline-flex justify-center items-center space-x-8 mt-6">
            <a href="{{route('question.edit', $question->id)}}" class="bg-green-500 text-white py-1 px-8 rounded shadow-sm">@include('components.icons.edit')</a>
            <form onsubmit="return confirm('Are you sure?');"
                    wire:submit.prevent="questionDelete({{$question->id}})">
                    <button class="bg-red-500 text-white py-1 px-8 rounded shadow-sm" type="submit">
                        @include('components.icons.delete')
                    </button>
            </form>
        </div>
    </div>
    @endforeach

    {{$questions->links()}}
</div>
