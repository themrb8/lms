<div>
    <div class="mb-6 flex justify-center items-center space-x-6 rounded">
        <p class="bg-green-700 py-2 px-6 rounded text-white">Correct: {{$countCorrectAnswer}}</p>
        <p class="bg-red-700 py-2 px-6 rounded text-white">Incorrect: {{$countIncorrectAnswer}}</p>
    </div>
    @foreach ($quiz->questions as $question)
    <div class="mb-4 bg-slate-100 py-2 px-4 rounded @if(array_key_exists($question->id, $answered)) bg-{{$answered[$question->id] ? 'green': 'red'}}-100 @endif">
        <h2 class="font-bold text-lg">{{$question->name}}</h2>
        <div class="mt-2 mb-2 grid grid-cols-4 gap-4">

            @foreach ($answerOpitons as $answerItem)
            <div class="mr-2">
                <input wire:model="answer" value="{{explode('_', $answerItem)[1]}}, {{$question->id}}" wire:change.prevent="check" id="{{$answerItem}}-{{$question->id}}" type="radio" @if(array_key_exists($question->id, $answered)) disabled @endif>
                <label for="{{$answerItem}}-{{$question->id}}">{{$question->$answerItem}}</label>
            </div>
            @endforeach

        </div>
    </div>
    @endforeach


</div>
