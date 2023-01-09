<label for="{{$name}}">{{$label}}</label>
@if ($type === 'textarea')
    <textarea wire:model.lazy="{{$name}}" type="{{$type}}" id="{{$name}}" placeholder="{{$placeholder}}" {{$required}} class="{{$class}}"></textarea>
@else
    <input wire:model.lazy="{{$name}}" type="{{$type}}" id="{{$name}}" placeholder="{{$placeholder}}" {{$required}} class="{{$class}}">

@endif

@error($name)
<div class="text-red-500 text-sm mt-2">{{$message}}</div>
@enderror
