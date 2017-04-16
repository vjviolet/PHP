<html>
<head>
    <meta charset="utf-8">
    <title>Book-o-rama Search Results</title>
</head>
<body>
<?php
//create short variable names
$searchtype = $_POST['searchtype'];
$searchterm = trim($_POST['searchterm']);
//trim()删除字符串后面多余的空格
//check the value of the variables
if(!$searchterm||!$searchtype) {
    echo "You have not entered search details";
    exit;
}
//判断格式是否正确
if(!get_magic_quotes_gpc()) {
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
}

@ $db = new mysqli("localhost", "doctor", "doctorpan", "books");

if(mysqli_connect_errno()) {
    echo "Error: Could not connect to database.";
    exit;
}

//规范请求格式
$query = "select * from books where ".$searchtype." like '%".$searchterm."%'";
$result = $db->query($query);
if(!$result) { //判断所查询的结果是否为空
    echo "Error!";
} else {
    $num_results = $result->num_rows;
    echo "Number of the books found is: ".$num_results;
}

$db->close();

?>
</body>
</html>