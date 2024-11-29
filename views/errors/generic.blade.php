<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $exception->getCode() }} - Error</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .error-container {
            position: relative;
            max-width: 700px;
            width: 100%;
            text-align: center;
        }
        
        .error-code {
            font-size: 400px;
            font-weight: bold;
            color: rgba(189, 195, 199, 0.3);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }
        
        .error-message {
            font-size: 50px;
    font-weight: 700;
    margin-bottom: 20px;
    color: #2c3e50;
    text-transform: uppercase;
        }
        
        @media (max-width: 768px) {
            .error-code {
                font-size: 120px;
            }
            
            .error-message {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">{{ $exception->getCode() }}</div>
        <h1 class="error-message">{{ $exception->getMessage() }}</h1>
    </div>
</body>
</html>