<?php
require_once 'Model.php';

$members = getData($koneksi, 'member');

if(isset($_POST['delete'])){
    $result = deleteData($koneksi, 'member', 'id_member', $_POST['id_member']);
    header("Location: Member.php");
    exit;
}
?>

<html>
    <head>
        <title>Member</title>
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
                width: 90%;
                background-color: #FFFFFF;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }
            .table-header{
                padding: 10px 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #F7F7F7;
                border-bottom: 1px solid #E0E0E0;
            }
            .table-header h3{
                margin-top: 20px;
                margin-bottom: 20px;
                text-align: left;
                font-size: 25px;
                color: black;
            }
            .table-header .add-button{
                padding: 5px 10px;
                background-color: #73AFF6;
                color: black;
                border: none;
                border-radius: 5px;
                font-size: 14px;
            }
            .table-container{
                padding: 20px;
            }
            table{
                width: 100%;
                border-collapse: collapse;
            }
            table thead{
                background-color: #F7F7F7;
            }
            table th, table td{
                padding: 10px;
                text-align: left;
                border-right: 1px solid white;
                border-left: 1px solid white;
                border-bottom: 1px solid white;
                font-size: 14px;
            }
            table th{
                background-color: #E9ECEF;
                font-weight: bold;
            }
            table tbody tr:nth-child(even){
                background-color: #F2F2F2;
            }
            .action-buttons{
                display: flex;
                gap: 10px;
            }
            .action-buttons a{
                text-decoration: none;
                color: #007BFF;
                font-weight: bold;
            }
            .action-buttons form{
                display: inline;
            }
            .action-buttons form button{
                background: none;
                border: none;
                color: #007BFF;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="table-header">
                <h3>DATA MEMBER</h3>

                <button class="add-button" onclick="window.location.href='FormMember.php'">Tambah Member</button>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th width='90'>ID Member</th>
                            <th width='170'>Nama Member</th>
                            <th width='105'>Nomor Member</th>
                            <th width='170'>Alamat</th>
                            <th width='125'>Tanggal Mendaftar</th>
                            <th width='155'>Tanggal Terakhir Bayar</th>
                            <th width='90'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($members as $member){
                            echo "<tr>
                                <td>{$member['id_member']}</td>
                                <td>{$member['nama_member']}</td>
                                <td>{$member['nomor_member']}</td>
                                <td>{$member['alamat']}</td>
                                <td>{$member['tgl_mendaftar']}</td>
                                <td>{$member['tgl_terakhir_bayar']}</td>
                                <td class='action-buttons'>
                                    <a href='FormMember.php?id_member={$member['id_member']}'>Edit</a>
                                    <form method='post' action=''>
                                        <input type='hidden' name='id_member' value='{$member['id_member']}'>

                                        <button type='submit' name='delete'>Delete</button>
                                    </form>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>