<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Patient</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h3>Add New Doctor</h3>
            <div>
                <a href="../../index.php" class="btn btn-primary">Back</a>
            </div>
        </header>

        <form action="../../process/doctor.php" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="fullName" placeholder="Full Name">
            </div>
            <div class="form-element my-4">
                <input type="number" class="form-control" name="doctorNo" placeholder="Doctor Number">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="qualification" placeholder="Qualification">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="specializing" placeholder="specializing">
            </div>
            <div class="form-element my-4">
                <input type="text" name="streetName" class="form-control" placeholder="Street Name"></input>
            </div>
            <div class="form-element my-4">
                <input type="text" name="block" class="form-control" placeholder="Block"></input>
            </div>
            <div class="form-element my-4">
                <input type="text" name="township" class="form-control" placeholder="Township"></input>
            </div>
            <div class="form-element my-4">
                <input type="text" name="city" class="form-control" placeholder="city"></input>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" class="btn btn-primary" value="Create">
            </div>
        </form>

    </div>
    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>