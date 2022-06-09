<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\ProductVariation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\PaymentGateway\Zarinpal;
use App\PaymentGateway\Pay;


class PaymentController extends Controller
{

public function payment(Request $request)
{
    
    $validator = Validator::make($request->all(), [
        'address_id' => 'required',
        'payment_method' => 'required',
        'firstname' => 'required',
        'lastname' => 'required',
        'payment_method' => 'required',
    ]);

    User::where('id', auth()->user()->id)->update([
        'name' => $request->firstname . ' ' . $request->lastname,
    ]);
    
    

    if ($validator->fails()) {
        alert()->error('انتخاب آدرس تحویل سفارش الزامی می باشد', 'دقت کنید')->persistent('حله');
        return redirect()->back();
    }

    $checkCart = $this->checkCart();
    if (array_key_exists('error', $checkCart)) {
        alert()->error($checkCart['error'], 'دقت کنید');
        return redirect()->route('home');
    }

    $amounts = $this->getAmounts();
    if (array_key_exists('error', $amounts)) {
        alert()->error($amounts['error'], 'دقت کنید');
        return redirect()->route('home');
    }

    if ($request->payment_method == 'pay') {
        $payGateway = new Pay();
        $payGatewayResult = $payGateway->send($amounts, $request->address_id);
        if (array_key_exists('error', $payGatewayResult)) {
            alert()->error($payGatewayResult['error'], 'دقت کنید')->persistent('حله');
            return redirect()->back();
        } else {
            return redirect()->to($payGatewayResult['success']);
        }
    }

    if ($request->payment_method == 'zarinpal') {
        $zarinpalGateway = new Zarinpal();
        $zarinpalGatewayResult = $zarinpalGateway->send($amounts, 'خرید تستی', $request->address_id);
        if (array_key_exists('error', $zarinpalGatewayResult)) {
            alert()->error($zarinpalGatewayResult['error'], 'دقت کنید')->persistent('حله');
            return redirect()->back();
        } else {
            return redirect()->to($zarinpalGatewayResult['success']);
        }
    }

    alert()->error('درگاه پرداخت انتخابی اشتباه میباشد', 'دقت کنید');
    return redirect()->back();
}

public function paymentVerify(Request $request, $gatewayName)
{
    if ($gatewayName == 'pay') {
        $payGateway = new Pay();
        $payGatewayResult = $payGateway->verify($request->token, $request->status);

        if (array_key_exists('error', $payGatewayResult)) {
            alert()->error($payGatewayResult['error'], 'دقت کنید')->persistent('حله');
            return redirect()->back();
        } else {
            alert()->success($payGatewayResult['success'], 'با تشکر');
            return redirect()->route('home');
        }
    }

    if ($gatewayName == 'zarinpal') {
        $amounts = $this->getAmounts();
        if (array_key_exists('error', $amounts)) {
            alert()->error($amounts['error'], 'دقت کنید');
            return redirect()->route('home');
        }

        $zarinpalGateway = new Zarinpal();
        $zarinpalGatewayResult = $zarinpalGateway->verify($request->Authority, $amounts['paying_amount']);

        if (array_key_exists('error', $zarinpalGatewayResult)) {
            alert()->error($zarinpalGatewayResult['error'], 'دقت کنید')->persistent('حله');
            return redirect()->back();
        } else {
            alert()->success($zarinpalGatewayResult['success'], 'با تشکر');
            return redirect()->route('home');
        }
    }

    alert()->error('مسیر بازگشت از درگاه پرداخت اشتباه می باشد', 'دقت کنید');
    return redirect()->route('home.orders.checkout');
}


public function checkCart()
{
    if (\Cart::isEmpty()) {
        return ['error' => 'سبد خرید شما خالی می باشد'];
    }
   

    foreach (\Cart::getContent() as $item) {
        $variation = ProductVariation::find($item->attributes->id);
       
         
        $price = $variation->is_sale ? $variation->sale_price : $variation->price;

        if ($item->price != $price) {
            \Cart::clear();
            return ['error' => 'قیمت محصول تغییر پیدا کرد'];
        }

        if ($item->quantity > $variation->quantity) {
            \Cart::clear();
            return ['error' => 'تعداد محصول تغییر پیدا کرد'];
        }

    }
    return ['success' => 'success!'];

}

public function getAmounts()
{
    if (session()->has('coupon')) {
        $checkCoupon = checkCoupon(session()->get('coupon.code'));
        if (array_key_exists('error', $checkCoupon)) {
            return $checkCoupon;
        }
    }

    return [
        'total_amount' => (\Cart::getTotal() + cartTotalSaleAmount()),
        'delivery_amount' => cartTotalDeliveryAmount(),
        'coupon_amount' => session()->has('coupon') ? session()->get('coupon.amount') : 0,
        'paying_amount' => cartTotalAmount()
    ];
}
}