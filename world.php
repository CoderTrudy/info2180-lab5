<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

if (isset($_GET['country'])) {
    $country = $_GET['country'];

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    $stmt = $conn->prepare("SELECT name, continent, independence_year, head_of_state FROM countries WHERE name LIKE :country");
    $stmt->bindValue(':country', "%$country%");
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        echo '<table border="1">';
        echo '<tr><th>Country Name</th><th>Continent</th><th>Independence Year</th><th>Head of State</th></tr>';
        foreach ($results as $row) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['continent'] . '</td>';
            echo '<td>' . $row['independence_year'] . '</td>';
            echo '<td>' . $row['head_of_state'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No countries found';
    }
}
?>


