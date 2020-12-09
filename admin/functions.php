<?php 

    // CONNECTIONS TO DATABASE
    $conn = mysqli_connect('localhost', 'root', '', 'absensi');
    
    // QUERY START
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }
    // QUERY END

    // TAMBAH USER START
    function tambah_user($data) {
        global $conn;

        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $foto = uploadFoto();        
        $status = $_POST['status'];
        $id_akses = $_POST['akses'];
        $id_department = $_POST['department'];
        $created_at = $_POST['created_at'];

        if( !$foto ) {
            return false;
        }

        $cekNip = mysqli_query($conn, "SELECT * FROM user WHERE nip = '$nip'");
        $cekEmail = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
        
        if(mysqli_fetch_assoc($cekNip)) {
            return false;
        }

        if (mysqli_fetch_assoc($cekEmail)) {
            return false;      
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user(
                                nip, 
                                nama, 
                                email, 
                                password, 
                                jenis_kelamin, 
                                alamat, 
                                no_telp, 
                                status, 
                                foto,
                                id_akses,
                                id_department,
                                created_at
                            ) VALUES(
                                '$nip', 
                                '$nama', 
                                '$email', 
                                '$password', 
                                '$jenis_kelamin', 
                                '$alamat', 
                                '$no_telp', 
                                '$status',
                                '$foto', 
                                $id_akses,
                                $id_department, 
                                '$created_at'
                            )";
        $tambah = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    // TAMBAH USER END

    // UBAH USER START
    function ubah_user($data) {
        global $conn;

        $id_user = $_POST['id_user'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $status = $_POST['status'];
        $photo = uploadFoto();
        $id_akses = $_POST['akses'];
        $id_department =$_POST['department'];
        $updated_at = $_POST['updated_at'];
        

        $query = "UPDATE user 
                    SET nip = '$nip', 
                        nama = '$nama', 
                        email = '$email', 
                        jenis_kelamin = '$jenis_kelamin', 
                        alamat = '$alamat', 
                        no_telp = '$no_telp', 
                        status = '$status',
                        foto = '$photo', 
                        id_akses = $id_akses,
                        id_department = $id_department,
                        updated_at = '$updated_at'
                    WHERE id_user = '$id_user'";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } 
    // UBAH USER END

    // HAPUS USER START
    function hapus_user($id) {
        global $conn;

        mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id'");
        return mysqli_affected_rows($conn);
    }
    // HAPUS user END

    // REGISTRASI START
    function registrasi($data) {
        global $conn;

        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $created_at = $_POST['created_at'];
        $akses = $_POST['akses'];
        $photo = uploadFoto();

        if( !$photo ) {
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO admin VALUES('', '$nama', '$username', '$password', '$photo', $akses, '$created_at', null)";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    // REGISTRASI END
    
    // UPLOAD FOTO START
    function uploadFoto() {
        
        $namaFile = $_FILES['photo']['name'];
        $ukuranFile = $_FILES['photo']['size'];
        $error = $_FILES['photo']['error'];
        $tmpName = $_FILES['photo']['tmp_name'];

        // cek apakah ada foto yang di upload
        // 4 = tidak ada gambar yang di upload (error message)
        if( $error === 4 ) {
            echo "<script>
                alert('Pilih gambar terlebih dahulu!');
            </script>";
            return false;
        }

        // cek apakah foto yang diupload adalah gambar
        $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
        
        // mengambil ekstensi gambar dari nama file
        $ekstensiFoto = explode('.', $namaFile);
        $ekstensiFoto = strtolower(end($ekstensiFoto));
        
        // cek apakah ekstensi gambar valid
        if( !in_array($ekstensiFoto, $ekstensiFotoValid) ) {
            echo "<script>
                alert('Yang anda upload bukan gambar!');
            </script>";
            return false;
        }
        
        // cek ukuran gambar (byte)
        if( $ukuranFile > 1000000) {
            echo "<script>
                alert('Ukuran gambar terlalu besar!');
            </script>";
            return false;
        }

        // gambar valid, siap di upload
        
        move_uploaded_file($tmpName, 'assets/images/users/' . $namaFile);

        return $namaFile;

    }
    // UPLOAD FOTO END

    // TAMBAH DEPARTMENT START
    function tambah_department($data) {
        global $conn;

        $ket_department = htmlspecialchars($_POST['department']);
        $created_at = htmlspecialchars($_POST['created_at']);

        $result = mysqli_query($conn, "SELECT * FROM department WHERE ket_department = '$ket_department' ");
        if (mysqli_fetch_assoc($result)) {
            return false;
        }

        $query = "INSERT INTO department( 
                                ket_department,
                                created_at
                            ) VALUES(
                                '$ket_department',
                                '$created_at' 
                            )";
        $tambah = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    // TAMBAH DEPARTMENT END

    // UBAH DEPARTMENT START
    function ubah_department($data) {
        global $conn;

        $id_department = htmlspecialchars($_POST['id_department']);
        $ket_department = htmlspecialchars($_POST['department']);
        $updated_at = htmlspecialchars($_POST['updated_at']);

        $result = mysqli_query($conn, "SELECT * FROM department WHERE ket_department = '$ket_department' ");
        if (mysqli_fetch_assoc($result)) {
            return false;
        }
        $query = "UPDATE department 
                    SET 
                    ket_department = '$ket_department',
                    updated_at = '$updated_at'
                    WHERE id_department = '$id_department'";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } 
    // UBAH DEPARTMENT END

     // HAPUS DEPARTMENT START
    function hapus_department($id) {
        global $conn;

        mysqli_query($conn, "DELETE FROM department WHERE id_department = '$id'");
        return mysqli_affected_rows($conn);
    }
    // HAPUS DEPARTMENT END

     // TAMBAH SCHEDULE START
    function schedule($data) {
        global $conn;

        $ket_department = $_POST['department'];
        $created_at = $_POST['created_at'];

        $result = mysqli_query($conn, "SELECT * FROM department");

        $query = "INSERT INTO department(
                                ket_department, 
                                created_at
                            ) VALUES(
                                '$ket_department', 
                                '$created_at'
                            )";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    // TAMBAH SCHEDULE END

    // UBAH SCHEDULE START
    function ubah_schedule($data) {
        global $conn;

        $id_schedule = htmlspecialchars($_POST['id_schedule']);
        $jam_masuk = htmlspecialchars($_POST['jam_masuk']);
        $jam_keluar = htmlspecialchars($_POST['jam_keluar']);
        $updated_at = htmlspecialchars($_POST['updated_at']);
        

        $query = "UPDATE schedule 
                    SET jam_masuk = '$jam_masuk', 
                        jam_keluar = '$jam_keluar',
                        updated_at = '$updated_at'
                    WHERE id_schedule = '$id_schedule'";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } 
    // UBAH SCHEDULE END

    //UBAH OVERTIME START
    function ubah_overtime($data) {
        global $conn;

        $id_overtime = htmlspecialchars($_POST['id_overtime']);
        $jam_mulai = htmlspecialchars($_POST['jam_mulai']);
        $jam_selesai = htmlspecialchars($_POST['jam_selesai']);
        $ket_overtime = htmlspecialchars($_POST['ket_overtime']);
        $tanggal = htmlspecialchars($_POST['tanggal']);
        $updated_at = htmlspecialchars($_POST['updated_at']);
        

        $query = "UPDATE overtime 
                    SET jam_mulai = '$jam_mulai', 
                        jam_selesai = '$jam_selesai',
                        ket_overtime = '$ket_overtime',
                        tanggal = '$tanggal',
                        updated_at = '$updated_at'
                    WHERE id_overtime = '$id_overtime'";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } 
    //UBAH OVERTIME END

    //APPROVE OVERTIME START
    function approve_overtime($id){
         global $conn;

        mysqli_query($conn, "UPDATE overtime SET status='approved' WHERE id_overtime='$id'");
        return mysqli_affected_rows($conn);
    }
    //APPROVE OVERTIME END

    //REJECT OVERTIME START
        function reject_overtime($id){
         global $conn;

        mysqli_query($conn, "UPDATE overtime SET status ='rejected' WHERE id_overtime='$id'");
        return mysqli_affected_rows($conn);
    }
    //

    //APPROVE LEAVE START
     function approve_leave($id){
     global $conn;

        mysqli_query($conn, "UPDATE cuti SET status = 'approved' WHERE id_cuti = $id");
        return mysqli_affected_rows($conn);
    }
    //APPROVE LEAVE END

    //APPROVE LEAVE START
     function reject_leave($id){
     global $conn;

        mysqli_query($conn, "UPDATE cuti SET status = 'rejected' WHERE id_cuti = $id");
        return mysqli_affected_rows($conn);
    }
    //APPROVE LEAVE END
    
     // UBAH DEPARTMENT START
    // function ubah_hak_akses($data) {
    //     global $conn;

    //     $id_hak_akses = htmlspecialchars($_POST['id_hak_akses']);
    //     $deskripsi = htmlspecialchars($_POST['deskripsi']);
    //     $updated_at = htmlspecialchars($_POST['updated_at']);

    //     $result = mysqli_query($conn, "SELECT * FROM hak_akses WHERE deskripsi = '$deskripsi' ");
    //     if (mysqli_fetch_assoc($result)) {
    //         return false;
    //     }
    //     $query = "UPDATE hak_akses 
    //                 SET 
    //                 deskripsi = '$ket_deskripsi',
    //                 updated_at = '$updated_at'
    //                 WHERE id_hak_akses = '$id_hak_akses'";
        
    //     mysqli_query($conn, $query);
    //     return mysqli_affected_rows($conn);
    // } 
    // UBAH DEPARTMENT END

    // TAMBAH DEPARTMENT START
    function tambah_user_level($data) {
        global $conn;

        $id_akses = htmlspecialchars($_POST['id_akses']);
        $deskripsi = htmlspecialchars($_POST['deskripsi']);
        $created_at = htmlspecialchars($_POST['created_at']);



        $result = mysqli_query($conn, "SELECT * FROM hak_akses WHERE id_akses = $id_akses AND deskripsi = '$deskripsi' ");
        
        if (mysqli_fetch_assoc($result)) {
            return false;
        }

        $query = "INSERT INTO hak_akses( 
                                deskripsi,
                                id_akses,
                                created_at
                            ) VALUES(
                                '$deskripsi',
                                $id_akses,
                                '$created_at' 
                            )";
        $tambah = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    // TAMBAH DEPARTMENT END

     // HAPUS DEPARTMENT START
    function hapus_hak_akses($id) {
        global $conn;

        $p = mysqli_query($conn, "DELETE FROM hak_akses WHERE id_hak_akses = '$id'");
        return mysqli_affected_rows($conn);
    }
    // HAPUS DEPARTMENT END
?>