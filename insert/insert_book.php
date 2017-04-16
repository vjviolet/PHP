<html>
<head>
    <meta charset="utf-8">
    <title>Book-o-rama Book entry results</title>
</head>
<body>
<h1>Book-o-rama Book entry results</h1>
<?php
//create short variable names
//获取表单中的各个值
$isbn = $_POST['isbn'];
$author = $_POST['author'];
$title = $_POST['title'];
$price = $_POST['price'];

if(!$isbn || !$author || !$title || !$price) {
    echo "You have not entered all the required details, </br>";
}

//检查返回后的结果
if(!get_magic_quotes_gpc()) {
    $isbn = addslashes($isbn);
    $author = addslashes($author);
    $title = addslashes($title);
    $price = doubleval($price);
}

//连接服务器
@ $db = new mysqli('localhost', 'doctor', 'doctorpan','books');
if(mysqli_connect_errno()) {
    echo "Error: Could not connect to database";
    exit;
}

$query = "insert into books values
            ('".$isbn."', '".$author."', '".$title."', '".$price."')";


$result = $db->query($query);


if($result) {
    echo $db->affected_rows." book inserted into database.";
} else {
    echo "Failed to insert!";
}
//关闭数据库
$db->close();

?>
</body>
</html>