<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h3>Update Patient</h3>
            <div>
                <a href="../../index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <?php
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
        include '../../config/connect.php';
        // read current record's data
        try {
            // prepare select query
            $query = "SELECT * FROM patients WHERE id = ? LIMIT 0,1";
            $stmt = $con->prepare($query);
            // this is the first question mark
            $stmt->bindParam(1, $id);
            // execute our query
            $stmt->execute();
            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        // show error
        catch (PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
        ?>

        <form action="../../process/patient.php" method="post">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="fullName" placeholder="Full Name" value="<?php echo $row["fullName"]; ?>" required="true">
            </div>
            <div class="form-element my-4">
                <input type="number" class="form-control" name="patientNo" placeholder="Patient Number" value="<?php echo $row["patientNo"]; ?>" required="true">
            </div>
            <div class="form-element my-4">
                <input type="date" class="form-control" name="dob" value="<?php echo $row["dob"]; ?>" required="true">
            </div>
            <div class="form-element my-4">
                <input type="number" class="form-control" name="age" placeholder="Age" value="<?php echo $row["age"]; ?>" required="true">
            </div>
            <div class="form-element my-4">
                <select name="sex" id="" class="form-control" required="true">
                    <option value="">Select Gender</option>
                    <option value="Male" <?php if ($row["sex"] == "Male") {
                                                echo "selected";
                                            } ?>>Male</option>
                    <option value="Female" <?php if ($row["sex"] == "Female") {
                                                echo "selected";
                                            } ?>>Female</option>
                </select>
            </div>
            <div class="form-element my-4">
                <select name="bloodGroup" id="" class="form-control" required="true">
                    <option value="">Select Blood Group</option>
                    <option value="A" <?php if ($row["bloodGroup"] == "A") {
                                            echo "selected";
                                        } ?>>A</option>
                    <option value="B" <?php if ($row["bloodGroup"] == "B") {
                                            echo "selected";
                                        } ?>>B</option>
                    <option value="AB" <?php if ($row["bloodGroup"] == "AB") {
                                            echo "selected";
                                        } ?>>AB</option>
                    <option value="O" <?php if ($row["bloodGroup"] == "O") {
                                            echo "selected";
                                        } ?>>O</option>
                </select>
            </div>
            <div class="form-element my-4">
                <textarea name="allergy" class="form-control" placeholder="Patient Allergy"><?php echo $row["allergy"]; ?></textarea>
            </div>
            <div class="form-element my-4">
                <input type="text" name="fatherName" class="form-control" placeholder="Father Name" value="<?php echo $row["fatherName"]; ?>"></input>
            </div>
            <div class="form-element my-4">
                <input type="text" name="spouseName" class="form-control" placeholder="Spouse Name" value="<?php echo $row["spouseName"]; ?>"></input>
            </div>
            <div class="form-element my-4">
                <input type="text" name="streetName" class="form-control" placeholder="Street Name" value="<?php echo $row["streetName"]; ?>"></input>
            </div>
            <div class="form-element my-4">
                <input type="text" name="block" class="form-control" placeholder="Block" value="<?php echo $row["block"]; ?>"></input>
            </div>
            <div class="form-element my-4">
                <input type="text" name="township" class="form-control" placeholder="Township" value="<?php echo $row["township"]; ?>"></input>
            </div>
            <div class="form-element my-4">
                <input type="text" name="city" class="form-control" placeholder="city" value="<?php echo $row["city"]; ?>"></input>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="edit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>