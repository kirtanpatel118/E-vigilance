<?php
$root = '/home/vol13_3/infinityfree.com/if0_42397730/htdocs';
$conn = @mysqli_connect('sql312.infinityfree.com', 'if0_42397730', 'L5rOKul31Y', 'if0_42397730_if0_42397730_ecomplaint');

if (!$conn) {
    die("<p style='color:red'>❌ DB Failed: " . mysqli_connect_error() . "</p>");
}
echo "<h2>Employee Fix</h2>";

// 1. Add status column if missing
$cols = mysqli_query($conn, "SHOW COLUMNS FROM user_master LIKE 'status'");
if (mysqli_num_rows($cols) == 0) {
    mysqli_query($conn, "ALTER TABLE user_master ADD COLUMN `status` INT(1) NOT NULL DEFAULT 1 AFTER `user_level`");
    echo "<p style='color:green'>✅ Added 'status' column to user_master (default 1 = active)</p>";
} else {
    echo "<p style='color:green'>✅ 'status' column already exists</p>";
}

// 2. Set all employees to active (status = 1)
mysqli_query($conn, "UPDATE user_master SET status = 1 WHERE user_level = 1");
echo "<p style='color:green'>✅ Set all employees status = 1 (active)</p>";

// 3. Reset employee password to admin123
$pwd = md5('admin123');
mysqli_query($conn, "UPDATE user_master SET pwd = '$pwd' WHERE user_level = 1");
echo "<p style='color:green'>✅ Employee password reset to: <b>admin123</b></p>";

// 4. Show current users
$r = mysqli_query($conn, "SELECT uid, fullname, email, user_level, status FROM user_master");
echo "<h3>Current Users:</h3><table border='1' cellpadding='5'>";
echo "<tr><th>uid</th><th>Name</th><th>Email</th><th>Level</th><th>Status</th></tr>";
while ($row = mysqli_fetch_assoc($r)) {
    $level = $row['user_level'] == 0 ? 'Admin' : 'Employee';
    $status = $row['status'] == 1 ? 'Active' : 'Inactive';
    echo "<tr><td>{$row['uid']}</td><td>{$row['fullname']}</td><td>{$row['email']}</td><td>{$level}</td><td>{$status}</td></tr>";
}
echo "</table>";

if (function_exists('opcache_reset')) { opcache_reset(); }
echo "<p><b>Done! Employee login: <br>Email: kalathiyakirtan118@gmail.com<br>Password: admin123</b></p>";
mysqli_close($conn);
