<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Forget Password Email</title>
    <style>
        /* Define your CSS styles here */
        h1 {
            color: #333;

            font-size: 24px;
        }
        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 10px;
        }
        body{
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Forget Password</h1>
    <p>Hello {{ $to_name }}</p>
    <p>We got a request to reset your password please use the following One-Time Password</p>
    <p>OTP: {{ $otp }}</p>
    <p>Thank you.</p>
</body>
</html>

