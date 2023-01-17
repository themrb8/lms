<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:invoice-edit :invoice_id="$invoice->id" />

                    @if($invoice->amount()['due'] > 0)
                    <h2 class="font-bold mb-2">Add a payment</h2>
                    <form action="{{route('stripe-payment')}}" method="POST">
                        @csrf
                        <div class="flex mb-4">
                            <div class="w-full">
                                <input value="4242 4242 4242 4242" type="text" name="card_no" class="w-full" placeholder="Card number">
                            </div>
                            <div class="min-w-max ml-4">
                                <input value="12/23" type="text" name="card_expiry" class="w-full" placeholder="Expiry month/year">
                            </div>
                            <div class="min-w-max ml-4">
                                <input value="1212" type="text" name="card_ccv" class="w-full" placeholder="CCV">
                            </div>
                            <div class="min-w-max ml-4">
                                <input type="text" value="{{number_format($invoice->amount()['due'], 2)}}" name="amount" class="w-full" placeholder="Amount">
                            </div>
                            <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                        </div>
                        <button type="submit">Pay Now</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
