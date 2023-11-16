<?php
include('../config/connect.php');
if (isset($_POST["create"])) {
    try {
        $query = "INSERT INTO doctors SET doctorNo=:doctorNo, fullName=:fullName,qualification=:qualification, specializing=:specializing, streetName=:streetName, block=:block,township=:township, city=:city, created=:created";
        // prepare query for execution
        $stmt = $con->prepare($query);
        // posted values
        $doctorNo = htmlspecialchars(strip_tags($_POST['doctorNo']));
        $fullName = htmlspecialchars(strip_tags($_POST['fullName']));
        $qualification = htmlspecialchars(strip_tags($_POST['qualification']));
        $specializing = htmlspecialchars(strip_tags($_POST['specializing']));
        $streetName = htmlspecialchars(strip_tags($_POST['streetName']));
        $block = htmlspecialchars(strip_tags($_POST['block']));
        $township = htmlspecialchars(strip_tags($_POST['township']));
        $city = htmlspecialchars(strip_tags($_POST['city']));

        // bind the parameters
        $stmt->bindParam(':doctorNo', $doctorNo);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':qualification', $qualification);
        $stmt->bindParam(':specializing', $specializing);
        $stmt->bindParam(':streetName', $streetName);
        $stmt->bindParam(':block', $block);
        $stmt->bindParam(':township', $township);
        $stmt->bindParam(':city', $city);
        // specify when this record was inserted to the database
        $created = date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);

        if ($stmt->execute()) {
            session_start();
            $_SESSION["doctorCreate"] = "Doctor Added Successfully!";
            header("Location: ../index.php");
        } else {
            die("Something went wrong");
        }
    } catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}
