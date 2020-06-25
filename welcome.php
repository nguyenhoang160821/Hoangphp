<?php
require_once 'Login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn->connect_errno) die("kết nối thất bại");

$query = "SELECT * FROM users";
$result = $conn->query($query);
if(!$result) die("kết nội thất bại");

$rows = $result->num_rows;

for ($j=0 ; $j < $rows ; ++$j)
{
    $rows = $result->fetch_array(MYSQLI_ASSOC);
    echo 'Hello:' .$rows['name']  .'<br>';
    echo 'email:' .$rows['email']  .'<br>';
    echo 'title:' .$rows['title']  .'<br>';
}
$result->close();
$conn->close();
?>
