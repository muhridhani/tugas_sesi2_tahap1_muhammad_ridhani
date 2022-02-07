<?php
    // dapatkan url
    function base_url($url = null){
        $base_url = "http://localhost:8080/sipo";
        if($url != null) {
            return $base_url."/".$url;
        } else {
            return $base_url;
        }
    }

    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "poliklinik");
    
    // function query
    function query($query){
        global $conn;

        // ambil data dari tabel mahasiswa / query data mahasiswa
        $result = mysqli_query($conn, $query);
        $rows = [];
        
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        
        return $rows;

    }

    // genered uuid
    function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    // register
    function registrasi($data){
        global $conn;
        
        $nik = strtolower(stripslashes($data["nik"]));
        $nama = strtolower(stripslashes($data["nama"]));
        $jenis = strtolower(stripslashes($data["jenis"]));
        $password = mysqli_real_escape_string($conn, $data["password"]); 
        $password_confirm = mysqli_real_escape_string($conn, $data["password_confirm"]); 

        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT nik FROM tb_pasein WHERE nik = '$nik'");
        if( mysqli_fetch_assoc ($result) ) {
            echo "<script>
                    popup.alert(
                        {content : '<center>Nik sudah terdaftar!</center>'},
                        function(param){
                            if(param.proceed){
                                window.location = '" . base_url('auth/register.php') . "';
                            }
                        }
                    );
                </script>";
            return false;
        }

        // cek konfirmasi password
        if( $password !== $password_confirm ) {
            echo "<script>
                    popup.alert(
                        {content : '<center>Password tidak sama!</center>'},
                        function(param){
                            if(param.proceed){
                                window.location = '" . base_url('auth/register.php') . "';
                            }
                        }
                    );
                </script>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $uuid = gen_uuid();
        // tambahkan userbaru ke database
        mysqli_query($conn, "INSERT INTO tb_pasein VALUES ('$uuid', '$nik', '$nama', NULL, '$jenis', '$password')");
        return mysqli_affected_rows ($conn);
    }

    // Ubad data diri

    function ubahDataDiri($data){
        global $conn;

        $id = $data["id"];
        $role = $data["role"];
        $nik = htmlspecialchars($data["nik"]);
        $nama = htmlspecialchars($data["nama"]);
        $jenis = htmlspecialchars($data["jenis"]);
        $alamat = htmlspecialchars($data ["alamat"]);

        if($role == 'Dokter'){
            $query = "UPDATE tb_dokter SET nik='$nik', nama='$nama', jenis_kelamin='$jenis', alamat='$alamat' WHERE id_dokter='$id'";
        }else{
            $query = "UPDATE tb_pasein SET nik='$nik', nama='$nama', jenis_kelamin='$jenis', alamat='$alamat' WHERE id_pasien='$id'";
        }
        
        mysqli_query ($conn, $query);

        return mysqli_affected_rows($conn);
    }

    // ganti password
    function ubahPassword($data){

        global $conn;

        $id = $data["id"];
        $role = $data["role"];
        $password = htmlspecialchars($data["password"]);
        $password_confirm = htmlspecialchars($data ["password_confirm"]);

        // cek konfirmasi password
        if( $password !== $password_confirm ) {
            return false;
        }
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        if($role == 'Dokter'){
            $query = "UPDATE tb_dokter SET password='$password' WHERE id_dokter='$id'";
        }else if($role == 'Admin'){
            $query = "UPDATE tb_admin SET password='$password' WHERE id='$id'";
        }else{
            $query = "UPDATE tb_pasein SET password='$password' WHERE id_pasien='$id'";
        }
    
        
        mysqli_query ($conn, $query);
        return mysqli_affected_rows($conn);
    }

    // tambah data dokter
    function tambahDataDokter($data){
        global $conn;
        
        $nik = stripslashes($data["nik"]);
        $nama = stripslashes($data["nama"]);
        $alamat = stripslashes($data["alamat"]);
        $jenis = stripslashes($data["jenis"]);
        $password = mysqli_real_escape_string($conn, $data["password"]);

        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT nik FROM tb_dokter WHERE nik = '$nik'");
        if( mysqli_fetch_assoc ($result) ) {
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $uuid = gen_uuid();
        // tambahkan userbaru ke database
        mysqli_query($conn, "INSERT INTO tb_dokter VALUES ('$uuid', '$nik', '$nama', NULL, '$jenis', '$password')");
        return mysqli_affected_rows ($conn);
    }

    // tambah data dokter
    function tambahDataPasien($data){
        global $conn;
        
        $nik = stripslashes($data["nik"]);
        $nama = stripslashes($data["nama"]);
        $alamat = stripslashes($data["alamat"]);
        $jenis = stripslashes($data["jenis"]);
        $password = mysqli_real_escape_string($conn, $data["password"]);

        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT nik FROM tb_pasein WHERE nik = '$nik'");
        if( mysqli_fetch_assoc ($result) ) {
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $uuid = gen_uuid();
        // tambahkan userbaru ke database
        mysqli_query($conn, "INSERT INTO tb_pasein VALUES ('$uuid', '$nik', '$nama', '$alamat', '$jenis', '$password')");
        return mysqli_affected_rows ($conn);
    }

    // tambah data obat
    function tambahDataObat($data){
        global $conn;
        
        $nama = stripslashes($data["nama"]);
        $ket = stripslashes($data["ket"]);
        $harga = stripslashes($data["harga"]);
        $stok = stripslashes($data["stok"]);

        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT nama_obat FROM tb_obat WHERE nama_obat = '$nama'");
        if( mysqli_fetch_assoc ($result) ) {
            return false;
        }

        $uuid = gen_uuid();
        // tambahkan userbaru ke database
        mysqli_query($conn, "INSERT INTO tb_obat VALUES ('$uuid', '$nama', '$ket', '$harga', '$stok')");
        return mysqli_affected_rows ($conn);
    }

    //obah data obat
    function ubahDataObat($data){
        global $conn;

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $keterangan = htmlspecialchars($data["ket"]);
        $harga = htmlspecialchars($data["harga"]);
        $stok = htmlspecialchars($data ["stok"]);

        $query = "UPDATE tb_obat SET nama_obat='$nama', keterangan='$keterangan', harga='$harga', stok='$stok' WHERE id_obat='$id'";
        
        mysqli_query ($conn, $query);

        return mysqli_affected_rows($conn);
    }

    // tambah rekap medis
    function tambahRekapMedis($data){
        global $conn;

        $pasien = $data["pasien"];
        $dokterr = $data["id_dokter"];
        $keluahan = htmlspecialchars($data["keluahan"]);
        $diagnosa = htmlspecialchars($data["diagnosa"]);
        $tanggal = $data ["tanggal"];

        $obats = $_POST['obat'];
        $uuid = gen_uuid();


        mysqli_query($conn, "INSERT INTO tb_rekammedis VALUES ('$uuid', '$pasien', '$dokterr', '$keluahan', '$diagnosa', '$tanggal')");
        foreach ($obats as $ob) {
            mysqli_query($conn, "INSERT INTO tb_obat_rm VALUES ('', '$uuid', '$ob')");
        }

        
        $rm_obat = query("SELECT  * FROM tb_obat_rm WHERE id_rm = '$uuid'");
        $biyaya = 0;
        foreach($rm_obat as $obat){
            $idobat = $obat['id_obat'];
            $harga = query("SELECT * FROM tb_obat WHERE id_obat = '$idobat'");
            $biyaya += (int)$harga[0]['harga'];
        }
        $biyaya = (string)$biyaya;

        mysqli_query($conn, "INSERT INTO tb_pembayaran VALUES ('', '$uuid', '$biyaya', 'Belum dibayar')");
        return mysqli_affected_rows ($conn);
    }

    function bayar($data){
        global $conn;

        $id = $data["id"];
        $uangnya = $data["uangnya"];

        $rm_obat = query("SELECT  * FROM tb_pembayaran WHERE id_rm = '$id'");
        $harga = $rm_obat[0]['harga'];

        // return $harga;

        if((int)$harga > (int)$uangnya){
            return 0;
            exit;
        }
        $kembalian = $uangnya -$harga;

        $query = "UPDATE tb_pembayaran SET penbayaran='$uangnya', kembalian='$kembalian', status='Sudah Dibayar' WHERE id_rm='$id'";
        
        mysqli_query ($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>