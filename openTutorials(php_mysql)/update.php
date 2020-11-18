<?php
$conn = mysqli_connect("localhost", "root", "1234", "opentutotials");
$sql = 'select * from topic';
$result = mysqli_query($conn, $sql);

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

$article = array( // associative array
    'title' => 'Welcome',
    'description' => 'Hello'
);

$update_link = '';
if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']); 
    //사용자 입력값 불신해야지. 보안. 사용자가 url주소 통해서 id값을 지멋대로 쿼리문써서 데이터 망치면 우째
    $sql = "select * from topic where id = {$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);

    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
}

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
    <form action="process_update.php" method="post">
        <input type="hidden" name = "id" value = "<?=$_GET['id']?>">
        <p><input type="text" name="title" placeholder="title" 
            value = "<?=$article['title']?>"></p>
        <p>
            <textarea name="description" placeholder="description"><?=$article['description']?></textarea>
        </p>
        <p><input type="submit"></p>
    </form>
    
</body>
</html>