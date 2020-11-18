<?php
$arr = array('Rob', 'Bob', 'Robery', 'Bobby', 'Paulson');
$assoc = array('Brad' => "Tyler", 'Ed' => 'narrator', 'Helena' => 'singer');
$assoc[] = 'Robert'; // $assoc의 네번째 값이 됨. 키값은 없으니 자동적으로 키값 0.

foreach($arr as $name){
    echo $name . "<br>";
}

echo '<br>';

foreach($arr as $key => $name){
    echo $key . ' - ' . $name . "<br>";
}

echo '<br>';

foreach($assoc as $key => $name){
    echo $key . ' - ' . $name . '<br>';
}
?>