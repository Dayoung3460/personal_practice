<?php
// var_dump($_POST); data가 잘 전송됐는지 확인.

$conn = mysqli_connect("localhost", "root", "1234", "opentutotials");

//사용자 입력값을 필터링. 보안문제.
settype($_POST['id'], 'integer');
$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'name' => mysqli_real_escape_string($conn, $_POST['name']),
    'profile' => mysqli_real_escape_string($conn, $_POST['profile'])
);

$sql = "update author 
        set 
            name = '{$filtered['name']}',
            profile = '{$filtered['profile']}'
        where
            id = {$filtered['id']}
        ";

// die($sql); //이 아래 구문은 실행 안됨. 다이.  sql쿼리문 잘 됐는지 확인할려고.


$result = mysqli_query($conn, $sql);
if($result === false){
    // mysqli_error($conn);
    echo "error in saving data. Talk to admin.";
    error_log(mysqli_error($conn));// 아파치 로그에 에러가 저장됨.
} else{
    header('Location: author.php?id='.$filtered['id']);
    // echo 'succeeded. <br><a href="author.php">back</a>';
}

// echo $sql;

?>