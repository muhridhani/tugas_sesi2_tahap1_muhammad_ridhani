<?php
    session_start();
    $_SESSION['judul']='Register | Sistem Informasi Poliklinik';
    include ("header.php");


    if( isset($_POST["register"]) ) {
        if( registrasi($_POST) > 0 ) {
            echo "<script>
                    popup.alert(
                        {content : '<center>Data berhasil didaftarkan, silahkan login.</center>'},
                        function(param){
                            if(param.proceed){
                                window.location = '" . base_url('auth/login.php') . "';
                            }
                        }
                    );
                </script>";
        } else {
            echo mysqli_error ($conn);
        }
    }
?>

        <div class="container1">
            <div class="login">
                
                <center>
                    <nav>
                        <a class=" btn" href="login.php"><h3  >LOGIN</h3></a>
                        <a class="active btn" href="#"><h3  >REGISTER</h3></a>
                    </nav>
                    <hr>
                </center>

                <!-- register -->
                <div id="bg_register" class="">
                    <form action="" method="post">
                        <div class="form">
                            
                            <div class="input">
                                <i class="fas fa-id-card icon"></i>
                                <input class="field"  type="text" placeholder="NIK" name="nik" required>
                            </div>
                            <div class="input">
                                <i class="fa fa-user icon"></i>
                                <input class="field"  type="text" placeholder="Nama" name="nama" required>
                            </div>
                            <div class="input">
                                <i class="fas fa-venus-double icon"></i>
                                <select id="" class="field" name="jenis">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="input">
                                <i class="fa fa-key icon"></i>
                                <input class="field" type="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="input">
                                <i class="fa fa-key icon"></i>
                                <input class="field" type="password" placeholder="Confirm Password" name="password_confirm" required>
                            </div>
                            <br>
    
                            <!-- <div class="salah">
                                <i class="fas fa-exclamation-circle"></i> NIP/NIPK/NIM salah
                            </div> -->
    
                            <center>
                                <button type="submit" name="register" class="msk">Register</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    
    </body>
</html>