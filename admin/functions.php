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
        $status = $_POST['status'];
        $id_akses = $_POST['akses'];
        $id_department = $_POST['department'];
        $created_at = $_POST['created_at'];


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
                        id_akses = $id_akses,
                        id_department ='$id_department',
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

    // HAPUS DEPARTMENT START
    function hapus_department($id) {
        global $conn;

        mysqli_query($conn, "DELETE FROM department WHERE id_department = '$id'");
        return mysqli_affected_rows($conn);
    }
    // HAPUS DEPARTMENT END

    // TAMBAH DEPARTMENT START
    function tambah_department($data) {
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
    // TAMBAH DEPARTMENT END

    // UBAH DEPARTMENT START
    function ubah_department($data) {
        global $conn;

        $id_department = $_POST['id_department'];
        $ket_department = $_POST['department'];
        $updated_at = $_POST['updated_at'];
        

        $query = "UPDATE department 
                    SET ket_department = '$ket_department', 
                        updated_at = '$updated_at'
                    WHERE id_department = '$id_department'";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } 
    // UBAH DEPARTMENT END

    // TAMBAH DEPARTMENT START
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
    // TAMBAH DEPARTMENT END

    // UBAH SCHEDULE START
    function ubah_schedule($data) {
        global $conn;

        $id_schedule = $_POST['id_schedule'];
        $jam_masuk = $_POST['jam_masuk'];
        $jam_keluar = $_POST['jam_keluar'];
        $updated_at = $_POST['updated_at'];
        

        $query = "UPDATE schedule 
                    SET jam_masuk = '$jam_masuk', 
                        jam_keluar = '$jam_keluar',
                        updated_at = '$updated_at'
                    WHERE id_schedule = '$id_schedule'";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } 
    // UBAH SCHEDULE END


?>