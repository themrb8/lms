<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\StripeClient;

use App\Models\Payment;

class StripePaymentController extends Controller
{
    public function stripePayment(Request $request) {
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'card_expiry' => 'required',
            'card_ccv' => 'required',
            'amount' => 'required',
            'invoice_id' => 'required|integer',
        ]);

        if($validator->fails()) {
            flash()->addWarning('Please, fill all the fields');
        } else {
            $stripe = new StripeClient(env('STRIPE_SECRET'));

            $token = $stripe->tokens->create([
                'card' => [
                    'number' => $request->card_no,
                    'exp_month' => explode('/', $request->card_expiry)[0],
                    'exp_year' => explode('/', $request->card_expiry)[1],
                    'cvc' => $request->card_ccv,
                ],
            ]);

            $charge = $stripe->charges->create([
                'amount' => intval($request->amount * 100),
                'currency' => 'usd',
                'description' => 'Payment for invoice #' . $request->invoice_id,
                'source' => $token->id,
            ]);


            Payment::Create([
                'amount' => $request->amount,
                'invoice_id' => $request->invoice_id,
            ]);


            flash()->addSuccess('Payment successfull');
            return redirect()->back();
        }
    }
}
