<!Doctype html>
<html>
    <body>
        <h1>Cross site scriping</h1>
        <?php
        echo htmlspecialchars('<script>alert("bbb");</script>');
        ?>
    </body>
</html>