<?php
$conn = mysqli_connect("localhost", "root", "1234", "opentutotials");
$sql = 'select * from topic';
$result = mysqli_query($conn, $sql);

$list = '';
while($row = mysqli_fetch_array($result)){
    // 사용자가 입력한 값이 순수한 html 문자열이여야하기 때문에.
    //고것이 바로 htmlspecialchars().
    //만약 사용자가 title에 엉뚱한 자바스크립트(<script></script>) 코드 넣으면 어캐
    $escape_title = htmlspecialchars($row['title']);
    $list .= 
        "<li><a href=\"index.php?id={$row['id']}\">
                    {$escape_title} 
                </a></li>";
    //<li><a href="index.php?id=19">MySQL</a></li>
    // php문법으로 반환되는 값을 넣을 때 {}중괄호 안에 넣음
    // .= means +=
};

$sql = "select * from author";
$result = mysqli_query($conn, $sql);
$select_form = '<select name = "author_id">';
while($row = mysqli_fetch_array($result)){
    //서버에 저자 id값을 넘겨줌.
    $select_form .= '<option value = "'.$row['id'].'">'.$row['name'].'</option>';
}
$select_form .= '</select>';

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>WEB</title>
</head>
<body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
        <?=$list?>
    </ol>
    <form action="process_create.php" method="post">
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="description" placeholder="description"></textarea></p>
        <?=$select_form?>
        <p><input type="submit"></p>
    </form>
    
</body>
</html>