<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$root = '/home/vol13_3/infinityfree.com/if0_42397730/htdocs';

echo "<h2>Database Connection Test</h2>";

// Read .env credentials
$env = file_get_contents($root . '/.env');
preg_match('/database\.default\.hostname\s*=\s*(\S+)/', $env, $h);
preg_match('/database\.default\.database\s*=\s*(\S+)/', $env, $d);
preg_match('/database\.default\.username\s*=\s*(\S+)/', $env, $u);
preg_match('/database\.default\.password\s*=\s*(\S+)/', $env, $p);

$host = $h[1] ?? ''; $db = $d[1] ?? '';
$user = $u[1] ?? ''; $pass = $p[1] ?? '';

echo "<p>Host: $host</p>";
echo "<p>DB: $db</p>";
echo "<p>User: $user</p>";

// Test mysqli connection
$conn = @mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    echo "<p style='color:red'>❌ Connection FAILED: " . mysqli_connect_error() . "</p>";
} else {
    echo "<p style='color:green'>✅ Connected to MySQL!</p>";

    // Check tables
    $tables = mysqli_query($conn, "SHOW TABLES");
    echo "<h3>Tables:</h3><ul>";
    while ($row = mysqli_fetch_row($tables)) {
        echo "<li>" . $row[0] . "</li>";
    }
    echo "</ul>";

    // Check users table
    // Show table structure
    $cols = mysqli_query($conn, "DESCRIBE user_master");
    echo "<h3>user_master structure:</h3><table border='1' cellpadding='4'><tr><th>Field</th><th>Type</th><th>Null</th><th>Default</th></tr>";
    while ($col = mysqli_fetch_assoc($cols)) {
        echo "<tr><td>{$col['Field']}</td><td>{$col['Type']}</td><td>{$col['Null']}</td><td>{$col['Default']}</td></tr>";
    }
    echo "</table>";

    // Show all users
    $result = mysqli_query($conn, "SELECT * FROM user_master LIMIT 10");
    echo "<h3>Users in user_master:</h3>";
    echo "<table border='1' cellpadding='5'><tr><th>uid</th><th>fullname</th><th>email</th><th>pwd</th><th>user_level</th></tr>";
    $rowcount = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $rowcount++;
        echo "<tr><td>{$row['uid']}</td><td>{$row['fullname']}</td><td>{$row['email']}</td><td>{$row['pwd']}</td><td>{$row['user_level']} (" . ($row['user_level']==0?'Admin':'Employee') . ")</td></tr>";
    }
    echo "</table>";

    // Insert default admin if empty
    if ($rowcount == 0) {
        echo "<h3>No users found — creating default admin...</h3>";
        $pwd = md5('admin123');
        $sql = "INSERT INTO user_master (fullname, email, pwd, user_level, branch, position, joining_date, dt) VALUES ('Admin', 'admin@admin.com', '$pwd', 0, 'HQ', 'Admin', '2024-01-01', NOW())";
        if (mysqli_query($conn, $sql)) {
            echo "<p style='color:green'>✅ Admin created!<br>Email: admin@admin.com<br>Password: admin123</p>";
        } else {
            echo "<p style='color:red'>❌ Insert failed: " . mysqli_error($conn) . "</p>";
        }
    } else {
        // Reset a known user's password to admin123
        $pwd = md5('admin123');
        mysqli_query($conn, "UPDATE user_master SET pwd='$pwd' WHERE user_level=0 LIMIT 1");
        echo "<p style='color:green'>✅ Admin password reset to: <strong>admin123</strong></p>";
    }

    mysqli_close($conn);
}

// Check CI4 error log
echo "<h3>CI4 Error Log:</h3>";
$logs = glob($root . '/writable/logs/log-*.log');
if ($logs) {
    rsort($logs);
    echo "<pre style='background:#111;color:#0f0;font-size:11px;padding:10px'>";
    echo htmlspecialchars(file_get_contents($logs[0]));
    echo "</pre>";
} else {
    echo "<p>No log files</p>";
}
