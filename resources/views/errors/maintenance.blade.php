<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Mode</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .maintenance-container {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 90%;
        }
        h1 {
            color: #333;
            margin-bottom: 1rem;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
        .icon {
            font-size: 4rem;
            color: #FF7F50;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="maintenance-container">
        <div class="icon">⚠️</div>
        <h1>We'll Be Back Soon!</h1>
        <p>{{ $message ?? 'Our website is currently undergoing maintenance. Please check back later.' }}</p>
        <p>Thank you for your patience.</p>
    </div>
</body>
</html> 