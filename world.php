<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

if (isset($_GET['country'])) {
    $country = $_GET['country'];

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    $stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
    $stmt->bindValue(':country', "%$country%");
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        echo '<ul>';
        foreach ($results as $row) {
            echo '<li>';
            echo '<h1>' . $row['name'] . '</h1>';
            echo '<p>Ruled by: ' . $row['head_of_state'] . '</p>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No countries found';
    }
} else {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $stmt = $conn->query("SELECT * FROM countries");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        echo '<ul>';
        foreach ($results as $row) {
            echo '<li>';
            echo '<h1>' . $row['name'] . '</h1>';
            echo '<p>Ruled by: ' . $row['head_of_state'] . '</p>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No countries found';
    }
}
?>

