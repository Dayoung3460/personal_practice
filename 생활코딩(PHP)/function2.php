<!Doctype html>
<html>
    <body>
        <h1>Function</h1>
        <h2>Basic</h2>
        <?php
            function basic(){
                print("loremddddddddddddddddddddddddddddddddddddddddddddd<br>");
                print('loremddddddhhhhhhhhhhhhhddddddddddddddddddddddddd<br>');
            }

            basic();
            basic();
        ?>
        <h2>param &amp; argument</h2>
        <?php
        function sum($left, $right){
            print($left + $right);
            print('<br>');
        }
            sum(2,4);
            sum(4, 6);
        ?>
        <h2>return</h2>
        <?php
        function sum2($left, $right){
            return $left + $right;
        }
        print(sum2(2, 4));
        
        ?>

    </body>
</html>