<?php

    session_start();
    $_SESSION['judul']='Login Admin | Sistem Informasi Poliklinik';
    include ("header.php");

    // cek cookie
    if( isset($_COOKIE['id1']) && isset($_COOKIE['key1']) ) {
        $id = $_COOKIE['id1'];
        $key = $_COOKIE['key1']; 

        // ambil username berdasarkan id
        $result = mysqli_query ($conn, "SELECT username FROM tb_admin WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
        
        // cek cookie dan username
        if( $key === hash('sha256', $row['username']) ) {
            $_SESSION['admin'] = true;
        }
    }

    if( isset($_SESSION["admin"]) ) {
        echo "<script>window.location='".base_url('admin/index.php')."';</script>";
        exit;
    }

    // login
    if( isset($_POST["login"]) ) {
        $username = $_POST["username"];
        $password = $_POST["password"]; 
        $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");

        // cek username
        if( mysqli_num_rows($result) === 1 ) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            
            if(password_verify($password, $row["password"]) ) {

                // set session
                $_SESSION ["admin"] = true;
                $_SESSION ["role"] = 'admin';

                // cek remember me
                if(isset($_POST['remember']) ) {
                    //buat cookie
                    setcookie('id1', $row['id'], time()+3600);
                    setcookie('key1', hash('sha256', $row['username']),time () +36600) ;
                }
                $_SESSION["token"] = $row['id'];
                echo "<script>window.location='".base_url('admin/index.php')."';</script>";
                exit;
            }
        }
        
        $error = true;
    }
    
?>
        <div class="header">
            <h1>SIP</h1>
            <h3>Sistem Informasi Poliklinik</h3>
        </div>

        <div class="container1">
            <div class="login">
                
                <center>
                    <h1>LOGIN ADMIN</h1>
                    <hr>
                </center>

                <!-- login -->
                <div id="bg_login" class="">
                    <form action="" method="post" id="bg_login">
                        <div class="form">
                            <div class="input">
                                <i class="fa fa-user icon"></i>
                                <input class="field" type="text" placeholder="Username" name="username" required>
                            </div>
                            <div class="input">
                                <i class="fa fa-key icon"></i>
                                <input class="field" type="password" placeholder="Password" name="password" required>
                            </div>
                            <p><input type="checkbox" name="remember"> Remember me</p>
                            <br>
    
                            <!-- jika terdapat kesalahan login -->
                            <?php if( isset($error) ) : ?>
                                <div class="salah">
                                    <i class="fas fa-exclamation-circle"></i> username / password salah
                                </div>
                            <?php endif; ?>
    
                            <center>
                                <button type="submit" name="login" class="msk">Login</button>
                            </center>
                        </div>
                    </form>
                </div>

                
            </div>
        </div>
    </body>
</html>