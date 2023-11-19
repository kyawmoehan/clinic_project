<?php
include('../config/connect.php');
if (isset($_POST["create"])) {
    try {
        $query = "INSERT INTO patients SET patientNo=:patientNo, fullName=:fullName, dob=:dob, age=:age, sex=:sex, bloodGroup=:bloodGroup, allergy=:allergy, fatherName=:fatherName, spouseName=:spouseName, streetName=:streetName, block=:block,township=:township, city=:city, created=:created";
        // prepare query for execution
        $stmt = $con->prepare($query);
        // posted values
        $patientNo = htmlspecialchars(strip_tags($_POST['patientNo']));
        $fullName = htmlspecialchars(strip_tags($_POST['fullName']));
        $dob = htmlspecialchars(strip_tags($_POST['dob']));
        $age = htmlspecialchars(strip_tags($_POST['age']));
        $sex = htmlspecialchars(strip_tags($_POST['sex']));
        $bloodGroup = htmlspecialchars(strip_tags($_POST['bloodGroup']));
        $allergy = htmlspecialchars(strip_tags($_POST['allergy']));
        $fatherName = htmlspecialchars(strip_tags($_POST['fatherName']));
        $spouseName = htmlspecialchars(strip_tags($_POST['spouseName']));
        $streetName = htmlspecialchars(strip_tags($_POST['streetName']));
        $block = htmlspecialchars(strip_tags($_POST['block']));
        $township = htmlspecialchars(strip_tags($_POST['township']));
        $city = htmlspecialchars(strip_tags($_POST['city']));

        // bind the parameters
        $stmt->bindParam(':patientNo', $patientNo);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':bloodGroup', $bloodGroup);
        $stmt->bindParam(':allergy', $allergy);
        $stmt->bindParam(':fatherName', $fatherName);
        $stmt->bindParam(':spouseName', $spouseName);
        $stmt->bindParam(':streetName', $streetName);
        $stmt->bindParam(':block', $block);
        $stmt->bindParam(':township', $township);
        $stmt->bindParam(':city', $city);
        // specify when this record was inserted to the database
        $created = date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);

        if ($stmt->execute()) {
            session_start();
            $_SESSION["patientCreate"] = "Patient Added Successfully!";
            header("Location: ../index.php");
        } else {
            die("Something went wrong");
        }
    } catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}

if (isset($_POST["edit"])) {
    try {
        $query = "UPDATE patients SET patientNo=:patientNo, fullName=:fullName, dob=:dob, age=:age, sex=:sex, bloodGroup=:bloodGroup, allergy=:allergy, fatherName=:fatherName, spouseName=:spouseName, streetName=:streetName, block=:block,township=:township, city=:city WHERE id = :id";
        // prepare query for execution
        $stmt = $con->prepare($query);
        // posted values
        $id = htmlspecialchars(strip_tags($_POST['id']));
        $patientNo = htmlspecialchars(strip_tags($_POST['patientNo']));
        $fullName = htmlspecialchars(strip_tags($_POST['fullName']));
        $dob = htmlspecialchars(strip_tags($_POST['dob']));
        $age = htmlspecialchars(strip_tags($_POST['age']));
        $sex = htmlspecialchars(strip_tags($_POST['sex']));
        $bloodGroup = htmlspecialchars(strip_tags($_POST['bloodGroup']));
        $allergy = htmlspecialchars(strip_tags($_POST['allergy']));
        $fatherName = htmlspecialchars(strip_tags($_POST['fatherName']));
        $spouseName = htmlspecialchars(strip_tags($_POST['spouseName']));
        $streetName = htmlspecialchars(strip_tags($_POST['streetName']));
        $block = htmlspecialchars(strip_tags($_POST['block']));
        $township = htmlspecialchars(strip_tags($_POST['township']));
        $city = htmlspecialchars(strip_tags($_POST['city']));

        // bind the parameters
        $stmt->bindParam(':patientNo', $patientNo);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':bloodGroup', $bloodGroup);
        $stmt->bindParam(':allergy', $allergy);
        $stmt->bindParam(':fatherName', $fatherName);
        $stmt->bindParam(':spouseName', $spouseName);
        $stmt->bindParam(':streetName', $streetName);
        $stmt->bindParam(':block', $block);
        $stmt->bindParam(':township', $township);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            session_start();
            $_SESSION["patientUpdated"] = "Patient Updated Successfully!";
            header("Location: ../index.php");
        } else {
            die("Something went wrong");
        }
    } catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}

if (isset($_GET['id'])) {
    try {
        // get record ID
        // isset() is a PHP function used to verify if a value is there or not
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
        // delete query
        $query = "DELETE FROM patients WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            session_start();
            $_SESSION["patientDeleted"] = "Patient Deleted Successfully!";
            header("Location: ../index.php");
        } else {
            die('Unable to delete record.');
        }
    }
    // show error
    catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
} else {
    echo "Patient does not exist";
}
