<?php 
    unlink('data/'.basename($_POST['id']));
    //사용자가 글 삭제할 때 이상한거 못 삭제하도록 파일명만 추출.
    header('Location: ./index.php'); 
?>