<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table align="center">
        <tr>
        <td><label for="nama">Masukan Nama : </label></td>
        <td><input type="text" id="nama" name="nama"></input></td>
        </tr>

        <tr>
        <td><label for="nis">Masukan Nis : </label></td>
        <td><input type="text" id="nis" name="nis"></input></td>
        </tr>

        <tr>
        <td><label for="rayon">Masukan Rayon : </label></td>
        <td><input type="text" id="rayon" name="rayon"></input></td>
        </tr>

        <tr>
        <td><input type ="submit" name="kirim" value="tambah"></input></td>
        <td><button><a href="gfrom2.php">RESET</a></button></td>
        </tr>

        <tr>
        </table>
        <br>
    </form>

    <?php
    //memulai sesi baru
    session_start();
    //klo blom ada $_session['datastudent'] maka buat dengan array kosong
    if(!isset($_SESSION['datastudent'])){
        $_SESSION['datastudent']= array();
    }

    //var_dump($_SESSION['datastudent']);

    //validasi data user
    if(isset($_POST['kirim'])){
       if(!empty($_POST['nama'])&& !empty($_POST['nis'])&& !empty($_POST['rayon'])){
        $data = [
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon']
        ];
        array_push($_SESSION['datastudent'], $data);
       }
    }

    //validasi data  yang ingin di hapus 
    if(isset($_GET['hapus'])){
        $key = $_GET['hapus'];
        unset($_SESSION['datastudent'][$key]);
        header("Location: gform.php");
        exit;
    }

    //kalo $_SESSION['datastudent'] tidak kosong atau ada isisnya maka tampilkan hasil foreachnya
    if(!empty($_SESSION['datastudent'])){
    foreach($_SESSION['datastudent'] as $key => $value){
    echo "nama : " . $value['nama']. '<br>';
    echo "nis : " . $value['nis']. '<br>';
    echo "rayon : " . $value['rayon']. '<br>';
    echo '<a href="?hapus='. $key .'">HAPUS</a>'; 
    echo '<a href="?hapus='. $key .'">EDIT</a>'; 
    echo '<hr>';
    }
}

    ?>
</body>
</html>
