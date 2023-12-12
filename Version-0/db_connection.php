    <?php
    $servername = "localhost";
    $username = "root";
    $password = ""; // default password is empty in XAMPP
    $dbname = "diccionario";

    // Create connection instance to the database
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
    }
    echo "<script> console.log('Connected successfully') </script>";

    ?>