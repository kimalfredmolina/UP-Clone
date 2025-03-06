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
        <div class="form-back-button">
            <button type="button" class="back-arrow" onclick="window.location.href='index.php'">
                ← Back
            </button>
        </div>

        <div class="form-header">
            <img src="/images/up_logo.png" alt="UP Logo" class="logo">
            <h1>University of the Philippines</h1>
            <h2>Student Enrollment Form</h2>
        </div>

        <div id="popupWarning" class="popup-warning" style="display: none;">
            <div class="popup-content">
                <p id="popupMessage"></p>
                <button id="confirmButton">Confirm</button>
                <button id="dismissButton" onclick="hidePopup()">Dismiss</button>
            </div>
        </div>

        <form id="enrollmentForm" method="POST" action="enroll.php" onsubmit="confirmSubmission(event)">
            <div class="form-section">
                <h3>Applicant Information</h3>
                <div class="form-group">
                    <div>
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required>
                    </div>
                    <div>
                        <label for="middle_name">Middle Name (Optional)</label>
                        <input type="text" id="middle_name" name="middle_name" placeholder="Enter your middle name">
                    </div>
                    <div>
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>
                    </div>
                    <div>
                        <label for="suffix">Suffix (Optional)</label>
                        <input type="text" id="suffix" name="suffix" placeholder="Enter your suffix">
                    </div>
                    <div>
                        <label for="birthdate">Birthdate</label>
                        <input type="date" id="birthdate" name="birthdate" required>
                        <small class="helper-text">Please enter your birthdate (MM/DD/YYYY).</small>
                    </div>
                    <div>
                        <label for="nationality">Nationality</label>
                        <input type="text" id="nationality" name="nationality" placeholder="Enter your nationality" required>
                    </div>
                </div>
            </div>
            <div class="form-section">
                <h3>Other Information</h3>
                <div class="form-group">
                    <div>
                        <label for="guardian_name">Guardian Full Name</label>
                        <input type="text" id="guardian_name" name="guardian_name" placeholder="Enter guardian's full name" required>
                    </div>
                    <div>
                        <label for="occupation">Occupation</label>
                        <input type="text" id="occupation" name="occupation" placeholder="Enter guardian's occupation">
                    </div>
                    <div>
                        <label for="guardian_nationality">Guardian's Nationality</label>
                        <input type="text" id="guardian_nationality" name="guardian_nationality" placeholder="Enter guardian's nationality">
                    </div>
                    <div>
                        <label for="guardian_contact">Guardian's Contact Number</label>
                        <input type="text" id="guardian_contact" name="guardian_contact" placeholder="Enter guardian's contact number">
                    </div>
                </div>
            </div>
            <div class="form-section">
                <h3>Contact Information</h3>
                <div class="form-group">
                    <div>
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter your address" required>
                    </div>
                    <div>
                        <label for="strand">Select Strand</label>
                        <select id="strand" name="strand" required>
                            <option value="" disabled selected>Select Strand</option>
                            <option value="STEM">STEM</option>
                            <option value="ABM">ABM</option>
                            <option value="HUMSS">HUMSS</option>
                        </select>
                    </div>
                    <div>
                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" placeholder="Enter your contact number" required>
                    </div>
                    <div>
                        <label for="preferred_course">Preferred Course</label>
                        <select id="preferred_course" name="preferred_course" required>
                            <option value="" disabled selected>Select Preferred Course</option>
                            <option value="BS Computer Science">BS Computer Science</option>
                            <option value="BS Biology">BS Biology</option>
                            <option value="BS Mathematics">BS Mathematics</option>
                        </select>
                    </div>
                    <div>
                        <label for="email_address">Email Address</label>
                        <input type="email" id="email_address" name="email_address" placeholder="Enter your email address" required>
                    </div>
                </div>
            </div>
            <div class="form-submit">
                <button type="submit" class="submit-button">Submit</button>
            </div>
        </form>
    </div>
    <script src="/enroll.js"></script>
</body>

</html>