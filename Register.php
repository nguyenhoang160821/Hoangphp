<?php
/*-------------------------*/
setcookie("fullname","username");
require_once 'Login.php';
$conn = new mysqli($hn, $un, $pw, $db);

if (isset($_POST['id'])   && isset($_POST['name']) &&
    isset($_POST['email']) && isset($_POST['title']) &&
    isset($_POST['password']))
{
    $id  = get_post($conn, 'id ');
    $name    = get_post($conn, 'name');
    $email = get_post($conn, 'email');
    $title    = get_post($conn, 'year');
    $password    = get_post($conn, 'isbn');
    $query    = "INSERT INTO classics VALUES" .
        "('$id ', '$name', '$email', '$title','$password')";
    $result   = $conn->query($query);
    if (!$result) echo "INSERT failed<br><br>";
}

echo <<<_END
  <form action="test.php" method="post"><pre>
    id    <input type="text" name="id">
  name    <input type="text" name="name">
 eamil    <input type="text" name="email">
 title    <input type="text" name="title">
 password <input type="text" name="password">
           <input type="submit" value="Đăng kí">
  </pre></form>
_END;
$query  = "SELECT * FROM users";
$result = $conn->query($query);
if (!$result) die ("Database access failed");
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
    $row = $result->fetch_array(MYSQLI_NUM);
    $r0 = $row[0];
    $r1 = $row[1];
    $r2 = $row[2];
    $r3 = $row[3];
    $r4 = $row[4];

    echo <<<_END
_END;
}
$result->close();
$conn->close();

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
if (isset($_COOKIE['cookies'])){
    foreach ($_COOKIE['cookies'] as $fullname => $username)
    {
        $fullname = htmlspecialchars($name);
        $username = htmlspecialchars($username);
        echo "$fullname : $username <br>\n";
    }
}
/*---------------------*/
if(isset($_SERVER['PHP_AUTH_USER']) &&
    ($_SERVER['PHP_AUTH_PW']))
{
    echo "welcome User:" .htmlspecialchars($_SERVER['PHP_AUTH_USER']) ;
    echo "<p><a href='welcome.php'>click here welcome</a></p>";
}
else
{
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    die("hãy nhập thông tin user");
}

?>