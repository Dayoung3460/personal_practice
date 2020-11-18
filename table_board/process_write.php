<?php

$conn = mysqli_connect("localhost", "root", "1234", "boardTable");
$filtered = array(
    'title' => mysqli_real_escape_string($conn, $_POST['title']),
    'content' => mysqli_real_escape_string($conn, $_POST['content']),
    'subject_id' => mysqli_real_escape_string($conn, $_POST['subject_id'])
    // 'contentImg' => mysqli_real_escape_string($conn, $_POST['contentImg'])
);

$sql = "insert into board (title, content, date, category)
        values(
            '{$filtered['title']}',
            '{$filtered['content']}',
            NOW(),
            '{$filtered['subject_id']}'
            )
        ";

 // die($sql);

$result = mysqli_query($conn, $sql);

if($result === false){
    echo "Failed to upload a post. Talk to admin.";
    error_log(mysqli_error($conn));
} else{
    header('Location: index.php');
}

?>