<div>
    <form wire:submit.prevent="search" class="flex items-center">
        <input type="text" wire:model.lazy="search" class="w-full mr-4 rounded-lg" placeholder="Search">
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 border border-blue-500 w-1/5 rounded-lg">Search</button>
    </form>


    @if (count($leads) > 0)
        <form wire:submit.prevent="admit">
            <div class="mb-4">
                <select wire:model.lazy="lead_id" class="w-full rounded-lg mt-8">
                    <option value="">Select lead</option>
                    @foreach ($leads as $lead)
                        <option value="{{ $lead->id }}"><span class="py-2 px-4">{{ $lead->name }}</span> - <span class="py-2 px-4">{{ $lead->email }}</span></option>
                    @endforeach
                </select>
            </div>

            @if (!empty($lead_id))
                <div class="mb-4">
                    <select wire:change="selectedCourse" wire:model.lazy="course_id" class="w-full rounded-lg mt-8">
                        <option value="">Select course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}"><span class="py-2 px-4">{{ $course->name }}</span></option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (!empty($selectedCourse))
                <p class="mb-4">Price: ${{ number_format($selectedCourse->price, 2) }}</p>

                {{-- <div class="mb-4">
                    <input wire:model.lazy="payment" type="number" step=".01" class="w-full" placeholder="Payment now">
                </div> --}}

                @include('components/wire-loading-btn')

            @endif
        </form>

    @endif
</div>
