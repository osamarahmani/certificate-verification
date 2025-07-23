<?php
// DB config
$host = "localhost";
$username = "root";
$password = "";
$database = "certificates_db";

// Connect
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get certificate ID from form
$certificate_id = $_GET['certificate_id'] ?? '';

// Query DB
$sql = "SELECT * FROM certificates WHERE certificate_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $certificate_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Certificate Details</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <?php if ($result->num_rows > 0): 
      $row = $result->fetch_assoc(); ?>
      
      <h2>✅ Certificate Verified</h2>
      <div class="card">
        <h3><?php echo htmlspecialchars($row['student_name']); ?></h3>
        <p><strong>Course:</strong> <?php echo htmlspecialchars($row['course_name']); ?></p>
        <p><strong>Issue Date:</strong> <?php echo htmlspecialchars($row['issue_date']); ?></p>
        <p><strong>Certificate ID:</strong> <?php echo htmlspecialchars($row['certificate_id']); ?></p>

        <div class="certificate-card">
          <img src="uploads/<?php echo htmlspecialchars($row['image_file']); ?>" alt="Certificate Image">
        </div>
      </div>

    <?php else: ?>
      <h2>❌ Certificate Not Found</h2>
      <p>Please check the certificate ID and try again.</p>
    <?php endif; ?>
    
    <br>
    <a href="index.php"><button>🔙 Back</button></a>
  </div>
</body>
</html>
