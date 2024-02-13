<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CSV to MySQL Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <?php include 'nav.php'; ?>

        <div class="container mt-5">
            <h1 class="mb-5 text-center">Upload CSV to MySQL Database</h1>
            <div class="row">
                <div class="col-xl-4"></div>
                    <div class="col-xl-4">
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for="">Create Table Name: </label>
                            <input type="text" class="form-control mb-3" name="table_name"> <br>
                            <input type="file" class="form-control mb-3" name="file" accept=".csv" >
                            <button type="submit" name="submit" class="btn btn-primary"> Upload </button>
                        </form>
                    </div>
                <div class="col-xl-4"></div>
            </div>
        </div>

    <?php
        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

        include 'connect.php';
        // Set Character to UTF-8
        mysqli_set_charset($conn, "utf8");

        if (isset($_POST["submit"])) {
            // Get the uploaded file data
            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, "r");

            $table_name = $_POST['table_name']; // replace table name

            // Counter for the number of successful inserts
            $insert_count = 0;

            // Loop through the rows in the csv file
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);

                // Insert the row data into the table
                $sql = "INSERT INTO $table_name VALUES ('" . implode("','", $data) . "')";

                if ($conn->query($sql) === TRUE) {
                    $insert_count++;
                    echo '<script type="text/javascript"> 
                            setTimeout(function() {
                            swal({
                                title: "Success!",
                                text: "File Uploaded successfully!",
                                type: "success"
                            }, function() {
                                window.location = "upload.php";
                            });
                            }, 1000);
                        </script>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            // Only display the success message once, after all the records have been inserted
            if ($insert_count == $num) {
                echo "New Records Created Successfully";
            }

            fclose($handle);
        }

    ?>

</body>

</html>