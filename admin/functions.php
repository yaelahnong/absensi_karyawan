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

    // TAMBAH EMPLOYEE START
    function tambah_employee($data) {
        global $conn;

        $nip = htmlspecialchars($data['nip']);
        $nama = htmlspecialchars($data['nama']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
        $alamat = htmlspecialchars($data['alamat']);
        $kota = htmlspecialchars($data['city']);
        $provinsi = htmlspecialchars($data['province']);
        $no_telp = htmlspecialchars($data['no_telp']);
        $foto = uploadFoto();        
        $status = htmlspecialchars($data['status']);
        $id_akses = htmlspecialchars($data['akses']);
        $id_department = htmlspecialchars($data['department']);
        $created_at = htmlspecialchars($data['created_at']);
        
        
        if( !$foto ) {
            return false;
        }
        
        $cekNip = mysqli_query($conn, "SELECT * FROM user WHERE nip = '$nip'");
        $cekEmail = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");


        if(mysqli_fetch_assoc($cekNip)) {
            echo "<script>Swal.fire({
                title: 'Failed!',
                text: 'Employee ID Number is already exist',
                icon: 'error',
                confirmButtonText: 'OK'
            });</script>";
            return false;
        }
        
        if (mysqli_fetch_assoc($cekEmail)) {
            echo "<script>Swal.fire({
                title: 'Failed!',
                text: 'Email address is already exist',
                icon: 'error',
                confirmButtonText: 'OK'
            });</script>";
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
                                kota,
                                provinsi,
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
                                '$kota',
                                '$provinsi', 
                                '$no_telp', 
                                '$status',
                                '$foto', 
                                $id_akses,
                                $id_department, 
                                '$created_at'
                            )";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }
    // TAMBAH USER END

    // UBAH USER START
    function ubah_employee($data) {
        global $conn;
        
        $id_user =  htmlspecialchars($data['id_user']);
        $nip =  htmlspecialchars($data['nip']);
        $nama =  htmlspecialchars($data['nama']);
        $email =  htmlspecialchars($data['email']);
        $jenis_kelamin =  htmlspecialchars($data['jenis_kelamin']);
        $alamat =  htmlspecialchars($data['alamat']);
        $kota =  htmlspecialchars($data['city']);
        $provinsi =  htmlspecialchars($data['province']);
        $no_telp =  htmlspecialchars($data['no_telp']);
        $status =  htmlspecialchars($data['status']);
        $id_akses =  htmlspecialchars($data['akses']);
        $id_department = htmlspecialchars($data['department']);
        $updated_at =  htmlspecialchars($data['updated_at']);
        $gambarLama = htmlspecialchars($data['gambarLama']);
        

        //CEK APAKAH USER PILIH GAMBAR ATAU TIDAK
        if( $_FILES['photo']['error'] === 4 ) {
            $photo = $gambarLama;
        } else {
            $photo = uploadFoto();
        }

        if(!$photo) {
            return false;
        }

        $query = "UPDATE user 
                    SET nip = '$nip', 
                        nama = '$nama', 
                        email = '$email', 
                        jenis_kelamin = '$jenis_kelamin', 
                        alamat = '$alamat', 
                        kota = '$kota', 
                        provinsi = '$provinsi', 
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
    function hapus_employee($id) {
        global $conn;

        mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id'");
        return mysqli_affected_rows($conn);
    }
    // HAPUS user END

    // REGISTRASI START
    function registrasi($data) {
        global $conn;

        $nama =  htmlspecialchars($data['nama']);
        $username =  htmlspecialchars($data['username']);
        $password =  htmlspecialchars($data['password']);
        $created_at =  htmlspecialchars($data['created_at']);
        $akses =  htmlspecialchars($data['akses']);
        $photo = uploadFoto();

        if( !$photo ) {
            return false;
        }

        $cekusername = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

        if(mysqli_fetch_assoc($cekusername)) {
            echo "<script>Swal.fire({
                title: 'Failed!',
                text: 'Username already exists',
                icon: 'error',
                confirmButtonText: 'OK'
            });</script>";
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
            echo "<script>Swal.fire({
                title: 'Failed!',
                text: 'Select image first',
                icon: 'error',
                confirmButtonText: 'OK'
            });</script>";
            return false;
        }
        
        // cek apakah foto yang diupload adalah gambar
        $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
        
        // mengambil ekstensi gambar dari nama file
        $ekstensiFoto = explode('.', $namaFile);
        $ekstensiFoto = strtolower(end($ekstensiFoto));
        
        // cek apakah ekstensi gambar valid
        if( !in_array($ekstensiFoto, $ekstensiFotoValid) ) {
            echo "<script>Swal.fire({
                title: 'Failed!',
                text: 'Image invalid format. Only this files are allowed: PNG, JPG, JPEG',
                icon: 'error',
                confirmButtonText: 'OK'
            });</script>";
            return false; 
        }

        // cek ukuran gambar (byte)
        if( $ukuranFile > 1000000 ) {
            echo "<script>Swal.fire({
                title: 'Failed!',
                text: 'Image may not be greater than 1 MB',
                icon: 'error',
                confirmButtonText: 'OK'
            });</script>";
            return false;
        }

        // gambar valid, siap di upload

        // var_dump();
        // exit;

        move_uploaded_file($tmpName, 'assets/images/users/' . $namaFile);
        // move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'] . '/PRAKERIN/absensi_karyawan/admin/assets/images/users/' . $namaFile);
        // copy($_SERVER['DOCUMENT_ROOT'] . '/PRAKERIN/absensi_karyawan/admin/assets/images/users/' . $namaFile, 'D:/INO/PRAKERIN/Project/absensi_karyawan_mobile/public/assets/images/' . $namaFile);
        

        return $namaFile;

    }
    // UPLOAD FOTO END



    // TAMBAH DEPARTMENT START
    function tambah_department($data) {
        global $conn;

        $ket_department =  htmlspecialchars($data['department']);
        $created_at =  htmlspecialchars($data['created_at']);

        $result = mysqli_query($conn, "SELECT * FROM department WHERE ket_department = '$ket_department' ");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>Swal.fire({
                title: 'Failed!',
                text: 'Department already exists',
                icon: 'error',
                confirmButtonText: 'OK'
            });</script>";
            return false;
        }

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
    // TAMBAH DEPARTMENT END

    // UBAH DEPARTMENT START
    function ubah_department($data) {
        global $conn;

        $id_department = htmlspecialchars($data['id_department']);
        $ket_department = htmlspecialchars($data['department']);
        $updated_at =  htmlspecialchars($data['updated_at']);

        $result = mysqli_query($conn, "SELECT * FROM department WHERE ket_department = '$ket_department' ");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>Swal.fire({
                title: 'Failed!',
                text: 'Department already exists',
                icon: 'error',
                confirmButtonText: 'OK'
            });</script>";
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

        $ket_department =  htmlspecialchars($data['department']);
        $created_at =  htmlspecialchars($data['created_at']);

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

        $id_schedule =  htmlspecialchars($data['id_schedule']);
        $jam_masuk =  htmlspecialchars($data['jam_masuk']);
        $jam_keluar =  htmlspecialchars($data['jam_keluar']);
        $updated_at =  htmlspecialchars($data['updated_at']);
        

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

        $id_overtime =  htmlspecialchars($data['id_overtime']);
        $jam_mulai =  htmlspecialchars($data['jam_mulai']);
        $jam_selesai =  htmlspecialchars($data['jam_selesai']);
        $ket_overtime =  htmlspecialchars($data['ket_overtime']);
        $tanggal =  htmlspecialchars($data['tanggal']);
        $updated_at =  htmlspecialchars($data['updated_at']);
        

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

     // //APPROVE OVERTIME START
    function reject_overtime($data) {
        global $conn;

        $id = htmlspecialchars($data['id_overtime']);
        $pesan = htmlspecialchars($data['pesan']);

        $query = "UPDATE overtime
                    SET pesan = '$pesan',
                        status = 'rejected'
                    WHERE id_overtime = '$id'";

            mysqli_query($conn, $query);
            
            return mysqli_affected_rows($conn);
        

    }
    //APPROVE OVERTIME END


    //APPROVE LEAVE START
    function approve_leave($id){
    global $conn;

        mysqli_query($conn, "UPDATE cuti SET status = 'approved' WHERE id_cuti = $id");
        return mysqli_affected_rows($conn);
    }

    //APPROVE LEAVE END

    // //APPROVE LEAVE START
    function reject_leave($data) {
        global $conn;

        $id = htmlspecialchars($data['id_cuti']);
        $pesan = htmlspecialchars($data['pesan']);

        $query = "UPDATE cuti
                    SET pesan = '$pesan',
                        status = 'rejected'
                    WHERE id_cuti = '$id'";

            mysqli_query($conn, $query);
            
            return mysqli_affected_rows($conn);
        

    //APPROVE LEAVE END
   // mysqli_query($conn, $quer "UPDATE cuti SET status = 'rejected' WHERE id_cuti = $id");
    }
    //REJECT LEAVE END


    // UBAH ADMIN START
    function ubah_user($data) {
        global $conn;

        $id_admin =  htmlspecialchars($data['id_admin']);
        $nama =  htmlspecialchars($data['nama']);
        $updated_at =  htmlspecialchars($data['updated_at']);
        $gambarLama = htmlspecialchars($data['gambarLama']);
        

        //CEK APAKAH USER PILIH GAMBAR ATAU TIDAK
        if( $_FILES['photo'] ['error'] === 4) {
            $photo = $gambarLama;
        } else {
            $photo = uploadFoto();
        }

        $query = "UPDATE admin
                    SET nama = '$nama', 
                        photo = '$photo', 
                        updated_at = '$updated_at'
                    WHERE id_admin = '$id_admin'";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } 
    // UBAH ADMIN END

    // HAPUS ADMIN START
    function hapus_user($id) {
        global $conn;
        
        mysqli_query($conn, "DELETE FROM admin WHERE id_admin = '$id'");
        return mysqli_affected_rows($conn);
    }
    // HAPUS ADMIN END

        
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