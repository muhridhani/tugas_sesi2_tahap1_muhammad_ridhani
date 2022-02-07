<?php

    session_start();
    $_SESSION['judul']='Login | Sistem Informasi Poliklinik';
    include ("header.php");
    
    // cek cookie
    if( isset($_COOKIE['id']) && isset($_COOKIE['key']) && isset($_SESSION["token"])  ) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];
        $role = $_COOKIE['role']; 
        $_SESSION["role"] = $role;

        // ambil username berdasarkan id
        if($role == 'Pasien'){
            $result = mysqli_query ($conn, "SELECT nik FROM tb_pasein WHERE id_pasien = '$id'");
        }else if($role == 'Dokter'){
            $result = mysqli_query($conn, "SELECT nik FROM tb_dokter WHERE id_dokter = '$id'");
        }
        $row = mysqli_fetch_assoc($result);
        
        // cek cookie dan username
        if( $key === hash('sha256', $row['nik']) ) {
            $_SESSION['user'] = true;
        }
    }

    if( isset($_SESSION["user"]) ) {
        echo "<script>window.location='".base_url('index.php')."';</script>";
        exit;
    }

    // login
    if( isset($_POST["login"]) ) {
        $role = $_POST['role'];
        $nik = $_POST["nik"];
        $password = $_POST["password"]; 
        
        if($role == 'Pasien'){
            $result = mysqli_query($conn, "SELECT * FROM tb_pasein WHERE nik = '$nik'");
        }else{
            $result = mysqli_query($conn, "SELECT * FROM tb_dokter WHERE nik = '$nik'");
        }

        // cek username
        if( mysqli_num_rows($result) === 1 ) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            
            if(password_verify($password, $row["password"]) ) {

                // set session
                $_SESSION ["user"] = true;

                // cek remember me
                if(isset($_POST['remember']) ) {
                    //buat cookie
                    if($role == 'Pasien'){
                        setcookie('id', $row['id_pasien'], time()+3600);
                    }else{
                        setcookie('id', $row['id_dokter'], time()+3600);
                    }
                    
                    setcookie('key', hash('sha256', $row['nik']),time () +36600) ;
                }

                setcookie('role', $role, time()+36600) ;
                $_SESSION["role"] = $role;

                if($role == 'Pasien'){
                    $_SESSION["token"] = $row['id_pasien'];
                }else{
                    $_SESSION["token"] = $row['id_dokter'];
                }
                
                // echo $_SESSION['token'];
                
                echo "<script>window.location='".base_url('index.php')."';</script>";
                exit;
            }
        }
        
        $error = true;
    }
?>

        <div class="container1">
            <div class="login">
                
                <center>
                    <nav>
                        <a class="active btn" href="#"><h3  >LOGIN</h3></a>
                        <a class="btn" href="register.php"><h3  >REGISTER</h3></a>
                    </nav>
                    <hr>
                </center>

                <!-- login -->
                <div id="bg_login" class="">
                    <form action="" method="post" id="bg_login">
                        <div class="form">
                            
                            <div class="input">
                                <i class="fas fa-user-nurse icon"></i>
                                <select id="" class="field" name="role">
                                    <option value="Dokter">Dokter</option>
                                    <option value="Pasien">Pasien</option>
                                </select>
                            </div>
                            <div class="input">
                                <i class="fa fa-user icon"></i>
                                <input class="field" type="text" placeholder="NIK" name="nik" required>
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