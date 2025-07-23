<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Certificate Verification</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>🔍 Verify Certificate</h2>
    <form action="verify.php" method="GET">
      <input type="text" name="certificate_id" placeholder="Enter Certificate ID (e.g. CERT-20250723-001)" required>
      <button type="submit">Verify</button>
    </form>
  </div>
</body>
</html>
