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
            <h3>Add New Patient</h3>
            <div>
                <a href="../../index.php" class="btn btn-primary">Back</a>
            </div>
        </header>

        <form action="../../process/patient.php" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="fullName" placeholder="Full Name" required="true">
            </div>
            <div class="form-element my-4">
                <input type="number" class="form-control" name="patientNo" placeholder="Patient Number" required="true">
            </div>
            <div class="form-element my-4">
                <input type="date" class="form-control" name="dob" required="true">
            </div>
            <div class="form-element my-4">
                <input type="number" class="form-control" name="age" placeholder="Age" required="true">
            </div>
            <div class="form-element my-4">
                <select name="sex" id="" class="form-control" required="true">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-element my-4">
                <select name="bloodGroup" id="" class="form-control" required="true">
                    <option value="">Select Blood Group</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>
            <div class="form-element my-4">
                <textarea name="allergy" class="form-control" placeholder="Patient Allergy"></textarea>
            </div>
            <div class="form-element my-4">
                <input type="text" name="fatherName" class="form-control" placeholder="Father Name"></input>
            </div>
            <div class="form-element my-4">
                <input type="text" name="spouseName" class="form-control" placeholder="Spouse Name"></input>
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