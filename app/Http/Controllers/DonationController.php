<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use App\Services\CCAvenueService;

class DonationController extends Controller
{
    protected CCAvenueService $ccavenue;

    public function __construct(CCAvenueService $ccavenue)
    {
        $this->ccavenue = $ccavenue;
    }

    public function index(): View
    {
        return view('pages.donate', [
            'page_title' => 'Donate Now - Matri Seva Samiti',
        ]);
    }

    public function process(Request $request): View
    {
        $merchantId = $this->ccavenue->getMerchantId();
        $accessCode = $this->ccavenue->getAccessCode();
        $actionUrl = $this->ccavenue->getActionUrl();

        $orderId = $request->input('order_id', 'ORD' . time() . rand(1000, 9999));
        $amount = number_format((float) $request->input('amount', 0), 2, '.', '');
        $currency = $request->input('currency', 'INR');
        $redirectUrl = route('donate.response');
        $cancelUrl = route('donate.response');
        $language = $request->input('language', 'EN');

        $payload = $request->except(['_token']);
        $payload['merchant_id'] = $merchantId;
        $payload['order_id'] = $orderId;
        $payload['amount'] = $amount;
        $payload['currency'] = $currency;
        $payload['redirect_url'] = $redirectUrl;
        $payload['cancel_url'] = $cancelUrl;
        $payload['language'] = $language;

        $merchantData = '';
        foreach ($payload as $key => $value) {
            $merchantData .= $key . '=' . $value . '&';
        }

        Log::info("CCAvenue Request: {$merchantData}");

        $encryptedData = $this->ccavenue->encrypt($merchantData);

        return view('payment.redirect', [
            'action_url' => $actionUrl,
            'encrypted_data' => $encryptedData,
            'access_code' => $accessCode,
        ]);
    }

    public function response(Request $request): View
    {
        $encResp = $request->input('encResp', '');
        $responseData = [];
        $orderStatus = '';

        if (!empty($encResp)) {
            $responseData = $this->ccavenue->parseResponse($encResp);
            $orderStatus = $responseData['order_status'] ?? '';
            Log::info('CCAvenue Response Received:', $responseData);
        }

        return view('payment.response', [
            'page_title' => 'Payment Status - Matri Seva Samiti',
            'order_status' => $orderStatus,
            'response_data' => $responseData,
        ]);
    }
}
