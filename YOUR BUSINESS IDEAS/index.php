<!DOCTYPE html>
<html>
<head>
    <title>Manga Cafe</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
        }
        .container {
            text-align: center;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            max-width: 350px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        a {
            display: block;
            margin: 15px 0;
            padding: 12px;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Manga Cafe</h1>
        <p>Please select your role:</p>
        <a href="customer.php">I am a Customer</a>
        <a href="staff.php">I am Staff</a>
    </div>
</body>
</html>
