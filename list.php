
<?php require_once __DIR__.'/db.php';
$destination = trim($_GET['destination'] ?? '');
$checkin = $_GET['checkin'] ?? '';
$checkout = $_GET['checkout'] ?? '';
$guests = $_GET['guests'] ?? '1';
$min = (int)($_GET['min'] ?? 0);
$max = (int)($_GET['max'] ?? 10000);
$rating = (float)($_GET['rating'] ?? 0);
$sort = $_GET['sort'] ?? 'best';
$amen = $_GET['amen'] ?? []; if(!is_array($amen)) $amen = [$amen];
 
 
$where = [];
$params = [];
if($destination !== ''){ $where[] = "(city LIKE :dest OR country LIKE :dest OR name LIKE :dest)"; $params[':dest'] = "%$destination%"; }
$where[] = "starting_price BETWEEN :min AND :max"; $params[':min'] = $min; $params[':max'] = $max;
$where[] = "rating >= :rating"; $params[':rating'] = $rating;
foreach($amen as $i=>$a){ $where[] = "amenities LIKE :a$i"; $params[":a$i"] = "%$a%"; }
 
 
$order = "ORDER BY rating DESC, starting_price ASC";
if($sort==='price-asc') $order = "ORDER BY starting_price ASC";
if($sort==='price-desc') $order = "ORDER BY starting_price DESC";
if($sort==='rating') $order = "ORDER BY rating DESC";
 
 
$sql = "SELECT * FROM hotels" . (count($where)? " WHERE ".implode(' AND ',$where):'') . " $order";
$stmt = $pdo->prepare($sql); $stmt->execute($params); $hotels = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Results — Hilton Hotels</title>
<style>
:root{--brand:#0a5ad4;--ink:#0e1730;--muted:#63719b;--chip:#eef3ff}
body{font-family:Segoe UI,Roboto,Arial;background:#f6f8fc;color:var(--ink)}
.wrap{max-width:1200px;margin:20px auto;padding:0 12px}
.bar{background:#fff;border:1px solid #e5ebf6;box-shadow:0 12px 40px rgba(15,30,68,.05);border-radius:18px;padding:14px;margin-bottom:14px}
.row{display:grid;grid-template-columns:repeat(6,1fr);gap:10px}
label{font-size:12px;color:var(--muted);font-weight:800}
input,select{padding:10px;border:1px solid #d9e2f3;border-radius:12px}
.btn{border:none;padding:10px 14px;border-radius:12px;background:var(--brand);color:#fff;font-weight:700;cursor:pointer}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:12px}
.card{background:#fff;border:1px solid #e5ebf6;border-radius:18px;overflow:hidden;box-shadow:0 10px 30px rgba(15,30,68,.05)}
.img{height:160px;background:#dde6ff;background-size:cover;background-position:center}
.card-body{padding:12px}
.chip{display:inline-block;background:var(--chip);padding:6px 10px;border-radius:999px;font-size:12px;color:#20315e;margin:2px}
.top{display:flex;justify-content:space-between;align-items:center;margin-bottom:4px}
.price{font-weight:900}
@media(max-width:980px){.row{grid-template-columns:1fr 1fr 1fr}.grid{grid-template-columns:1fr 1fr}}
@media(max-width:620px){.row{grid-template-columns:1fr}.grid{grid-template-columns:1fr}}
</style>
</head>
<body>
</d
