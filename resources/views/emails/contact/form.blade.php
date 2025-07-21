<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Formulir Kontak</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .header {
            padding: 20px;
            text-align: center;
        }

        .header img {
            max-height: 75px;
        }

        .content {
            padding: 30px;
            color: #333;
            line-height: 1.6;
        }

        .content h1 {
            font-size: 22px;
            color: #1a202c;
            margin-top: 0;
        }

        .details-panel {
            background-color: #f7fafc;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            padding: 20px;
            margin: 20px 0;
        }

        .details-panel p {
            margin: 5px 0;
        }

        .message-panel {
            background-color: #f7fafc;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            padding: 20px;
        }

        .footer {
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #718096;
            background-color: #edf2f7;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 style="font-size: 24px; margin: 0;">{{ $storeName }}</h1>
        </div>
        <div class="content">
            <h3>Pesan Baru dari Formulir Kontak</h3>
            <p>Anda telah menerima pesan baru dari <strong>{{ $contactData['name'] }}</strong>.</p>

            <div class="details-panel">
                <p><strong>Nama:</strong> {{ $contactData['name'] }}</p>
                <p><strong>Email:</strong> <a href="mailto:{{ $contactData['email'] }}">{{ $contactData['email'] }}</a>
                </p>
                <p><strong>Subjek:</strong> {{ $contactData['subject'] }}</p>
            </div>

            <p><strong>Isi Pesan:</strong></p>
            <div class="message-panel">
                <p style="white-space: pre-wrap;">{{ $contactData['message'] }}</p>
            </div>

            <p>Anda dapat membalas email ini secara langsung untuk menghubungi pengirim.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ $storeName }}. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</body>

</html>
