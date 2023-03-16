<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Braintree\Transaction;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function show()
    {
        $customer = Auth::user();

        return view('payments.payment', [
            'braintree_customer_id' => $customer->braintree_customer_id
        ]);
    }
    public function process(Request $request)
    {

        
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        // $status = new \Braintree\Transaction([
        // 'amount' => '50.00',
        // 'paymentMethodNonce' => $nonce,
        // 'options' => [
        //     'submitForSettlement' => True
        // ]
        // ]);

        // $result = $gateway->transaction()->sale([
        //     'amount' => '10.00',
        //     'paymentMethodNonce' => $nonceFromTheClient,
        //     'deviceData' => $deviceDataFromTheClient,
        //     'options' => [
        //       'submitForSettlement' => True
        //     ]
        //   ]);

        $result = new \Braintree\Transaction([
            'amount' => 100,
            'options' => ['submitForSettlement' => True],
            'paymentMethodNonce' => $nonce
        ]);
        // get current logged in customer
       
    }
}
