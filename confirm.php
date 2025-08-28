<!DOCTYPE html>
<html>
<head>
  <title>Booking Confirmation - Hilton Clone</title>
  <style>
    body{font-family:Arial;background:#f4f4f4;margin:0;padding:0;}
    .confirmation{width:500px;margin:80px auto;background:#fff;padding:30px;border-radius:8px;text-align:center;box-shadow:0 2px 8px rgba(0,0,0,0.1);}
    h1{color:#28a745;}
    p{margin:10px 0;}
    a{display:inline-block;margin-top:20px;padding:10px 15px;background:#003580;color:#fff;border-radius:5px;text-decoration:none;}
    a:hover{background:#00275d;}
  </style>
</head>
<body>
<div class="confirmation">
  <h1>✅ Booking Confirmed!</h1>
  <p>Thank you <b><?php echo htmlspecialchars($_GET['name']); ?></b> for booking with us.</p>
  <p>Hotel: <?php echo htmlspecialchars($_GET['hotel']); ?></p>
  <p>Room: <?php echo htmlspecialchars($_GET['room']); ?></p>
  <p>Check-in: <?php echo htmlspecialchars($_GET['checkin']); ?></p>
  <p>Check-out: <?php echo htmlspecialchars($_GET['checkout']); ?></p>
  <a href="index.php">Go Back Home</a>
</div>
</body>
</html>
