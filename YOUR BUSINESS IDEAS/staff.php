<?php
include 'core/models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        addManga($pdo, $_POST['title'], $_POST['author'], $_POST['genre'], $_POST['publication_date']);
    } elseif (isset($_POST['update'])) {
        updateManga($pdo, $_POST['manga_id'], $_POST['title'], $_POST['author'], $_POST['genre'], $_POST['publication_date']);
    } elseif (isset($_POST['delete'])) {
        deleteManga($pdo, $_POST['manga_id']);
    }
}

$mangas = getAllMangas($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff - Manga Cafe</title>
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
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        input, button {
            margin: 5px;
            padding: 10px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        button {
            background-color: #4CAF50;
            color: #ffffff;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        a {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: #ffffff;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Mangas</h1>
        <form method="post">
            <h2>Add Manga</h2>
            <label>Title: </label><input type="text" name="title" required><br>
            <label>Author: </label><input type="text" name="author" required><br>
            <label>Genre: </label><input type="text" name="genre" required><br>
            <label>Publication Date: </label><input type="date" name="publication_date" required><br><br>
            <button type="submit" name="add">Add Manga</button>
        </form>

        <h2>Existing Mangas</h2>
        <?php if (!empty($mangas)): ?>
            <table>
                <?php foreach ($mangas as $manga): ?>
                    <tr>
                        <form method="post">
                            <input type="hidden" name="manga_id" value="<?= $manga['manga_id'] ?>">
                            <td><input type="text" name="title" value="<?= htmlspecialchars($manga['title']) ?>"></td>
                            <td><input type="text" name="author" value="<?= htmlspecialchars($manga['author']) ?>"></td>
                            <td><input type="text" name="genre" value="<?= htmlspecialchars($manga['genre']) ?>"></td>
                            <td><input type="date" name="publication_date" value="<?= $manga['publication_date'] ?>"></td>
                            <td>
                                <button type="submit" name="update">Update</button>
                                <button type="submit" name="delete">Delete</button>
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No mangas available</p>
        <?php endif; ?>

        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
