<?php
require_once 'config.php';
require_once 'includes/ccavenue/Crypto.php';

$merchant_id = CCAVENUE_MERCHANT_ID;
$access_code = CCAVENUE_ACCESS_CODE;
$working_key = CCAVENUE_WORKING_KEY;
$environment = CCAVENUE_ENVIRONMENT;

$action_url = ($environment == 'PRODUCTION') ? 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction' : 'https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction';

$merchant_data = '';

// Default parameters if not set by the form
if (!isset($_POST['merchant_id'])) $_POST['merchant_id'] = $merchant_id;
if (!isset($_POST['currency'])) $_POST['currency'] = 'INR';
if (!isset($_POST['redirect_url'])) $_POST['redirect_url'] = SITE_URL . '/ccavResponseHandler';
if (!isset($_POST['cancel_url'])) $_POST['cancel_url'] = SITE_URL . '/ccavResponseHandler';
if (!isset($_POST['language'])) $_POST['language'] = 'EN';
if (!isset($_POST['order_id'])) $_POST['order_id'] = 'ORD' . time() . rand(1000, 9999);

// CCAvenue requires the amount to be properly formatted, typically with two decimal places
if (isset($_POST['amount'])) {
    $_POST['amount'] = number_format((float)$_POST['amount'], 2, '.', '');
}

foreach ($_POST as $key => $value){
    $merchant_data .= $key . '=' . $value . '&';
}

// Log the exact string being sent to CCAvenue for debugging
error_log("CCAvenue Request Data: " . $merchant_data . "\n", 3, 'logs/ccavenue_debug.log');

$encrypted_data = encrypt($merchant_data, $working_key);

?>
<html>
<head>
<title>Processing Payment...</title>
<style>
    body { font-family: Arial, sans-serif; text-align: center; padding-top: 50px; }
    .loader {
        border: 16px solid #f3f3f3;
        border-top: 16px solid #f47a20;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: spin 2s linear infinite;
        margin: 0 auto 20px;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
</head>
<body>
    <div class="loader"></div>
    <h2>Please wait, redirecting to payment gateway...</h2>
    <p>Do not refresh the page or press back button.</p>

    <form method="post" name="redirect" action="<?php echo $action_url; ?>"> 
        <?php
        echo "<input type=hidden name=encRequest value=$encrypted_data>";
        echo "<input type=hidden name=access_code value=$access_code>";
        ?>
    </form>

    <script language='javascript'>
        document.redirect.submit();
    </script>
</body>
</html>
