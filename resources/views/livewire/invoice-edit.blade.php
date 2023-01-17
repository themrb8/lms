<div>
    <h2>Information</h2>
    <p>Invoice to: {{$invoice->user->name}}</p>

    <table class="table-auto w-full">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Quantity</th>
            <th class="border px-4 py-2 text-right">Total</th>
        </tr>

        @foreach ($invoice->items as $item)
            <tr>
                <td class="border px-4 py-2">{{$item->name}}</td>
                <td class="border px-4 py-2 text-center">${{number_format($item->price, 2)}}</td>
                <td class="border px-4 py-2 text-center">{{$item->quantity}}</td>
                <td class="border px-4 py-2 text-right">{{number_format($item->price * $item->quantity, 2)}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" class="border px-4 py-2 text-right">Subtotal</td>
                <td class="border px-4 py-2 text-right">{{number_format($invoice->amount()['total'], 2)}}</td>
            </tr>
            <tr>
                <td colspan="3" class="border px-4 py-2 text-right">Paid</td>
                <td class="border px-4 py-2 text-right">-{{number_format($invoice->amount()['paid'], 2)}}</td>
            </tr>
            <tr>
                <td colspan="3" class="border px-4 py-2 text-right">Due</td>
                <td class="border px-4 py-2 text-right">{{number_format($invoice->amount()['due'], 2)}}</td>
            </tr>
        </table>

    @if ($enableAddItem)
        <h2 class="font-lg font-medium mb-4 mt-4">Add New Item</h2>
        <form wire:submit.prevent="saveNewItem">
            <div class="flex mb-4">
                <div class="w-full">
                    @include('components.form-field', [
                        'name' => 'name',
                        'label' => 'Name',
                        'type' => 'text',
                        'placeholder' => 'Item name',
                        'required' => 'required',
                        'class' => 'w-full',
                    ])
                </div>
                <div class="min-w-max ml-4">
                    @include('components.form-field', [
                        'name' => 'price',
                        'label' => 'Price',
                        'type' => 'number',
                        'placeholder' => 'Type price',
                        'required' => 'required',
                        'class' => 'w-full',
                    ])
                </div>
                <div class="min-w-max ml-4">
                    @include('components.form-field', [
                        'name' => 'quantity',
                        'label' => 'Quantity',
                        'type' => 'number',
                        'placeholder' => 'Type quantitiy',
                        'required' => 'required',
                        'class' => 'w-full',
                    ])
                </div>
            </div>
            <div class="flex">
                @include('components.wire-loading-btn')
                <button wire:click="addNewItem" class="ml-8">Cancel</button>
            </div>
        </form>
    @else
        <button wire:click="addNewItem" class="py-2 px-4 mt-4 ">Add</button>
    @endif


    <h3 class="font-bold text-lg mb-4">Payments</h3>
    <ul>
        @foreach ($invoice->payments as $payment)
            <li>{{date('F j, Y - g:i A', strtotime($payment->created_at))}} - ${{number_format($payment->amount, 2)}}</li>
        @endforeach
    </ul>

</div>
