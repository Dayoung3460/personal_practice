<?php
$conn = mysqli_connect("localhost", "root", "1234", "opentutotials");
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>WEB</title>
</head>

<body>
    <h1><a href="index.php">WEB</a></h1>
    <a href="index.php">Topic</a>
    <br><br>

    <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>profile</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        $sql = 'select * from author';
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            // cross site scripting 막기위해.           
            $filtered = array(
                'id' => htmlspecialchars($row['id']),
                'name' => htmlspecialchars($row['name']),
                'profile' => htmlspecialchars($row['profile'])
            )
        ?>
            <tr>
                <td><?= $filtered['id'] ?></td>
                <td><?= $filtered['name'] ?></td>
                <td><?= $filtered['profile'] ?></td>
                <td><a href="author.php?id=<?= $filtered['id'] ?>">Update</a></td>
                <td>
                    <form action="process_delete_author.php" method="post" onsubmit="if(!confirm('Are you sure to delete it?')){
                                        return false;}">
                        <input type="hidden" name="id" value="<?= $filtered['id'] ?>">
                        <input type="submit" value="delete">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <?php
    $escaped = array(
        'name' => '',
        'profile' => ''
    );

    $label_submit = "Create author";
    $form_action = "process_create_author.php";
    $form_id = '';

    if (isset($_GET['id'])) {
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        settype($filtered_id, 'integer');
        $sql = "select * from author where id = {$filtered_id}";
        //이 구문은 왜 동적으로 id가 바뀌지 않니 응?
        // $sql = "select * from author where id = {$filtered['id']}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $escaped['name'] = htmlspecialchars($row['name']);
        $escaped['profile'] = htmlspecialchars($row['profile']);
        $label_submit = "Update author";
        $form_action = "process_update_author.php";
        $form_id =
            '<input type = "hidden" name = "id" value = "' . $_GET['id'] . '">';
    }

    ?>

    <form action="<?= $form_action ?>" method="post">
        <?= $form_id ?>
        <p><input type="text" name="name" placeholder="name" value="<?= $escaped['name'] ?>"></p>
        <p><textarea name="profile" placeholder="profile"><?= $escaped['profile'] ?></textarea></p>
        <p><input type="submit" value="<?= $label_submit ?>"></p>
    </form>

</body>

</html>