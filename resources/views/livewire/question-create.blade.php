<form wire:submit.prevent="formSubmit">
    <div class="mb-8">
        @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Question name',
            'required' => 'required',
            'class' => 'w-full rounded-sm',
        ])
    </div>
    @foreach ($answers as $answer)
        <div class="mb-4 grid grid-cols-2 gap-2">
            @include('components.form-field', [
                'name' => 'answer_'.$answer,
                'label' => 'Answer '.ucfirst($answer),
                'type' => 'text',
                'placeholder' => 'Type answer '.$answer,
                'required' => 'required',
                'class' => 'w-full rounded-sm',
            ])
        </div>
    @endforeach

    <div class="mb-4">
        <label for="correct_answer">Correct Answer</label>
        <select wire:model.prevent="correct_answer"  id="correct_answer" class="w-full roounded-sm">
            @foreach ($answers as $answer)
                <option value="{{$answer}}">{{ucfirst($answer)}}</option>
            @endforeach
        </select>
    </div>
    @include('components.wire-loading-btn')
</form>
