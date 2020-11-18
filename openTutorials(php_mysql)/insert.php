<?php
$conn = mysqli_connect("localhost", "root", "1234", "opentutotials");
$sql = "insert into topic (title, description, created) values (
    'MySQL',
    'MySQL is..',
    NOW()
    )";

$sql2 = "insert into topic (title, description, created) values (
    'MySQL2',
    'MySQL2 is..',
    NOW()
    )";

$result = mysqli_query($conn, $sql2); // 쿼리 작동잘 되면 트루 리턴함.
if($result === false){
    echo mysqli_error($conn);
}
