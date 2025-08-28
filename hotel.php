<?php
include 'db.php';
 
$hotel_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$hotelQuery = $conn->query("SELECT * FROM hotels WHERE id=$hotel_id");
$hotel = $hotelQuery->fetch_assoc();
 
$roomsQuery = $conn->query("SELECT * FROM rooms WHERE hotel_id=$hotel_id");
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $hotel['name']; ?> - Hilton Clone</title>
  <style>
    body{font-family:Arial, sans-serif;background:#f4f4f4;margin:0;padding:0;}
    .container{width:90%;margin:auto;}
    .hotel-header{background:#003580;color:#fff;padding:20px;border-radius:8px;margin:20px 0;}
    .rooms{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px;}
    .room{background:#fff;padding:15px;border-radius:8px;box-shadow:0 2px 6px rgba(0,0,0,0.1);}
    button{background:#ff6200;color:#fff;border:none;padding:10px 15px;border-radius:5px;cursor:pointer;}
    button:hover{background:#e55a00;}
  </style>
</head>
<body>
<div class="container">
  <div class="hotel-header">
    <h1><?php echo $hotel['name']; ?></h1>
    <p><?php echo $hotel['location']; ?> | ⭐ <?php echo $hotel['rating']; ?></p>
  </div>
 
  <h2>Available Rooms</h2>
  <div class="rooms">
    <?php while($room = $roomsQuery->fetch_assoc()){ ?>
      <div class="room">
        <h3><?php echo $room['type']; ?></h3>
        <p>Price: $<?php echo $room['price']; ?> / night</p>
        <button onclick="redirectToBook(<?php echo $room['id']; ?>)">Book Now</button>
      </div>
    <?php } ?>
  </div>
</div>
 
<script>
function redirectToBook(roomId){
  window.location.href = "book.php?room_id=" + roomId;
}
</script>
</body>
</html>
