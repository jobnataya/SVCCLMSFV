<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search books</title>
</head>
<body>
    <?php
    include("db.connection.php");

    $query = isset($_GET['search']) ? $_GET['search'] : '';
    
    // Perform the database query
    if (!empty($query)) {
        $sql = "SELECT * FROM addbooks WHERE bookname LIKE '%$query%'";
        $result = $conn->query($sql);
    
        // Display the search results
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h1>Title: " . $row["bookname"] . "<br></h1>";
                echo "Author: " . $row["author"] . "<br>";
                echo "Quantity: " . $row["bookquantity"] . "<br>";
                echo "SERIES: " . $row["bookid"] . "<br><br>";
            }
        } else {
            echo "No results found.";
        }
    } else {
        echo "Please enter a search query.";
    }
    ?>
</body>
</html>