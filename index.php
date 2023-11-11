<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-4">
        <!-- patient -->
        <header class="d-flex justify-content-between my-4">
            <h3>Patient List</h3>
            <div>
                <a href="create.php" class="btn btn-primary">Add New Patient</a>
            </div>
        </header>
        <div class="table-responsive">
        <table class='table table-hover table-bordered'>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Dob</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Blood</th>
                <th>allergy</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>       
        <?php
        include('./config/connect.php');
        $query = "SELECT * FROM patients ORDER BY id DESC";
        $stmt = $con->prepare($query);
        $stmt->execute();

        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($data);
            ?>
            <tr>
                <td><?php echo "{$id}" ?></td>
                <td><?php echo "{$fullName}" ?></td>
                <td><?php echo "{$dob}" ?></td>
                <td><?php echo "{$age}" ?></td>
                <td><?php echo "{$sex}" ?></td>
                <td><?php echo "{$bloodGroup}" ?></td>
                <td><?php echo "{$allergy}" ?></td>
                <td><?php echo date_format(new DateTime($created),"d M Y") ?></td>
                <td>
                    <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-info">Read</a>
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
        </div>
    </div>
    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>