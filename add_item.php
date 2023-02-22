<?php
require_once('database.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Insert the new item into the todoitems table
    $query = "INSERT INTO todoitems (Title, Description) VALUES (:title, :description)";
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();

    // Redirect the user to the index page
    header('Location: index.php');
    exit();
}
?>

