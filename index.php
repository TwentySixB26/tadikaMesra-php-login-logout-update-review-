<?php
    session_start() ; 

    // koneksi ke database
    $conn = mysqli_connect("localhost" , "u2203040039","u2203040039","dbu2203040039") ;
    if (isset($_SESSION["login"]) === true ) {
        header("Location: halamanUtama/halamanUtama.php") ; 
        exit ; 
    }

    function login($data) {
        global $conn ;
        $username = $data["username"] ; 
        $password = $data["password"] ; 

        $query = "SELECT * FROM akun2 WHERE username = '$username' " ; 
        $result = mysqli_query($conn,$query) ;

        // cek username apakah ada didatabase tidak 
        if (mysqli_affected_rows($conn) > 0 ) {
            // cek apakah password benar atau tidak 
            $hasil2 = mysqli_fetch_assoc($result) ; 
            if ($password === $hasil2["password"]) {
                $_SESSION["login"] = true ; 
                return true ; 
            }  else {
                echo   '<script>
                            alert("password anda salah! ");
                        </script>';
                return false ; 
            }
        } else {
            echo '<script>
                    alert("username anda tidak terdaftar! ");
                </script>';
                return false ; 
        }
        

    } ; 


    if (isset($_POST["submit"])) {
        // tambah($_POST) ;
        if (login($_POST) > 0) {
            global $conn ; 
            $user = $_POST["username"] ;
            $query = "SELECT * FROM akun2 WHERE username = '$user' " ; 
            $result = mysqli_query($conn,$query) ;
            $hasil3 = mysqli_fetch_assoc($result) ; 
            $id = $hasil3["id"] ;
            $_SESSION["user"] = $user  ; 
            $_SESSION["id"] = $id  ; 

            echo '<script>
                    alert("Anda berhasil login ");
                </script>';
            header("Location: halamanUtama/halamanUtama.php") ; 


            } else {
            echo '<script>
                    document.location.href = "index.php";
                </script>';
        }
    } ; 



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- my css  -->
    <link rel="stylesheet" href="style.css">

    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Kaushan+Script&family=Literata:ital,opsz,wght@0,7..72,400;0,7..72,900;1,7..72,300;1,7..72,600&family=Poetsen+One&family=REM:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>LOG IN</title>
</head>

<body>
    <section class="bg">
        <div class="row">
            <div class="col-lg-6  text">
                <div class="judul">
                    <h1>WELCOME TO!</h1>
                    <h3>Tadika Mesra</h3>
                </div>
                <div class="deksripsi">
                    <p>Sekolah Tadika Mesra adalah sebuah SMA yang berfokus pada pengembangan akademik dan karakter siswa. Dengan fasilitas modern, guru berpengalaman, dan program ekstrakurikuler yang beragam, sekolah ini mendukung siswa untuk mencapai potensi
                        penuh mereka dalam lingkungan yang ramah dan mendukung.</p>
                </div>
                <div class="sosial">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter;"><path d="M21.593 7.203a2.506 2.506 0 0 0-1.762-1.766C18.265 5.007 12 5 12 5s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.515 2.515 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831zM9.996 15.005l.005-6 5.207 3.005-5.212 2.995z"></path></svg>
                    </a>

                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter;"><path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z"></path></svg>
                    </a>

                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter;"><path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path><circle cx="16.806" cy="7.207" r="1.078"></circle><path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path></svg>
                    </a>

                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter;"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"></path></svg>
                    </a>

                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M4 16H20V5H4V16ZM13 18V20H17V22H7V20H11V18H2.9918C2.44405 18 2 17.5511 2 16.9925V4.00748C2 3.45107 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44892 22 4.00748V16.9925C22 17.5489 21.5447 18 21.0082 18H13Z" fill="rgba(255,255,255,1)"></path></svg>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-2 login ">
                <div class="form">
                    <h1>LOGIN</h1>
                    <form action="" method="post">
                        <div class="mb-3 inputUsername">
                            <div class="label">
                                <label for="username">Username :</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="username" id="username" required>
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter;"><path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path></svg>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3 inputPassword">
                            <div class="label">
                                <label for="password">Password :</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password"  class="form-control" name="password" id="password" required>
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter;"><path d="M12 4.998c-1.836 0-3.356.389-4.617.971L3.707 2.293 2.293 3.707l3.315 3.316c-2.613 1.952-3.543 4.618-3.557 4.66l-.105.316.105.316C2.073 12.382 4.367 19 12 19c1.835 0 3.354-.389 4.615-.971l3.678 3.678 1.414-1.414-3.317-3.317c2.614-1.952 3.545-4.618 3.559-4.66l.105-.316-.105-.316c-.022-.068-2.316-6.686-9.949-6.686zM4.074 12c.103-.236.274-.586.521-.989l5.867 5.867C6.249 16.23 4.523 13.035 4.074 12zm9.247 4.907-7.48-7.481a8.138 8.138 0 0 1 1.188-.982l8.055 8.054a8.835 8.835 0 0 1-1.763.409zm3.648-1.352-1.541-1.541c.354-.596.572-1.28.572-2.015 0-.474-.099-.924-.255-1.349A.983.983 0 0 1 15 11a1 1 0 0 1-1-1c0-.439.288-.802.682-.936A3.97 3.97 0 0 0 12 7.999c-.735 0-1.419.218-2.015.572l-1.07-1.07A9.292 9.292 0 0 1 12 6.998c5.351 0 7.425 3.847 7.926 5a8.573 8.573 0 0 1-2.957 3.557z"></path></svg>
                                </span>
                            </div>
                        </div>
                        <div class="d-grid gap-2 submit">
                            <button type="submit" class="btn btn-warning p-2 fw-normal" name="submit">Log in</button>
                        </div>
                        <div class="registrasi">
                            <p>Belum punya akun? <a href="registrasi/registrasi.php"><i>Sign in</i></a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>