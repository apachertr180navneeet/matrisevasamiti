<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use App\Models\Donation;
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

        try {
            Donation::create([
                'order_id' => $orderId,
                'amount' => $amount,
                'currency' => $currency,
                'billing_name' => $request->input('billing_name', 'Anonymous'),
                'billing_email' => $request->input('billing_email', ''),
                'billing_tel' => $request->input('billing_tel', ''),
                'pan_number' => $request->input('merchant_param1', ''),
                'cause' => $request->input('merchant_param2', 'general'),
                'order_status' => 'Initiated',
            ]);
        } catch (\Exception $e) {
            Log::error('Error recording donation initiation in MySQL: ' . $e->getMessage());
        }

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
            $orderId = $responseData['order_id'] ?? '';

            if ($orderId) {
                try {
                    Donation::where('order_id', $orderId)->update([
                        'tracking_id' => $responseData['tracking_id'] ?? null,
                        'bank_ref_no' => $responseData['bank_ref_no'] ?? null,
                        'order_status' => $orderStatus ?: 'Unknown',
                        'payment_mode' => $responseData['payment_mode'] ?? null,
                        'raw_response' => json_encode($responseData),
                    ]);
                } catch (\Exception $e) {
                    Log::error('Error updating donation response in MySQL: ' . $e->getMessage());
                }
            }

            Log::info('CCAvenue Response Received:', $responseData);
        }

        return view('payment.response', [
            'page_title' => 'Payment Status - Matri Seva Samiti',
            'order_status' => $orderStatus,
            'response_data' => $responseData,
        ]);
    }
}
