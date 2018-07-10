<?php
if(!(isset($_POST["name"]))){
echo "<html><body>\n<form action=\"test.php\" method=\"post\">";
echo "<BR>\nName: <input type=\"text\" name=\"name\"><br>";
echo "<BR/>\nE-mail: <input type=\"text\" name=\"email\"><br>";
echo "<BR/><input type=\"submit\"></form></body></html>";
}else{
$servername = "mysql";
$username = "web";
$password = "webPass";
$db = "student";
$name=$_POST["name"];
$email=$_POST["email"];
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$stmt=$conn->prepare("INSERT INTO students(studentName,email) VALUES(?,?);");
$stmt->bind_param("ss",$name,$email);
$stmt->execute();
  echo "<BR/>Insert Successful";
$conn->close();
}
?>
