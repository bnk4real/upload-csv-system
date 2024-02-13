<!-- create_table.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Create Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<?php include 'nav.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-4"></div>
            <div class="col-xl-4">        
                <form action="" method="post">
                    <input type="text" name="table_name" class="form-control mb-3" placeholder="Table Name">
                    <button type="submit" name="submit" class="btn btn-primary">Create Table</button>
                </form>
            </div>
            <div class="col-xl-4"></div>
        </div>
    </div>
    <!-- create_table.php -->
    <?php

    include 'connect.php';

    if (isset($_POST['submit'])) {

    $table_name = $_POST['table_name'];

    // SQL statement to create table
    $sql = "CREATE TABLE $table_name (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NULL,
        lastname VARCHAR(100) NULL, 
        positon VARCHAR(100) NULL)";

    if ($conn->query($sql) === TRUE) {
        echo "Table $table_name created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
    }

    ?>
</body>

</html>
