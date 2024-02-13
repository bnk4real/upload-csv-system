<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Column</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<html>

    <?php include 'nav.php'; ?>

    <body>
        
        <div class="container mt-5">
            <h1>Add Column to Table</h1>
            <div class="row">
                <div class="col-xl-4"></div>
                    <div class="col-xl-4">        
                        <form action="" method="post">
                            <label for="" class="form-contrtol mb-3">Table Name</label>
                            <input type="text" name="table_name" class="form-control mb-3" placeholder="Table Name">
                            <label for="" class="form-contrtol mb-3">Column Name Name</label>
                            <input type="text" name="column_name" class="form-control mb-3" placeholder="Column Name">
                            <label for="" class="form-contrtol mb-3">Colum Type</label>
                            <select name="column_type" class="form-control mb-3" id="">
                                <option disabled selected> - SELECT TYPE - </option>
                                <option value="INT"> INT </option>
                                <option value="VARCHAR(100)"> VARCHAR </option> 
                            </select>
                            <button type="submit" name="submit" class="btn btn-primary">Add New Column</button>
                        </form>
                    </div>
                <div class="col-xl-4"></div>
            </div>
        </div>

        <?php

            include 'connect.php';

            if (isset($_POST['submit'])) {

                $table_name = $_POST["table_name"];
                $column_name = $_POST["column_name"];
                $column_type = $_POST["column_type"];

                // SQL statement to add column
                $sql = "ALTER TABLE $table_name ADD $column_name $column_type";

                if ($conn->query($sql) === TRUE) {
                    echo "Column $column_name Added successfully";
                } else {
                    echo "Error adding column: " . $conn->error;
                }
            }
        ?>

    </body>

    </html>

</body>

</html>