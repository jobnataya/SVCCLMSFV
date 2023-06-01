<?php
include("db.connection.php");

$query = $_GET['query'];

$sql = "SELECT * FROM addbooks WHERE  bookname  LIKE '%query%'";
$result = $result = $conn->query($sql);

// Display the search results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Title: " . $row["bookname"] . "<br>";
        echo "Author: " . $row["author"] . "<br>";
        echo "Bookid: " . $row["bookid"] . "<br><br>";
    }
} else {
    echo "No results found.";
}

// Close the database connection
$conn->close();
?>
