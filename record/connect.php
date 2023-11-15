<?php
$conn = new mysqli("localhost", "root", "", "validation");
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    $duplicateCheckSql = "SELECT id FROM validate WHERE name='$firstname' AND middle='$middlename' AND last='$lastname' OR email='$email' OR phone='$phone'";
    $duplicateResult = $conn->query($duplicateCheckSql);

    if ($duplicateResult->num_rows > 0) {
        echo "<script>alert('A Duplicate data is detected.'); window.location='record.php';</script>";
    } else {
       
        $insertSql = "INSERT INTO validate (name, middle, last, email, gender, address, phone) 
                        VALUES ('$firstname', '$middlename', '$lastname', '$email', '$gender', '$address', '$phone')";

        if ($conn->query($insertSql) === TRUE) {
           
            header("Location: display_info.php");
            exit();
        } else {
            echo "Error: " . $insertSql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
