<?php
require_once 'header.php';
?>

                
                  <!--================================ detail(article) page ============================-->
                  <div class="main-container" id="myMain">
                    <?php
                        
                        

                        $article = array( 
                            'title' => '',
                            'content' => '',
                            'category' => ''
                        );

                        $update_link = '';
                        $delete_link = '';
                        $category = '';
                        
                        if(isset($_GET['id'])){

                            require_once 'dbconn.php';
                            $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
                            settype($filtered_id, 'integer');
                            $sql = "select * from board where id = {$filtered_id}";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($result);

                            $article['title'] = htmlspecialchars($row['title']);
                            $article['content'] = htmlspecialchars($row['content']);
                            $article['category'] = htmlspecialchars($row['category']);

                            $update_link = '<a href="update.php?id=' . $_GET['id'] . '">Update</a>';
                            $delete_link = '
                                <form action="process_delete.php" method="post" onsubmit="if(!confirm(\'Are you sure to delete it?\')){return false;}">
                                    <input type="hidden" name="id" value="' . $_GET['id'] . '">
                                    <input type="submit" value="Delete">
                                </form>
                            ';
                            $category = "{$article['category']}";
                        }
                    ?>

                    <div class="detailPage" style="display: block;">
                        <div class="detailContainer">
                            <p id="dPageTxt">see what others think</p>
                        </div>
                        <div class="container" name="detailPageForm">
                            <div class="btnCon">
                                <?= $update_link ?>
                                <?= $delete_link ?>
                                <!-- <a href="index.php">Delete</a> -->
                            </div>
                            <label for="title"><b>Title</b></label>
                            <textarea class="title" readonly name="dPageTitle">
                                [<?= $category ?>] <?=$article['title']?>
                            </textarea>

                            <br>
                            <label for="content"><b>Content</b></label>
                            <textarea class="content" readonly name="dPageContent">
                                <?=$article['content']?>
                            </textarea>
                            <br>
                            <label for="image"><b>Image</b></label>
                            <div class="img"></div>
                            <br>
                            <button class="writeBtn">
                                <a href="index.php" style="text-decoration: none; color: var(--primary-color2); display: block;">Back</a>
                            </button>
                        </div>      
                    </div> 
                </div>

        <?php
        require_once 'footer.php';
        ?>