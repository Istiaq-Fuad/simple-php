<?php
$jsonFile = 'books.json';

// Read JSON file
function readJsonFile($file) {
    $jsonData = file_get_contents($file);
    return json_decode($jsonData, true);
}

// Write JSON file
function writeJsonFile($file, $data) {
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($file, $jsonData);
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $books = readJsonFile($jsonFile);

    if (isset($_POST['add'])) {
        $newBook = [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'available' => isset($_POST['available']),
            'pages' => intval($_POST['pages']),
            'isbn' => intval($_POST['isbn'])
        ];
        $books[] = $newBook;
    } elseif (isset($_POST['delete'])) {
        $index = $_POST['index'];
        array_splice($books, $index, 1);
    }

    writeJsonFile($jsonFile, $books);
}

$books = readJsonFile($jsonFile);
?>