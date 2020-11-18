<?php
    if(isset($_POST['signup-submit'])){
        require 'dbh.inc.php';

        $username = $_POST['uid'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-repeat'];

        // when all four blanks are empty
        if(empty($username)||empty($email)||empty($password)||empty($passwordRepeat)){ 
            header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
            exit(); // 아래 코드 실행 안됨.
        } 

        // when email and username are invalid
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../signup.php?error=invalidmailuid");
            exit(); 
        }

        // when email is invalid and username is valid
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // filter a var. 
            //first param: var you want to filter(something like reg exp)
            //second param: will check automatically this var is valid or not.
            header("Location: ../signup.php?error=invalidmail&uid=".$username);
            //url 통해서 에러메세지 날림.
            exit(); 
        }

        // when username is invalid and email is valid
        else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){ 
            header("Location: ../signup.php?error=invaliduid&mail=".$email);
            exit(); 
        }
        
        // when pwds are not matched. username and email are valid.
        else if($password !== $passwordRepeat){
            header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
            exit(); 
        }

        //username shouldn't be the same as the one already in db
        // prepared statments: sql injection 대비해서 사용.
        else{
            $sql = "select uidUsers from users where uidUsers=?";
            $stmt = mysqli_stmt_init($conn); // initialize a stmt and
            // return a object for use with mysqli_init_prepare
            if(!mysqli_stmt_prepare($stmt, $sql)){// Prepare an SQL statement for execution
                // Prepares the SQL query pointed to by the null-terminated string query.
                header("Location: ../signup.php?error=sqlerror");
                exit();
            }

            else{
                mysqli_stmt_bind_param($stmt, "s", $username); 
                // String = s, Integer = i, Boolean = b, Double = d
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt); 
                if($resultCheck > 0){
                    header("Location: ../signup.php?error=usertaken&mail=".$email);
                    exit();
                }

                //if username is new, insert into db
                else{
                    $sql= "insert into users (uidUsers, emailUsers, pwdUsers) values (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    }
                    else{
                        // creates a new password hash using a strong one-way hashing algorithm.
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                         
                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../signup.php?signup=success");
                        exit();
                    }
                }

            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
    else{
        header("Location: ../signup.php");
        exit();
    }

?>