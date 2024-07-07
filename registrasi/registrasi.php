<?php 
        session_start() ;     
        if (isset($_SESSION["login"]) === true ) {
            header("Location: ../halamanUtama/halamanUtama.php") ; 
            exit ; 
        }
    
    // koneksi ke database
    $conn = mysqli_connect("localhost" , "u2203040039","u2203040039","dbu2203040039") ;


        if (isset($_POST["submit"])) {
            // tambah($_POST) ;
            registrasi($_POST) ; 
            // if ($conAkhir === true) {
            //     echo '<script>
            //             alert("Akun anda telah didaftarkan");
            //         </script>';
            // }  else {
            //         echo '<script>
            //                 alert("Akun anda gagal terdaftarkan!");
            //             </script>';
            // }

            // if (registrasi($_POST) > 0) {
            //     dataSiswa($_POST) ; 
            //     echo '<script>
            //             alert("Akun anda telah didaftarkan");
            //         </script>';
            // } else {
            //     echo '<script>
            //             alert("Akun anda gagal terdaftarkan!");
            //         </script>';
            // }
        } ; 


        function registrasi($data){
            global $conn ; 
            $username = htmlspecialchars(strtolower(stripslashes($data["username"]))) ;
            $password = mysqli_real_escape_string($conn,$data["password"]) ;
            $password2 = mysqli_real_escape_string($conn,$data["password2"]) ;


            // cek apakah password pertama dengan kedua sesuai tidak 
            if ($password !== $password2) {
                echo    '<script>
                            alert("password yang anda konfirmasikan salah!");
                        </script>';
                return false ; 
            }
            // akhir cek password

            //cek apakah ada username yang sudah terdaftar tidak
            $queryCek = "SELECT * FROM akun2 WHERE username ='$username' " ; 
            $resultCek = mysqli_query($conn,$queryCek) ;
            if (mysqli_affected_rows($conn) > 0) {
                echo    '<script>
                            alert("username yang anda masukan telah ada!");
                        </script>';
                return false ; 
            }
            // akhir cek username ada tidak

            $query = "INSERT INTO akun2 (username, password) VALUES ( '$username', '$password')";

            //memasukan data ke dalam database
            $result = mysqli_query($conn,$query) ;

            //mengecek apakah data yang dimasukan eror atau tidak 
            // return mysqli_affected_rows($conn);
            
            if ($result === true) {
                dataSiswa($_POST) ; 
                echo '<script>
                        alert("Akun anda telah didaftarkan");
                    </script>';
            } else {
                echo '<script>
                        alert("Akun anda telah didaftarkan");
                    </script>';
            }
        }


        function dataSiswa($data) {
            global $conn ; 
            $username = htmlspecialchars(strtolower(stripslashes($data["username"]))) ;
            $query = "SELECT * FROM akun2 WHERE username = '$username' " ; 
            $result = mysqli_query($conn,$query) ;

            $siswa = mysqli_fetch_assoc($result) ; 

            $id = $siswa["id"] ; 
            $nama = $siswa["username"] ; 
            $query2 = "  INSERT INTO siswa (id, nama) 
                        VALUES  ('$id','$nama') " ; 

            $result2 = mysqli_query($conn,$query2) ;
        }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- myCSS  -->
    <link rel="stylesheet" href="style.css">

    <!-- font css  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Kaushan+Script&family=Literata:ital,opsz,wght@0,7..72,400;0,7..72,900;1,7..72,300;1,7..72,600&family=Poetsen+One&family=REM:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Registrasi akun</title>
</head>

<body>
    <section class="hero">
        <div class="container">
            <h1>Sudah daftar tadika? Ayo bikin akun!</h1>
            <div class="daftar ">
                <h5><i>Sign in</i></h5>
                <div class="form">
                    <form action="" method="post">
                        <div class="inputUsername">
                            <div class="label">
                                <label for="username">Username :</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="username" id="username" required>
                                <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(52, 52, 52, 1);transform: msFilter;"><path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path></svg>
                                    </span>
                            </div>
                        </div>

                        <div class="mb-3 inputPassword">
                            <div class="label">
                                <label for="password">Password :</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" id="password" required>
                                <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(52, 52,52, 1);transform: msFilter;"><path d="M12 4.998c-1.836 0-3.356.389-4.617.971L3.707 2.293 2.293 3.707l3.315 3.316c-2.613 1.952-3.543 4.618-3.557 4.66l-.105.316.105.316C2.073 12.382 4.367 19 12 19c1.835 0 3.354-.389 4.615-.971l3.678 3.678 1.414-1.414-3.317-3.317c2.614-1.952 3.545-4.618 3.559-4.66l.105-.316-.105-.316c-.022-.068-2.316-6.686-9.949-6.686zM4.074 12c.103-.236.274-.586.521-.989l5.867 5.867C6.249 16.23 4.523 13.035 4.074 12zm9.247 4.907-7.48-7.481a8.138 8.138 0 0 1 1.188-.982l8.055 8.054a8.835 8.835 0 0 1-1.763.409zm3.648-1.352-1.541-1.541c.354-.596.572-1.28.572-2.015 0-.474-.099-.924-.255-1.349A.983.983 0 0 1 15 11a1 1 0 0 1-1-1c0-.439.288-.802.682-.936A3.97 3.97 0 0 0 12 7.999c-.735 0-1.419.218-2.015.572l-1.07-1.07A9.292 9.292 0 0 1 12 6.998c5.351 0 7.425 3.847 7.926 5a8.573 8.573 0 0 1-2.957 3.557z"></path></svg>
                                </span>
                            </div>
                        </div>


                        <div class="mb-3 confirmPassword">
                            <div class="label">
                                <label for="password2">Confirm Password :</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password2" id="password2" required>
                                <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(52, 52,52, 1);transform: msFilter;"><path d="M12 4.998c-1.836 0-3.356.389-4.617.971L3.707 2.293 2.293 3.707l3.315 3.316c-2.613 1.952-3.543 4.618-3.557 4.66l-.105.316.105.316C2.073 12.382 4.367 19 12 19c1.835 0 3.354-.389 4.615-.971l3.678 3.678 1.414-1.414-3.317-3.317c2.614-1.952 3.545-4.618 3.559-4.66l.105-.316-.105-.316c-.022-.068-2.316-6.686-9.949-6.686zM4.074 12c.103-.236.274-.586.521-.989l5.867 5.867C6.249 16.23 4.523 13.035 4.074 12zm9.247 4.907-7.48-7.481a8.138 8.138 0 0 1 1.188-.982l8.055 8.054a8.835 8.835 0 0 1-1.763.409zm3.648-1.352-1.541-1.541c.354-.596.572-1.28.572-2.015 0-.474-.099-.924-.255-1.349A.983.983 0 0 1 15 11a1 1 0 0 1-1-1c0-.439.288-.802.682-.936A3.97 3.97 0 0 0 12 7.999c-.735 0-1.419.218-2.015.572l-1.07-1.07A9.292 9.292 0 0 1 12 6.998c5.351 0 7.425 3.847 7.926 5a8.573 8.573 0 0 1-2.957 3.557z"></path></svg>
                                    </span>
                            </div>
                        </div>


                        <div class="d-grid gap-2 submit">
                            <button type="submit" class="btn btn-warning p-2 fw-normal" name="submit">Daftar Akun</button>
                        </div>
                        <div class="registrasi">
                            <p>Sudah punya akun? <a href="../index.php"><i>Login Disini</i></a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>