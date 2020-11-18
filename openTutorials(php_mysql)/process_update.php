<?php
// var_dump($_POST); data가 잘 전송됐는지 확인.

$conn = mysqli_connect("localhost", "root", "1234", "opentutotials");

//사용자 입력값을 필터링. 보안문제.
settype($_POST['id'], 'integer');
$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'title' => mysqli_real_escape_string($conn, $_POST['title']),
    'description' => mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "update topic 
        set 
            title = '{$filtered['title']}',
            description = '{$filtered['description']}'
        where
            id = {$filtered['id']}
        ";

// die($sql); //이 아래 구문은 실행아 안됨. 다이.


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