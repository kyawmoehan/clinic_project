<?php
include('../config/connect.php');
if (isset($_POST["create"])) {
    $query = "INSERT INTO patents SET fullName=:fullName, dob=:dob, age=:age, sex=:sex,bloodGroup=:bloodGroup, created=:created";
    // prepare query for execution
    $stmt = $con->prepare($query);
    // posted values
    $fullName = htmlspecialchars(strip_tags($_POST['fullName']));
    $dob = htmlspecialchars(strip_tags($_POST['dob']));
    $age = htmlspecialchars(strip_tags($_POST['age']));
    $sex = htmlspecialchars(strip_tags($_POST['sex']));
    $bloodGroup = htmlspecialchars(strip_tags($_POST['bloodGroup']));
    // bind the parameters
    $stmt->bindParam(':fullName', $fullName);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':age', $sex);
    $stmt->bindParam(':age', $bloodGroup);
    // specify when this record was inserted to the database
    $created = date('Y-m-d H:i:s');
    $stmt->bindParam(':created', $created);

    if ($stmt->execute()) {
        session_start();
        $_SESSION["create"] = "Patient Added Successfully!";
        header("Location:index.php");
    } else {
        die("Something went wrong");
    }
}
?>