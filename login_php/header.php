<!doctype html>
<html>
    <head>
        <meta charset = "utf-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1">
        <title>login System</title>
    </head>
    <body>
        <header>
            <nav>
                <a href="#">
                    <img src="" alt="logo">
                </a>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Profile</a></li>
                    <li><a href="">About me</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
                <div>
                    <form action="includes/login.inc.php" method="post">
                        <input type="text" name="mailuid" placeholder="Username/E-mail...">
                        <input type="password" name="pwd" placeholder="Password...">
                        <button type="submit" name="login-submit">Login</button>
                    </form>
                    <a href="signup.php">Signup</a>
                    <form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logout-submit">Logout</button>
                    </form>
                </div>
            </nav>

        </header>
    </body>
</html>