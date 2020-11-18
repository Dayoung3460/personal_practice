<?php
$conn = mysqli_connect("localhost", "root", "1234", "opentutotials");
$sql = 'select * from topic';
$result = mysqli_query($conn, $sql);

$list = '';
while ($row = mysqli_fetch_array($result)) {
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

//WEB을 클릭했을 때(id가 없을 때): 업데이트 버튼ㄴㄴ, 삭제 버튼ㄴㄴ, 저자ㄴㄴ.
$update_link = '';
$delete_link = '';
$author = '';

//id가 있을 때
if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    //사용자 입력값 불신해야지. 보안. 사용자가 url주소 통해서 id값을 지멋대로 쿼리문써서 데이터 망치면 우째
    $sql = "select * from topic left join author on topic.author_id = author.id
             where topic.id = {$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $article['name'] = htmlspecialchars($row['name']);

    $update_link = '<a href="update.php?id=' . $_GET['id'] . '">update</a>';
    //delete는 다른 페이지로 가지않고 바로 process_delete.php통해서 삭제할거.
    //delete하는 id가 사용자한테 url로 노출되면 위험하니까 정보 보낼때 post로 보내야함
    // 그래서 form테그 써서 보냄 이거 안하고 그냥 보내면 디폴트 get임.
    $delete_link = '
        <form action="process_delete.php" method="post">
            <input type="hidden" name="id" value="' . $_GET['id'] . '">
            <input type="submit" value="delete">
        </form>
    ';
    $author = "<br><br> by {$article['name']}";
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
    <a href="author.php">author</a>
    <ol>
        <?= $list ?>
    </ol>

    <a href="create.php">create</a>
    <?= $update_link ?>
    <?= $delete_link ?>

    <h2>
        <?= $article['title'] ?>
    </h2>

    <?= $article['description'] ?>
    <?= $author ?>
</body>

</html>