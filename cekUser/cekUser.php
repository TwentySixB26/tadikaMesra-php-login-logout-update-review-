<?php
    session_start() ; 
        
    $conn = mysqli_connect("localhost" , "u2203040039","u2203040039","dbu2203040039") ;

    if (isset($_SESSION["login"]) === false ) {
        header("Location: ../index.php") ; 
        exit ; 
    }


    if (isset($_GET['keyword'])) {
        $data = $_GET['keyword'] ; 
    } else {
        $data = '' ; 
    }

    if ($data) {
        $query = "SELECT * FROM siswa WHERE 
                        nama LIKE '%$data%' OR
                        jenis_kelamin LIKE '%$data%' OR
                        kelas LIKE '%$data%'" ;
        $siswaS = query($query) ;
    } else {
        $siswaS = query("SELECT * FROM siswa") ; 
    }

    
    function query($query) {
        global $conn ; 

        // mengambil data dari table
        $result = mysqli_query($conn,$query) ;

        $t_siswa = [] ;
        while ($siswaS = mysqli_fetch_assoc($result)) {
            $t_siswa[] = $siswaS ;
        }
        return $t_siswa ; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Siswa</title>

    <link rel="stylesheet" href="style.css">

    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Kaushan+Script&family=Literata:ital,opsz,wght@0,7..72,400;0,7..72,900;1,7..72,300;1,7..72,600&family=Poetsen+One&family=REM:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="head">
            <h1>Siswa Pendaftar</h1>
        </div>
        <div class="cari">
            <form action="" method="get">
                <input type="text" name="keyword" id="keyword" placeholder="Search">
                <button type="submit"> Cari Data</button>
            </form>
        </div>
        <div class="tableS">
            <table width="80%" cellpadding="10" cellspacing="0" border="1">
                <tr>
                    <th width="20%">No</th>
                    <th width="20%">Nama</th>
                    <th width="20%">Tanggal lahir</th>
                    <th width="20%">Jenis kelamin</th>
                    <th width="20%">Kelas memilih</th>
                </tr>

                <?php $i = 1 ?>
                <?php foreach ($siswaS as $siswa) :?>
                    <tr>
                        <td><?php echo $i ?>. </td>
                        <td><?php echo $siswa["nama"] ; ?></td>
                        <td><?php echo $siswa["tanggal_lahir"] ; ?></td>
                        <td><?php echo $siswa["jenis_kelamin"] ; ?></td>
                        <td><?php echo $siswa["kelas"] ; ?> </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
</body>
</html>