<form wire:submit.prevent="formSubmit">
    <div class="flex -mx-4 mb-4">
        <div class="flex-1 px-4">
            <label for="name" class="uppercase">Name</label>
            <input wire:model.lazy="name" id="name" type="text" class="w-full rounded-lg">

            @error('name')
            <div class="text-red-500 text-sm mt-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex-1 px-4">
            <label for="email" class="uppercase">Email</label>
            <input wire:model.lazy="email" id="email" type="text" class="w-full rounded-lg">

            @error('email')
            <div class="text-red-500 text-sm mt-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex-1 px-4">
            <label for="password" class="uppercase">Password</label>
            <input wire:model.lazy="password" id="password" type="text" class="w-full rounded-lg">

            @error('password')
            <div class="text-red-500 text-sm mt-4">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-4">
        <label for="role" class="uppercase">Role</label>
        <select wire:model.lazy="role" id="role" class="w-full rounded-lg">
            <option value="" >Select role</option>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
        </select>
            @error('role')
            <div class="text-red-500 text-sm mt-4">{{ $message }}</div>
            @enderror
    </div>

    @include('components.wire-loading-btn')
</form>
