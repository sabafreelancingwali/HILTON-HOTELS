?php
include 'db.php';
 
$room_id = isset($_GET['room_id']) ? intval($_GET['room_id']) : 0;
$roomQuery = $conn->query("SELECT r.*, h.name as hotel_name FROM rooms r 
                           JOIN hotels h ON r.hotel_id=h.id 
                           WHERE r.id=$room_id");
$room = $roomQuery->fetch_assoc();
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
 
    $stmt = $conn->prepare("INSERT INTO bookings (room_id, name, email, checkin, checkout) VALUES (?,?,?,?,?)");
    $stmt->bind_param("issss", $room_id, $name, $email, $checkin, $checkout);
    $stmt->execute();
 
    echo "<script>window.location.href='confirm.php?name=$name&hotel=".urlencode($room['hotel_name'])."&room=".urlencode($room['type'])."&checkin=$checkin&checkout=$checkout';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Room - Hilton Clone</title>
  <style>
    body{font-family:Arial;background:#f4f4f4;margin:0;padding:0;}
    .form-box{width:400px;margin:50px auto;background:#fff;padding:20px;border-radius:8px;box-shadow:0 2px 6px rgba(0,0,0,0.1);}
    input,button{width:100%;padding:10px;margin:10px 0;border-radius:5px;border:1px solid #ccc;}
    button{background:#003580;color:#fff;cursor:pointer;}
    button:hover{background:#00275d;}
  </style>
</head>
<body>
<div class="form-box">
  <h2>Booking: <?php echo $room['hotel_name']." - ".$room['type']; ?></h2>
  <form method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <label>Check-in:</label>
    <input type="date" name="checkin" required>
    <label>Check-out:</label>
    <input type="date" name="checkout" required>
    <button type="submit">Confirm Booking</button>
  </form>
</div>
</body>
</html>
 
