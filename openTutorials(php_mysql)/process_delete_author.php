<?php                        
// var_dump($_POST); data가 잘 전송됐는지 확인.

$conn = mysqli_connect("localhost", "root", "1234", "opentutotials");

// id는 므조건 정수
settype($_POST['id'], 'integer');

//사용자 입력값을 필터링. 보안문제.
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id'])
  );

$sql = "DELETE FROM topic WHERE author_id = {$filtered['id']}";
mysqli_query($conn, $sql); // 삭제할 저자의 글 지우는 쿼리문 실행.

$sql = "DELETE FROM author WHERE id = {$filtered['id']}";

// die($sql); //파라미터 출력하고 아래 구문은 실행 안됨. 다이.

$result = mysqli_query($conn, $sql);
if($result === false){
    // mysqli_error($conn);
    echo "error in saving data. Talk to admin.";
    print_r(mysqli_error($conn));// 아파치 로그에 에러가 저장됨.
} else{
    // echo 'succeeded deleting. <br><a href="author.php">back</a>';
    header('Location: author.php');
}

?>