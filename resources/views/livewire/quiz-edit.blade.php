<div>
    <h2 class="uppercase mb-4 font-bold">Add</h2>
    @if (count($questions) > 0)
    <form wire:submit.prevent="addQuestion">
        <div class="mb-4">
            <label for="question_id">Question</label>
            <select wire:model.lazy="question_id" id="question_id" class="w-full">
                <option value="">Select a question</option>
                @foreach ($questions as $question)
                    <option value="{{$question->id}}">{{$question->name}}</option>
                @endforeach
            </select>
        </div>
        @include('components.wire-loading-btn')
    </form>
    @else
        <span class="text-sm text-red-500 font-semibold">no available questions</span>
    @endif



    <h2 class="uppercase mb-4 mt-8 font-bold">Selected Questions for Quiz</h2>
    <ul>
        @foreach ($quiz->questions as $question)
        <li>{{$question->name}}</li>

        @endforeach
    </ul>
</div>
