<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card-container {
            display: flex;
            justify-content: center;
            /* align-items: center;
            height: 100vh; */
        }

        .card {
            width: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        p {
            margin-bottom: 10px;
            font-size: 16px;
        }

        strong {
            font-weight: bold;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .info-label {
            color: #6c757d;
        }

        .info-value {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h3>Patient Details</h3>
            <div>
                <a href="../../index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <?php
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
        include '../../config/connect.php';
        try {
            $query = "SELECT * FROM patients WHERE id = ? LIMIT 0,1";
            $stmt = $con->prepare($query);

            $stmt->bindParam(1, $id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        // show error
        catch (PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
        ?>

        <div class="card-container">
            <div class="card">
                <div class="card-body">
                    <div class="info-row">
                        <div class="info-label">Patient Number:</div>
                        <div class="info-value"><?php echo $row["patientNo"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Name:</div>
                        <div class="info-value"><?php echo $row["fullName"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">DOB:</div>
                        <div class="info-value"><?php echo $row["dob"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Age:</div>
                        <div class="info-value"><?php echo $row["age"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Sex:</div>
                        <div class="info-value"><?php echo $row["sex"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Blood Group:</div>
                        <div class="info-value"><?php echo $row["bloodGroup"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Allergy:</div>
                        <div class="info-value"><?php echo $row["allergy"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Father Name:</div>
                        <div class="info-value"><?php echo $row["fatherName"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Spouse Name:</div>
                        <div class="info-value"><?php echo $row["spouseName"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Street Name:</div>
                        <div class="info-value"><?php echo $row["streetName"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Block:</div>
                        <div class="info-value"><?php echo $row["block"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Township:</div>
                        <div class="info-value"><?php echo $row["township"]; ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">City:</div>
                        <div class="info-value"><?php echo $row["city"]; ?></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>