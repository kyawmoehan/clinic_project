<?php
// used to connect to the database
$host = "localhost";
$db_name = "clinic_project";
$username = "root";
$password = "";
try {
  $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);

  // sql to create table
  $patients = "CREATE TABLE IF NOT EXISTS `patients` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `patientNo` varchar(255) NOT NULL,
    `fullName` varchar(255) NOT NULL,
    `dob` date NOT NULL,
    `age` smallint(6) NOT NULL,
    `sex` enum('Male', 'Female') NOT NULL,
    `bloodGroup` enum('A', 'B', 'AB', 'O') NOT NULL,
    `allergy` varchar(255),
    `fatherName` varchar(255),
    `spouseName` varchar(255),
    `streetName` varchar(255),
    `block` varchar(255),
    `township` varchar(255),
    `city` varchar(255),
    `created` datetime NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;";

  if ($con->query($patients) === TRUE) {
    echo "Table Patients created successfully";
  }

  // sql to create table
  $patients = "CREATE TABLE IF NOT EXISTS `patients` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `patientNo` varchar(255) NOT NULL,
    `fullName` varchar(255) NOT NULL,
    `dob` date NOT NULL,
    `age` smallint(6) NOT NULL,
    `sex` enum('Male', 'Female') NOT NULL,
    `bloodGroup` enum('A', 'B', 'AB', 'O') NOT NULL,
    `allergy` varchar(255),
    `fatherName` varchar(255),
    `spouseName` varchar(255),
    `streetName` varchar(255),
    `block` varchar(255),
    `township` varchar(255),
    `city` varchar(255),
    `created` datetime NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;";

  if ($con->query($patients) === TRUE) {
    echo "Table MyGuests created successfully";
  }

  // sql to create table
  $doctors = "CREATE TABLE IF NOT EXISTS `doctors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `doctorNo` VARCHAR(255) NOT NULL,
  `fullName` VARCHAR(255) NOT NULL,
  `qualification` VARCHAR(255) NOT NULL,
  `specializing` VARCHAR(255) NOT NULL,
  `streetName` VARCHAR(255),
  `block` VARCHAR(255),
  `township` VARCHAR(255),
  `city` VARCHAR(255),
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;";

  if ($con->query($doctors) === TRUE) {
    echo "Table Doctors created successfully";
  }
}
// show error
catch (PDOException $exception) {
  echo "Connection error: " . $exception->getMessage();
}
