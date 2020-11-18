<?php
// var_dump($_POST); data가 잘 전송됐는지 확인.

$conn = mysqli_connect("localhost", "root", "1234", "opentutotials");

//사용자 입력값을 필터링. 보안문제.
//'따옴표를 명령문으로 인식하는 것이 아니고 문자로 인식하도록 함. 
// '따옴표앞에 /슬래쉬 강제로 붙임.
$filtered = array(
    'title' => mysqli_real_escape_string($conn, $_POST['title']),
    'description' => mysqli_real_escape_string($conn, $_POST['description']),
    'author_id' => mysqli_real_escape_string($conn, $_POST['author_id'])
);

$sql = "insert into topic (title, description, created, author_id)
        values(
            '{$filtered['title']}',
            '{$filtered['description']}',
            NOW(),
            {$filtered['author_id']}
            )
        ";

 //die($sql); //$sql 출력하고 아래 구문은 실행 안됨. 유다이.


$result = mysqli_query($conn, $sql);
if($result === false){
    // mysqli_error($conn);
    echo "error in saving data. Talk to admin.";
    error_log(mysqli_error($conn));// 아파치 로그에 에러가 저장됨.
} else{
    echo 'succeeded. <br><a href="index.php">back</a>';
}

// echo $sql;

?>