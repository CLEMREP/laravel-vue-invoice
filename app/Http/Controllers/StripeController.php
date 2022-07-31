<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    public function stripe(Invoice $invoice) : View
    {
        return view('stripe');
    }

    public function stripePost(Request $request) : RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "eur",
            "source" => $request->stripeToken,
            "description" => "This payment is tested purpose phpcodingstuff.com"
        ]);

        $request->session()->flash('success', 'Payment successful!');

        return back();
    }
}
