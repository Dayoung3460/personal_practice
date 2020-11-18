<div id="id01" class="login">
    <form action="process_logout.php" method="post" class="login-content animate">
        <div class="imgcontainer">
            <span><a class="close" onclick="closeLogin()">x</a></span>
            <img src="./image/person.jpg" alt="Avatar" class="avatar" ></img>
        </div>
        <div class="container">
            <!-- <p><?=$_GET['uidname']?></p> -->
            <p>Are you sure to log out?</p>
            <button class="loginbtn" type="submit" name="logout-submit">Logout</button>
        </div>
    </form>
</div>