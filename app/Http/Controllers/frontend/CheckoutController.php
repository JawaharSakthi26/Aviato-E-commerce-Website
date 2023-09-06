<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\CreateTrait;
use App\Http\Traits\FetchTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    use FetchTrait;
    use CreateTrait;

    public function index()
    {
        $cart = $this->getCartData();
        return view('frontend.checkout',compact('cart'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'product_total' => 'required',
            'total_price' => 'required',
            'card_number' => 'required', 
            'exp_month' => 'required', 
            'exp_year' => 'required', 
            'cvc' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
    
        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->total_price,
                'currency' => 'usd',
                'description' => 'My first test stripe payment',
                'payment_method_types' => ['card'],
                'payment_method' => $request->test_card_token, 
                'confirm' => true,
                'shipping' => [
                    'name' => $request->name,
                    'address' => [
                        'line1' => $request->address,
                        'city' => $request->city,
                        'country' => $request->country,
                        'postal_code' => $request->zip_code,
                    ],
                ],
            ]);
            if ($paymentIntent->status === 'requires_action' && $paymentIntent->next_action->type === 'use_stripe_sdk') {
                $order = $this->createOrder($request, $paymentIntent);

                $totalItems = $this->createOrderDetails(
                    $order,
                    $request->product_id,
                    $request->product_quantity,
                    $request->product_price,
                    $request->product_total
                );
                $this->createPayment($order, $totalItems, $paymentIntent);
                $this->destroyCart();

                return redirect($paymentIntent->next_action->use_stripe_sdk->stripe_js);
            } else {
                return response()->json(['status' => 'Payment failed'], 500);
            }
        } catch (\Stripe\Exception\CardException $e) {
            return response()->json(['status' => 'Card error', 'message' => $e->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }
}