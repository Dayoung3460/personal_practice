<?php
echo "first file: ";
echo "<br><br>";
echo "name - " . $_FILES['file1']['name'];
echo ", type - " . $_FILES['file1']['type'];
echo ", size - " . $_FILES['file1']['size'];
echo ", tempName - " . $_FILES['file1']['tmp_name'];
echo ", error - " . $_FILES['file1']['error'];

echo "<br><br>";

echo "second file: ";
echo "<br><br>";
echo "name - " . $_FILES['file2']['name'];
echo ", type - " . $_FILES['file2']['type'];
echo ", size - " . $_FILES['file2']['size'];
echo ", tempName - " . $_FILES['file2']['tmp_name'];
echo ", error - " . $_FILES['file2']['error'];
?>