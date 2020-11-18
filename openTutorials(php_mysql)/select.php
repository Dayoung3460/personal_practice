<?php
$conn = mysqli_connect("localhost", "root", "1234", "opentutotials");


// *****************1 row ********************

$sql = "select * from topic where id = 18";


$result = mysqli_query($conn, $sql); //mysqli_result 라는 객체를 만듦.

// mysqli_fetch_array($result);

// var_dump($result->num_rows); //result(table topic)의 row 갯수 int로. 
$row = mysqli_fetch_array($result);
// print_r($row);
// echo $row['id'];
echo '<h1>'.$row['title'].'</h1>';
echo $row['description'];

//********************* */ all row **********************
$sql = "select * from topic";
$result = mysqli_query($conn, $sql);


while($row = mysqli_fetch_array($result)){ // 테이블의 첫번째 행이 $row에 대입되서
    //괄호 안 자체 값이됨. == 이게 아니잖아.
    // php에서는 while괄호 안이 null or false가 아닌 이상 다 참으로 침.
    //테이블 안의 행이 다 끝나면 mysqli_fetch_array($result)이 null이 됨.
    //그래서 while문 멈춤.
    echo '<h1>'.$row['title'].'</h1>'.'<br>';
    echo $row['description'];
}


?>

