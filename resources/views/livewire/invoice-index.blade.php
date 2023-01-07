<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">ID</th>
            <th class="border px-4 py-2 text-left">User</th>
            <th class="border px-4 py-2 text-left">Due Date</th>
            <th class="border px-4 py-2">Amount</th>
            <th class="border px-4 py-2">Paid</th>
            <th class="border px-4 py-2">Due</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($invoices as $invoice)
            <tr>
                <td class="border px-4 py-2">{{ $invoice->id }}</td>
                <td class="border px-4 py-2">{{ $invoice->user->name }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F j, Y', strtotime($invoice->due_date)) }}</td>
                <td class="border px-4 py-2">${{ $invoice->amount() ['total'] }}</td>
                <td class="border px-4 py-2">${{ $invoice->amount() ['paid'] }}</td>
                <td class="border px-4 py-2">${{ $invoice->amount() ['due'] }}</td>
                <td class="border px-4 py-2 text-center flex  items-center justify-center space-x-2">

                    <a href="{{ route('invoice-show', $invoice->id) }}">@include('components.icons.edit')</a>
                    <a href="{{ route('invoice-show', $invoice->id) }}">@include('components.icons.view')</a>

                    <form onsubmit="return confirm('Are you sure?');" wire:submit.prevent="invoiceDelete({{$invoice->id}})">
                        <button type="submit">
                            @include('components.icons.delete')
                        </button>
                    </form>

                </td>
            </tr>

            @endforeach
        </table>

        <div class="mt-4">
            {{$invoices->links()}}
        </div>
</div>
