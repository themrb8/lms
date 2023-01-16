<form wire:submit.prevent="formSubmit">
    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'placeholder' => 'Enter Name',
        'required' => 'required',
        'class' => 'w-full rounded-lg',
        ])
    </div>
    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'description',
        'label' => 'Description',
        'type' => 'textarea',
        'placeholder' => 'Write a description',
        'required' => 'required',
        'class' => 'w-full rounded-lg',
        ])
    </div>
    <div class="mb-6">
        @include('components.form-field', [
        'name' => 'price',
        'label' => 'Price',
        'type' => 'number',
        'placeholder' => 'Set a price',
        'required' => 'required',
        'class' => 'w-full rounded-lg',
        ])
    </div>

    <div class="flex mb-6 items-center">
        <div class="w-full mr-4">
            <label for="days">Days</label>
            <div class="flex flex-wrap -mx-4">
                @foreach ($days as $day)
                    <div class="min-w-max flex items-center px-4">
                        <input wire:model.lazy="selectedDays" type="checkbox" class="mr-2" value="{{$day}}" id="{{$day}}"> <label for="{{$day}}">{{ucfirst($day)}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mr-4">
            @include('components.form-field', [
            'name' => 'time',
            'label' => 'Time',
            'type' => 'time',
            'placeholder' => 'time',
            'required' => 'required',
            'class' => 'w-full rounded-lg',
            ])
        </div>
        <div>
            @include('components.form-field', [
            'name' => 'end_date',
            'label' => 'End Date',
            'type' => 'date',
            'placeholder' => 'End date of course',
            'required' => 'required',
            'class' => 'w-full rounded-lg',
            ])
        </div>
    </div>

    @include('components.wire-loading-btn')
</form>
