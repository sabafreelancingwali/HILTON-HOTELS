<?php require_once __DIR__.'/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Hilton Hotels — Find Your Stay</title>
<style>
:root{--brand:#0a5ad4;--brand2:#0f1e44;--gold:#c8a64b;--bg:#f5f7fb;--text:#0e1730;}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:Segoe UI,Roboto,Arial,sans-serif;background:linear-gradient(180deg,#ffffff, var(--bg));color:var(--text)}
header{position:sticky;top:0;background:#fff;z-index:10;border-bottom:1px solid #e9eef6}
.nav{max-width:1200px;margin:auto;display:flex;align-items:center;justify-content:space-between;padding:16px}
.logo{display:flex;align-items:center;gap:10px;font-weight:800;color:var(--brand2)}
.logo-badge{width:36px;height:36px;border-radius:12px;background:linear-gradient(135deg,var(--brand),#142e88);display:grid;place-items:center;color:#fff;font-weight:900}
.cta{display:flex;gap:10px}
.btn{border:none;padding:10px 16px;border-radius:12px;font-weight:600;cursor:pointer;box-shadow:0 6px 20px rgba(10,90,212,.15);transition:.2s}
.btn.primary{background:var(--brand);color:#fff}
.btn.ghost{background:#f0f4ff;color:var(--brand)}
 
 
.hero{max-width:1200px;margin:28px auto;display:grid;grid-template-columns:1.2fr .8fr;gap:24px;align-items:center}
.hero-card{background:#fff;border-radius:20px;padding:20px;box-shadow:0 20px 60px rgba(15,30,68,.08);border:1px solid #e9eef6}
h1{font-size:38px;line-height:1.15;margin-bottom:10px;color:var(--brand2)}
.sub{color:#42507a;margin-bottom:18px}
 
 
.search{display:grid;grid-template-columns:2fr 1.2fr 1.2fr .8fr .8fr;gap:10px}
.field{display:flex;flex-direction:column;gap:6px}
label{font-size:12px;color:#5a6b9a;font-weight:700}
input,select{padding:12px 12px;border:1px solid #d8e0f0;border-radius:12px;outline:none;font-size:14px}
.search .btn{height:44px;margin-top:22px}
 
 
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:18px}
.card{background:#fff;border-radius:18px;overflow:hidden;border:1px solid #e9eef6;box-shadow:0 12px 40px rgba(15,30,68,.06)}
.img{height:160px;background:#dde6ff;background-size:cover;background-position:center}
.card-body{padding:14px}
.rating{color:#0a5ad4;font-weight:700}
.price{font-weight:800;color:#0e1730}
.tag{display:inline-block;background:#f3f6ff;color:#234; padding:6px 10px;border-radius:999px;font-size:12px;margin:4px 4px 0 0}
footer{max-width:1200px;margin:30px auto;color:#5a6b9a;padding:20px}
 
 
@media(max-width:980px){.hero{grid-template-columns:1fr}.search{grid-template-columns:1fr 1fr;}.grid{grid-template-columns:1fr 1fr}}
@media(max-width:620px){.search{grid-template-columns:1fr}.grid{grid-template-columns:1fr}}
</style>
</head>
<body>
<header>
<div class="nav">
<div class="logo"><div class="logo-badge">H</div> Hilton Hotels</div>
<div class="cta">
<button class="btn ghost" onclick="go('list.php')">Explore</button>
<button class="btn primary" onclick="go('index.php')">Home</button>
</div>
</div>
</html>
