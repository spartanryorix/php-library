<?php

include 'authcheck.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search_query = $_GET['search'];

    $servername = "localhost";
    $dbusername = "Abdul Rakeeb";
    $dbpassword = "Bd123Ac234A";
    $dbname = "library";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        $error = "Connection failed: " . $conn->connect_error;
    } else {
        $stmt = $conn->prepare("SELECT * FROM books WHERE book_name LIKE ? OR author_name LIKE ? OR release_date LIKE ? OR genre LIKE ?");
        $param = "%$search_query%";
        $stmt->bind_param("ssss", $param, $param, $param, $param);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['book_name'] . "</td>";
                echo "<td>" . $row['author_name'] . "</td>";
                echo "<td>" . $row['release_date'] . "</td>";
                echo "<td>" . $row['genre'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<p>No results found for '" . $search_query . "'</p>";
        }

        $stmt->close();
    }
    $conn->close();
}
?>
