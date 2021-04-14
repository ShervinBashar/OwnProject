<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $servername = "shervinbashar.one.mysql";
        $username = "shervinbashar_onesbdb";
        $password = "Bangkok11";
        $database = "shervinbashar_onesbdb";
        $connection = new mysqli($servername, $username, $password, $database);
        if($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
        ?>
    </body>
</html>
