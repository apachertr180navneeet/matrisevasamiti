<?php
require_once 'config.php';
$page_title = "Payment Status - Matri Seva Samiti";
include 'includes/header.php';
require_once 'includes/ccavenue/Crypto.php';

$workingKey = CCAVENUE_WORKING_KEY;
$encResponse = isset($_POST["encResp"]) ? $_POST["encResp"] : '';

$order_status = "";
$response_data = [];

if (!empty($encResponse)) {
    $decryptValues = explode('&', decrypt($encResponse, $workingKey));
    $dataSize = sizeof($decryptValues);

    for($i = 0; $i < $dataSize; $i++) 
    {
        $information = explode('=', $decryptValues[$i]);
        if (count($information) == 2) {
            $response_data[$information[0]] = $information[1];
        }
    }

    if(isset($response_data['order_status'])) {
        $order_status = $response_data['order_status'];
    }
}
?>

<main class="page-hero" style="padding: 150px 0;">
    <div class="container" style="background: white; color: #333; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); max-width: 800px; margin: 0 auto; text-align: center;">
        
        <?php if($order_status === "Success"): ?>
            <div style="color: #4CAF50;">
                <i class="fas fa-check-circle" style="font-size: 64px; margin-bottom: 20px;"></i>
                <h1 style="color: #4CAF50; margin-bottom: 20px;">Thank You for Your Generosity!</h1>
                <p style="font-size: 18px;">Your donation has been successfully processed.</p>
                <div style="text-align: left; background: #f9f9f9; padding: 20px; border-radius: 10px; margin: 20px auto; max-width: 400px;">
                    <p style="margin-bottom: 10px;"><strong>Order ID:</strong> <?php echo htmlspecialchars($response_data['order_id'] ?? ''); ?></p>
                    <p style="margin-bottom: 10px;"><strong>Tracking ID:</strong> <?php echo htmlspecialchars($response_data['tracking_id'] ?? ''); ?></p>
                    <p style="margin-bottom: 0;"><strong>Amount:</strong> ₹<?php echo htmlspecialchars($response_data['amount'] ?? ''); ?></p>
                </div>
            </div>
        <?php elseif($order_status === "Aborted"): ?>
            <div style="color: #FF9800;">
                <i class="fas fa-exclamation-triangle" style="font-size: 64px; margin-bottom: 20px;"></i>
                <h1 style="color: #FF9800; margin-bottom: 20px;">Transaction Aborted</h1>
                <p style="font-size: 18px;">You cancelled the transaction. If this was a mistake, please try again.</p>
            </div>
        <?php elseif($order_status === "Failure"): ?>
            <div style="color: #F44336;">
                <i class="fas fa-times-circle" style="font-size: 64px; margin-bottom: 20px;"></i>
                <h1 style="color: #F44336; margin-bottom: 20px;">Transaction Failed</h1>
                <p style="font-size: 18px;">Unfortunately, the transaction was declined. Please try again with a different payment method.</p>
                <p><strong>Error Message:</strong> <?php echo htmlspecialchars($response_data['failure_message'] ?? 'Unknown Error'); ?></p>
            </div>
        <?php else: ?>
            <div style="color: #607D8B;">
                <i class="fas fa-question-circle" style="font-size: 64px; margin-bottom: 20px;"></i>
                <h1 style="color: #607D8B; margin-bottom: 20px;">Invalid Response</h1>
                <p style="font-size: 18px;">There was an issue processing the payment response.</p>
            </div>
        <?php endif; ?>

        <div style="margin-top: 40px;">
            <a href="<?php echo SITE_URL; ?>" class="btn btn-primary" style="background: #f47a20; color: white;">Return to Homepage</a>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
