<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <?php include 'manage_books.php'; ?>

    <h1>Book Management</h1>

    <h2>Book List</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Available</th>
            <th>Pages</th>
            <th>ISBN</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($books as $index => $book): ?>
            <tr>
                <td><?php echo htmlspecialchars($book['title']); ?></td>
                <td><?php echo htmlspecialchars($book['author']); ?></td>
                <td><?php echo $book['available'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo $book['pages']; ?></td>
                <td><?php echo $book['isbn']; ?></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <input type="submit" name="delete" value="Delete" class="delete-btn">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add New Book</h2>
    <form method="post" class="add-book-form">
        <label>
            Title:
            <input type="text" name="title" required>
        </label>
        <label>
            Author:
            <input type="text" name="author" required>
        </label>
        <label>
            <input type="checkbox" name="available">
            Available
        </label>
        <label>
            Pages:
            <input type="number" name="pages" required>
        </label>
        <label>
            ISBN:
            <input type="number" name="isbn" required>
        </label>
        <input type="submit" name="add" value="Add Book">
    </form>
</body>
</html>