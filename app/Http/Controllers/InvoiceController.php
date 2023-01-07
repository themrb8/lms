<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class InvoiceController extends Controller
{
    public function index() {
        return view('invoice.index');
    }

    public function show($id) {
        $DBinvoice = Invoice::findOrFail($id);

        $client = new Party([
            'name'          => 'LMS - Learning Mangement System',
            'address' => 'Bheramara, Kushtia',
            'code' => 7040,
            'phone'         => '+8801.........',
            'custom_fields' => [
                'note'        => 'New Course will be lanched soon...',
            ],
        ]);

        $customer = new Buyer([
            'name'          => $DBinvoice->user->name,
            'custom_fields' => [
                'email' => $DBinvoice->user->email,
            ],
        ]);

        $items = [];
        foreach($DBinvoice->items as $item) {
            $items[] = (new InvoiceItem())->title($item->name)->pricePerUnit($item->price)->quantity($item->quantity);
        }

        foreach($DBinvoice->payments as $payment) {
            $items[] = (new InvoiceItem())->title('Payment' )->pricePerUnit(-$payment->amount)->quantity(1);
        }

        $timestamp = $DBinvoice->due_date;
        
        $invoice = \LaravelDaily\Invoices\Invoice::make()
            ->seller($client)
            ->buyer($customer)
            ->addItems($items)
            ->dateFormat($timestamp)
            ->currencySymbol('$');

        return $invoice->stream();
    }
}
