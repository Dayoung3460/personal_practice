
<?php

require_once 'header.php';

?>
            <!--================================main container ==================================-->

            <div class="main-container" id="myMain">
                <div class="main-top">
                    <div class="main-top2">
                        <button class="mainTop-btn">All</button>
                        <button class="mainTop-btn">Notice</button>
                    </div>
                    <div class="main-top2">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="Search here!:)">
                            <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i></button>
                        </div>

                        <!-- *********************** write popup page *******************-->

                        <button class="mainTop-btn" onclick="openWrite()">Write</button>


                        <?php
                            require_once 'dbconn.php';
                            $sql = "select * from subject";
                            $result = mysqli_query($conn, $sql);
                            $select_form = '<select name = "subject_id">';
                            while($row = mysqli_fetch_array($result)){
                                $select_form .= '<option value = "'.$row['category'].'">'.$row['category'].'</option>';
                            }
                            $select_form .= '</select>';
                        ?>
                            <div id="write" class="write">
                                <form action="process_write.php" method="post" class="write-content animate"
                                    onsubmit = "if(!confirm('Are you sure to create this?')){return false;}">
                                    <div class="writeContainer">
                                        <span><a class="close" onclick="closeWrite()">x</a></span>
                                        <img src="./image/writeBG.jpg" alt="writeImg" class="writeImg"></img>
                                        <p>Share your thoughts</p>
                                    </div>
                                    <div class="container">
                                        
                                        <label for="title"><b>Title</b></label>
                                        <?=$select_form?>
                                        <input type="text" name="title" required placeholder="Title here"></input>
                                        <br>
                                        <label for="content"><b>Content</b></label>
                                        <textarea type="textarea" name="content" class="content" required> </textarea>
                                        <br>
                                        <label for="image"><b>Attach Image</b></label>
                                        <br>
                                        <input type="file" name="contentImg" class="inputImg">
                                            <div class="write_imgcontainer">
                                                <img class="write_uploadImg" src="" alt="" width="100%" height="auto">
                                            </div>         
                                        </input>
                                        
                                        <button class="writeBtn" type="submit">Post</button>
                                    </div>
                                </form>
                            </div> 
                    </div>
                </div>





                


                <?php 
                    include 'dbconn.php';
                    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5000;
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $limit;
                    $result = $conn->query("SELECT * FROM customers LIMIT $start, $limit");
                    $customers = $result->fetch_all(MYSQLI_ASSOC);

                    $result1 = $conn->query("SELECT count(id) AS id FROM customers");
                    $custCount = $result1->fetch_all(MYSQLI_ASSOC);
                    $total = $custCount[0]['id'];
                    $pages = ceil( $total / $limit );

                    $Previous = $page - 1;
                    $Next = $page + 1;

                ?>



           








                <table>
                    <thead>
                      <tr>
                        <th scope="col" class="col-no">No</th>
                        <th scope="col" class="col-category">Category</th>
                        <th scope="col" class="col-title">Title</th>
                        <th scope="col" class="col-writer">Writer</th>
                        <th scope="col" class="col-date">Date</th>
                        <th scope="col" class="col-views">Views</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php

                        $sql = 'select * from board';
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            $filtered = array(
                                'id' => htmlspecialchars($row['id']),
                                'category' => htmlspecialchars($row['category']),
                                'title' => htmlspecialchars($row['title']),
                                'content' => htmlspecialchars($row['content']),
                                'writer' => htmlspecialchars($row['writer']),
                                'date' => htmlspecialchars($row['date']),
                                'view' => htmlspecialchars($row['view'])
                            )
                    ?>

                    <tr>
                        <th scope="row"><?=$filtered['id']?></th>
                        <td><?=$filtered['category']?></td>
                        <td class="tbl-title">
                            <a href="detail_page.php?id=<?=$filtered['id']?>"><?=$filtered['title']?></a>
                        </td>
                        <td class="tbl-writer"><?=$filtered['writer']?></td>
                        <td><?=$filtered['date']?></td>
                        <td><?=$filtered['view']?></td>
                    </tr>

                    <?php
                        }
                    ?>
                      
                    </tbody>
                </table>
                <div class="pagination" id="pagination">
                    <a href="index.php?page=<?= $Previous; ?>">&laquo;</a>
                    <a href="#" class="activePage">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">&raquo;</a>
                </div>

                  
            </div>

        
<?php

require_once 'footer.php';
?>