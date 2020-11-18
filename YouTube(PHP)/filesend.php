<?php
session_start();
echo $_SESSION["sess_id"];
?>

<form id="frm" name="frm" method="post" action="filesave.php" enctype="multipart/form-data">
    <input type="file" name="file1" value="">
    <br>
    <input type="file"  name='file2' value="">
    <br>
    <button onclick="javascript:document.frm.submit();">send</button>
</form>