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
    function tambah_employee($data) {
        global $conn;

        $nip = htmlspecialchars($data['nip']);
        $nama = htmlspecialchars($data['nama']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
        $alamat = htmlspecialchars($data['alamat']);
        $no_telp = htmlspecialchars($data['no_telp']);
        $foto = uploadFoto();        
        $status = htmlspecialchars($data['status']);
        $id_akses = htmlspecialchars($data['akses']);
        $id_department = htmlspecialchars($data['department']);
        $created_at = htmlspecialchars($data['created_at']);

        if( !$foto ) {
            return false;
        }

        $result = mysqli_query($conn, "SELECT * FROM user WHERE nip = '$nip'");
        

        if(mysqli_fetch_assoc($result)) {
            echo "<script>Swal.fire({
                title: 'Error!',
                text: 'NIP sudah terdaftar',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {window.history.back();} )</script>";
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
    function ubah_employee($data) {
        global $conn;

        $id_user =  htmlspecialchars($data['id_user']);
        $nip =  htmlspecialchars($data['nip']);
        $nama =  htmlspecialchars($data['nama']);
        $email =  htmlspecialchars($data['email']);
        $jenis_kelamin =  htmlspecialchars($data['jenis_kelamin']);
        $alamat =  htmlspecialchars($data['alamat']);
        $no_telp =  htmlspecialchars($data['no_telp']);
        $status =  htmlspecialchars($data['status']);
        $id_akses =  htmlspecialchars($data['akses']);
        $id_department = htmlspecialchars($data['department']);
        $updated_at =  htmlspecialchars($data['updated_at']);
        $gambarLama = htmlspecialchars($data['gambarLama']);
        

        //CEK APAKAH USER PILIH GAMBAR ATAU TIDAK
        if( $_FILES['photo'] ['error'] === 4) {
            $photo = $gambarLama;
        } else {
             $photo = uploadFoto();
        }

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

        $ket_department =  htmlspecialchars($data['department']);
        $created_at =  htmlspecialchars($data['created_at']);

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

        $id_department = htmlspecialchars($data['id_department']);
        $ket_department = htmlspecialchars($data['department']);
        $updated_at =  htmlspecialchars($data['updated_at']);

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

        
?>