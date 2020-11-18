<!Doctype html>
<html>
    <body>
        <h1>Array</h1>
        <?php
           $coworkers = array('egoing', 'leezche', 'duru', 'teago');
            echo $coworkers[1].'<br>';
            echo $coworkers[3].'<br>';
            var_dump(count($coworkers));
            array_push($coworkers, 'grap');
            var_dump($coworkers);
        ?>
    </body>
</html>