<div class="mt-6">
    @foreach ($quiz as $item)
    <div class="flex justify-between items-center bg-slate-100 py-2 px-4 rounded mb-4">
        <h3 class="font-semibold text-lg">{{$item->name}}</h3>
        <span class="ml-auto mr-4"><a href="{{route('quiz-show', $item->id)}}">@include('components.icons.view')</a></span>
        <span><a href="{{route('quiz.show', $item->id)}}">@include('components.icons.edit')</a></span>
    </div>
    @endforeach
</div>
