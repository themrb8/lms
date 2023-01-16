<div>
    <form wire:submit.prevent="submitForm" class="mb-6">

        <div class="flex -mx-4 mb-4">
        <div class="flex-1 px-4">
            <label for="" class="uppercase">Name</label>
            <input wire:model="name" type="text" class="w-full rounded-lg">

            @error('name')
                <div class="text-red-500 text-sm mb-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex-1 px-4">
            <label for="" class="uppercase">Email</label>
            <input wire:model="email" type="text" class="w-full rounded-lg">

            @error('email')
                <div class="text-red-500 text-sm mb-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex-1 px-4">
            <label for="" class="uppercase">Phone</label>
            <input wire:model="phone" type="text" class="w-full rounded-lg">

            @error('phone')
                <div class="text-red-500 text-sm mt-4">{{ $message }}</div>
            @enderror
        </div>
        </div>

        @include('components.wire-loading-btn')
    </form>

    <table class="w-full table-auto rounded-lg mb-6">
        <tr>
            <th class="border px-4 py-2 text-left">Notes</th>
        </tr>

        @foreach($notes as $note)
            <tr>
                <td class="border px-4 py-2">{{ $note->description }}</td>
            </tr>

            @endforeach
        </table>

    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model.lazy="note" placeholder="Type note" class="w-full rounded-lg"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 py-2 px-4 text-white rounded-lg">Save</button>
    </form>

</div>
