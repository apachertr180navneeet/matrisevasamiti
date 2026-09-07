<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing Payment - Matri Seva Samiti</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 80px;
            background-color: #fcfcfc;
            color: #333;
        }
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #f47a20;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1.5s linear infinite;
            margin: 0 auto 25px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .message-box {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        }
        h2 { color: #1e293b; margin-bottom: 12px; }
        p { color: #64748b; font-size: 15px; }
    </style>
</head>
<body>
    <div class="message-box">
        <div class="loader"></div>
        <h2>Redirecting to Payment Gateway</h2>
        <p>Please wait while we transfer you securely to CCAvenue.<br>Do not refresh this page or press the back button.</p>

        <form method="POST" name="redirect" action="{{ $action_url }}">
            <input type="hidden" name="encRequest" value="{{ $encrypted_data }}">
            <input type="hidden" name="access_code" value="{{ $access_code }}">
        </form>
    </div>

    <script>
        document.redirect.submit();
    </script>
</body>
</html>
