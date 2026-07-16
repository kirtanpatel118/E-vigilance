<?php
// getadmin.php - shows admin email only, no passwords. Delete after use.
$host='sql312.infinityfree.com';$db='if0_42397730_if0_42397730_ecomplaint';
$u='if0_42397730';$p='L5rOKul31Y';
$conn=new mysqli($host,$u,$p,$db);
if($conn->connect_error){die("DB error: ".$conn->connect_error);}
$r=$conn->query("SELECT uid,fullname,email,user_level,status FROM user_master ORDER BY user_level ASC");
echo "<table border=1 cellpadding=5><tr><th>uid</th><th>Name</th><th>Email</th><th>Level (0=Admin)</th><th>Status</th></tr>";
while($row=$r->fetch_assoc()){
    echo "<tr><td>{$row['uid']}</td><td>{$row['fullname']}</td><td>{$row['email']}</td><td>{$row['user_level']}</td><td>{$row['status']}</td></tr>";
}
echo "</table><p style='color:red'>DELETE THIS FILE NOW.</p>";
