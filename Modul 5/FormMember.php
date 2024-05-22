<?php
require_once 'Model.php';

$message = '';
$member = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['menambahkan'])){
        if(isset($_POST['nama_member']) && isset($_POST['nomor_member']) && isset($_POST['alamat']) && isset($_POST['tgl_mendaftar']) && isset($_POST['tgl_terakhir_bayar'])){
            $id_member = generateId($koneksi, 'member', 'id_member');
            $dataMember = [
                'id_member' => $id_member,
                'nama_member' => $_POST['nama_member'],
                'nomor_member' => $_POST['nomor_member'],
                'alamat' => $_POST['alamat'],
                'tgl_mendaftar' => $_POST['tgl_mendaftar'],
                'tgl_terakhir_bayar' => $_POST['tgl_terakhir_bayar']
            ];
            $result = insertData($koneksi, 'member', $dataMember);
            header("Location: Member.php");
            exit;
        }
    }

    if(isset($_POST['mengubah'])){
        if(isset($_POST['id_member']) && isset($_POST['nama_member']) && isset($_POST['nomor_member']) && isset($_POST['alamat']) && isset($_POST['tgl_mendaftar']) && isset($_POST['tgl_terakhir_bayar'])){
            $dataMember = [
                'nama_member' => $_POST['nama_member'],
                'nomor_member' => $_POST['nomor_member'],
                'alamat' => $_POST['alamat'],
                'tgl_mendaftar' => $_POST['tgl_mendaftar'],
                'tgl_terakhir_bayar' => $_POST['tgl_terakhir_bayar']
            ];
            $result = updateData($koneksi, 'member', $dataMember, 'id_member', $_POST['id_member']);
            header("Location: Member.php");
            exit;
        }
    }
}

if(isset($_GET['id_member'])){
    $member_id = $_GET['id_member'];
    $member = getById($koneksi, 'member', 'id_member', $member_id);
}
?>

<html>
    <head>
        <title>Form Member</title>
        <style>
            body{
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                background: linear-gradient(to bottom left, #DAF0F6, #DEF0FF, #C7DEF8, #85B7F1, #73AFF6);
                background-size: cover;
                background-position: center;
                font-family: Arial, sans-serif;
            }
            .container{
                width: 60%;
                background-color: white;
                border-radius: 12px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }
            .form-header{
                padding: 10px 20px;
                align-items: center;
                background-color: #F7F7F7;
                border-bottom: 1px solid #E0E0E0;
            }
            .form-header h3{
                margin-top: 20px;
                margin-bottom: 20px;
                text-align: left;
                font-size: 25px;
                color: black;
            }
            .form-container{
                padding: 20px;
            }
            form label{
                margin-bottom: 10px;
                display: block;
                font-size: 14px;
                font-weight: bold;
            }
            form input[type="text"]{
                width: 100%;
                margin-bottom: 20px;
                padding: 10px;
                border: 1px solid #CCCCCC;
                border-radius: 5px;
                box-sizing: border-box;
            }
            .button-container{
                display: flex;
                justify-content: space-between;
            }
            .button-container input[type="submit"]{
                width: 49%;
                margin-bottom: 0;
                padding: 10px;
                background-color: #73AFF6;
                border: 1px solid #CCCCCC;
                border-radius: 5px;
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="form-header">
                <h3>KELOLA DATA MEMBER</h3>
            </div>

            <div class="form-container">
                <form method="post" action="" autocomplete="off">
                    <?php if (isset($member['id_member'])): ?>
                        <input type="hidden" name="id_member" value="<?php echo $member['id_member']; ?>">
                    <?php endif; ?>

                    <label for="nama_member">Nama Member</label>
                    <input type="text" name="nama_member" id="nama_member" value="<?php echo isset($member['nama_member']) ? $member['nama_member'] : ''; ?>" required><br>

                    <label for="nomor_member">Nomor Member</label>
                    <input type="text" name="nomor_member" id="nomor_member" value="<?php echo isset($member['nomor_member']) ? $member['nomor_member'] : ''; ?>" required><br>

                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="<?php echo isset($member['alamat']) ? $member['alamat'] : ''; ?>" required><br>

                    <label for="tgl_mendaftar">Tanggal Mendaftar</label>
                    <input type="text" name="tgl_mendaftar" id="tgl_mendaftar" placeholder="YYYY-MM-DD HH:MM:SS" value="<?php echo isset($member['tgl_mendaftar']) ? $member['tgl_mendaftar'] : ''; ?>" required><br>

                    <label for="tgl_terakhir_bayar">Tanggal Terakhir Bayar</label>
                    <input type="text" name="tgl_terakhir_bayar" id="tgl_terakhir_bayar" placeholder="YYYY-MM-DD" value="<?php echo isset($member['tgl_terakhir_bayar']) ? $member['tgl_terakhir_bayar'] : ''; ?>" required><br>

                    <div class="button-container">
                        <input type="submit" name="menambahkan" value="Tambah">
                        
                        <input type="submit" name="mengubah" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>