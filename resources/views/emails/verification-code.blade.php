<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kode Verifikasi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            border: 1px solid #e0e0e0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }
        h1 {
            color: #2c5282;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .verification-code {
            text-align: center;
            font-size: 32px;
            letter-spacing: 6px;
            font-weight: bold;
            color: #1a365d;
            margin: 30px 0;
            padding: 15px;
            background-color: #edf2f7;
            border-radius: 6px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
        .note {
            background-color: #f0fff4;
            padding: 10px;
            border-radius: 6px;
            border-left: 4px solid #48bb78;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nusantara Edupark</h1>
        </div>

        <p>Halo <strong>{{ $name }}</strong>,</p>

        <p>Terima kasih telah mendaftar di Nusantara Edupark. Untuk memverifikasi alamat email Anda, silakan gunakan kode verifikasi berikut:</p>

        <div class="verification-code">
            {{ $verificationCode }}
        </div>

        <div class="note">
            <p>Kode verifikasi ini akan kadaluarsa dalam 10 menit. Mohon untuk segera memasukkan kode ini di halaman verifikasi.</p>
        </div>

        <p>Jika Anda tidak merasa mendaftar di Nusantara Edupark, silakan abaikan email ini.</p>

        <p>Terima kasih,<br>
        Tim Nusantara Edupark</p>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Nusantara Edupark. All rights reserved.</p>
            <p>Email ini dibuat secara otomatis, mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html> 