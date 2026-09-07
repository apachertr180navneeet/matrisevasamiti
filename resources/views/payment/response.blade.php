@extends('layouts.app')

@section('content')
<main class="page-hero" style="padding: 120px 0;">
    <div class="container" style="background: white; color: #333; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); max-width: 750px; margin: 0 auto; text-align: center;">
        
        @if($order_status === 'Success')
            <div style="color: #4CAF50;">
                <i class="fas fa-check-circle" style="font-size: 64px; margin-bottom: 20px;"></i>
                <h1 style="color: #4CAF50; margin-bottom: 20px;">Thank You for Your Generosity!</h1>
                <p style="font-size: 18px; color: #555;">Your donation has been successfully processed.</p>
                <div style="text-align: left; background: #f9f9f9; padding: 20px; border-radius: 10px; margin: 25px auto; max-width: 420px; border: 1px solid #eee;">
                    <p style="margin-bottom: 10px;"><strong>Order ID:</strong> {{ $response_data['order_id'] ?? 'N/A' }}</p>
                    <p style="margin-bottom: 10px;"><strong>Tracking ID:</strong> {{ $response_data['tracking_id'] ?? 'N/A' }}</p>
                    <p style="margin-bottom: 0;"><strong>Amount:</strong> ₹{{ $response_data['amount'] ?? '0.00' }}</p>
                </div>
            </div>
        @elseif($order_status === 'Aborted')
            <div style="color: #FF9800;">
                <i class="fas fa-exclamation-triangle" style="font-size: 64px; margin-bottom: 20px;"></i>
                <h1 style="color: #FF9800; margin-bottom: 20px;">Transaction Aborted</h1>
                <p style="font-size: 18px; color: #555;">You cancelled the transaction. If this was a mistake, please feel free to try again.</p>
            </div>
        @elseif($order_status === 'Failure')
            <div style="color: #F44336;">
                <i class="fas fa-times-circle" style="font-size: 64px; margin-bottom: 20px;"></i>
                <h1 style="color: #F44336; margin-bottom: 20px;">Transaction Failed</h1>
                <p style="font-size: 18px; color: #555;">Unfortunately, the transaction was declined. Please try again with a different payment method.</p>
                <p style="color: #777;"><strong>Error Message:</strong> {{ $response_data['failure_message'] ?? 'Unknown Error' }}</p>
            </div>
        @else
            <div style="color: #607D8B;">
                <i class="fas fa-question-circle" style="font-size: 64px; margin-bottom: 20px;"></i>
                <h1 style="color: #607D8B; margin-bottom: 20px;">Invalid or Incomplete Response</h1>
                <p style="font-size: 18px; color: #555;">There was an issue retrieving the payment status. If your account was debited, please contact us.</p>
            </div>
        @endif

        <div style="margin-top: 35px; display: flex; justify-content: center; gap: 15px;">
            <a href="{{ route('home') }}" class="btn btn-primary" style="background: #f47a20; color: white; border-radius: 8px; padding: 12px 28px; text-decoration: none; font-weight: 600;">Return to Homepage</a>
            <a href="{{ route('donate.index') }}" class="btn btn-secondary" style="background: #333; color: white; border-radius: 8px; padding: 12px 28px; text-decoration: none; font-weight: 600;">Donate Again</a>
        </div>
    </div>
</main>
@endsection
