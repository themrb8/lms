<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Role</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">
                    @foreach ($user->roles as $role)
                        <span class="px-2 py-1 bg-violet-600 text-white rounded text-sm">{{ $role->name }}</span>
                    @endforeach
                </td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a href="{{ route('user.edit', $user->id) }}">@include('components.icons.edit')</a>
                        <form onsubmit="return confirm('Are you sure?');" wire:submit.prevent="userDelete({{$user->id}})">
                            <button type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>

                </td>
            </tr>

            @endforeach
        </table>
</div>
