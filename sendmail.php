<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $servername = "localhost";
    $username = "u605883248_rajat_bhati";
    $password = "Bhatiji123";
    $dbname = "u605883248_Enquiries";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO ContactFormSubmissions (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "Data saved successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Form not submitted.";
}
?>
