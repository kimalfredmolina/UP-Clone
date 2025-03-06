<?php
$servername = "localhost";
$username = "root";
$password = "@kimalfred22";
$dbname = "enrollment_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $suffix = $_POST['suffix'];
    $birthdate = $_POST['birthdate'];
    $nationality = $_POST['nationality'];
    $guardian_name = $_POST['guardian_name'];
    $occupation = $_POST['occupation'];
    $guardian_nationality = $_POST['guardian_nationality'];
    $guardian_contact = $_POST['guardian_contact'];
    $address = $_POST['address'];
    $strand = $_POST['strand'];
    $preferred_course = $_POST['preferred_course'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];

    $sql = "INSERT INTO student_applications 
    (first_name, middle_name, last_name, suffix, birthdate, nationality, guardian_name, occupation, guardian_nationality, 
    guardian_contact, address, strand, preferred_course, contact_number, email_address, submission_date) 

    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssss",
        $first_name,
        $middle_name,
        $last_name,
        $suffix,
        $birthdate,
        $nationality,
        $guardian_name,
        $occupation,
        $guardian_nationality,
        $guardian_contact,
        $address,
        $strand,
        $preferred_course,
        $contact_number,
        $email_address
    );

    if ($stmt->execute()) {
        $message = "Application submitted successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UP - Enrollment Form</title>
    <link rel="stylesheet" href="/enroll.css">
</head>

<body>
    <div class="form-container">
        <div class="form-header">
            <img src="/images/up_logo.png" alt="UP Logo" class="logo">
            <h1>University of the Philippines</h1>
            <h2>Student Enrollment Form</h2>
        </div>
        <form id="enrollmentForm" method="POST" action="enroll.php" onsubmit="return confirmSubmission()">
            <div class="form-section">
                <h3>Applicant Information</h3>
                <div class="form-group">
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="middle_name" placeholder="Middle Name (Optional)">
                    <input type="text" name="last_name" placeholder="Last Name" required>
                    <input type="text" name="suffix" placeholder="Suffix (Optional)">
                    <input type="date" name="birthdate" required>
                    <input type="text" name="nationality" placeholder="Nationality" required>
                </div>
            </div>
            <div class="form-section">
                <h3>Other Information</h3>
                <div class="form-group">
                    <input type="text" name="guardian_name" placeholder="Guardian Full Name" required>
                    <input type="text" name="occupation" placeholder="Occupation">
                    <input type="text" name="guardian_nationality" placeholder="Nationality">
                    <input type="text" name="guardian_contact" placeholder="Contact Number">
                </div>
            </div>
            <div class="form-section">
                <h3>Contact Information</h3>
                <div class="form-group">
                    <input type="text" name="address" placeholder="Address" required>
                    <select name="strand" required>
                        <option value="" disabled selected>Select Strand</option>
                        <option value="STEM">STEM</option>
                        <option value="ABM">ABM</option>
                        <option value="HUMSS">HUMSS</option>
                    </select>
                    <input type="text" name="contact_number" placeholder="Contact Number" required>
                    <select name="preferred_course" required>
                        <option value="" disabled selected>Preferred Course</option>
                        <option value="BS Computer Science">BS Computer Science</option>
                        <option value="BS Biology">BS Biology</option>
                        <option value="BS Mathematics">BS Mathematics</option>
                    </select>
                    <input type="email" name="email_address" placeholder="Email Address" required>
                </div>
            </div>
            <div class="form-submit">
                <button type="submit" class="submit-button">Submit</button>
            </div>
        </form>
    </div>
    <script>
        function confirmSubmission() {
            const confirmation = confirm("Are you sure all the data you have entered is correct?");
            return confirmation;
        }
    </script>
</body>

</html>