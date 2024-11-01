<?php
include 'core/models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    addCustomer($pdo, $name, $email, $phone);
    echo "<p>Registration successful!</p>";
}

$mangas = getAllMangas($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer - Manga Cafe</title>
    <style>
        body, .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
        }
        .container {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            max-width: 350px;
            width: 100%;
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        button, a {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover, a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Customer Registration</h1>
        <form method="post">
            <label>Name: </label><input type="text" name="name" required><br><br>
            <label>Email: </label><input type="email" name="email" required><br><br>
            <label>Phone: </label><input type="text" name="phone" required><br><br>
            <button type="submit">Register</button>
        </form>

        <h2>Available Mangas</h2>
        <?php if (!empty($mangas)): ?>
            <table>
                <?php foreach ($mangas as $manga): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($manga['title']) ?></strong></td>
                        <td><?= htmlspecialchars($manga['author']) ?></td>
                        <td><?= htmlspecialchars($manga['genre']) ?></td>
                        <td><?= htmlspecialchars($manga['publication_date']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No manga available at the moment.</p>
        <?php endif; ?>

        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
