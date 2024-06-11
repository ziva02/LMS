<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .certificate-card {
            border: 2px solid #007bff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background: white;
            position: relative;
        }

        .certificate-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .certificate-body {
            padding: 40px 20px;
            position: relative;
        }

        .certificate-footer {
            background-color: #f8f9fa;
            padding: 20px;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .certificate-title {
            font-family: 'Brush Script MT', cursive;
            font-size: 50px;
            margin: 0;
        }

        .certificate-subtitle {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .certificate-content {
            font-size: 18px;
            margin: 20px 0;
        }

        .border-top {
            border-top: 2px solid #007bff;
            width: 50%;
            margin: 20px auto 0 auto;
        }

        .border-bottom {
            border-bottom: 2px solid #007bff;
            width: 50%;
            margin: 0 auto 20px auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card certificate-card">
            <div class="card-header text-center certificate-header">
                <h1 class="certificate-title">Sertifikat</h1>
            </div>
            <div class="card-body certificate-body text-center">
                <h2 class="certificate-subtitle">Nama: {{ $sertifikatData->name }}</h2>
                <div class="border-top"></div>
                <h3 class="certificate-content">Course: {{ $sertifikatData->course_name }}</h3>
                <h3 class="certificate-content">Rata-rata Nilai: {{ number_format($sertifikatData->average_score, 2) }}</h3>
                <div class="border-bottom"></div>
            </div>
            <div class="card-footer text-center certificate-footer">
                <p class="m-0">Terima kasih telah menyelesaikan course ini.</p>
            </div>
        </div>
    </div>
</body>
</html>
