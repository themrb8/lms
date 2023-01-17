<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\StripeClient;

use App\Models\Payment;

class StripePaymentController extends Controller
{
    public function stripePayment(Request $request) {
        //validate user inputed data with Validator which is laravel own validation method insted of using protected $rules
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'card_expiry' => 'required',
            'card_ccv' => 'required',
            'amount' => 'required',
            'invoice_id' => 'required|integer',
        ]);

        //then user inputed data mismatch then showing this warning
        if($validator->fails()) {
            flash()->addWarning('Please, fill all the fields');
        } else {
            //it is configured with stripe with main account from :)
            $stripe = new StripeClient(env('STRIPE_SECRET'));

            //try process the card details then catch the warning with \Expection $e method
            try {
                $token = $stripe->tokens->create([
                    'card' => [
                        'number' => $request->card_no,
                        'exp_month' => explode('/', $request->card_expiry)[0],
                        'exp_year' => explode('/', $request->card_expiry)[1],
                        'cvc' => $request->card_ccv,
                    ],
                ]);
            } catch (\Exception $e) {
                flash()->addWarning('Invalid card details');
                return redirect()->back();
            }

            //it process the card details according to stripe server acc. capable or not
            $charge = $stripe->charges->create([
                'amount' => intval($request->amount * 100),
                'currency' => 'usd',
                'description' => 'Payment for invoice #' . $request->invoice_id,
                'source' => $token->id,
            ]);

            //created records on payments
            Payment::Create([
                'amount' => $request->amount,
                'invoice_id' => $request->invoice_id,
                'transaction_id' => $charge->id,
            ]);


            flash()->addSuccess('Payment successfull');
            return redirect()->back();
        }
    }
}
