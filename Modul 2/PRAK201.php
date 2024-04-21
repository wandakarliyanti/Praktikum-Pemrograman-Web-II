<html>
    <head>
        <title>Pengurutan Nama</title>
    </head>
    <body>
        <form method = "post" action = "">
            <label for = "nama1">Nama: 1</label>
            <input type = "text" name = "nama1"><br>

            <label for = "nama2">Nama: 2</label>
            <input type = "text" name = "nama2"><br>

            <label for = "nama3">Nama: 3</label>
            <input type = "text" name = "nama3"><br>
            
            <input type = "submit" name = "submit" value = "Urutkan">
        </form>
        
        <?php
        if(isset($_POST['submit'])){
            $nama1 = $_POST['nama1'];
            $nama2 = $_POST['nama2'];
            $nama3 = $_POST['nama3'];
            
            if($nama1 < $nama2 && $nama1 < $nama3){
                $urutan1 = $nama1;
                if($nama2 < $nama3){
                    $urutan2 = $nama2;
                    $urutan3 = $nama3;
                } else{
                    $urutan2 = $nama3;
                    $urutan3 = $nama2;
                }
            } elseif($nama2 < $nama1 && $nama2 < $nama3){
                $urutan1 = $nama2;
                if($nama1 < $nama3){
                    $urutan2 = $nama1;
                    $urutan3 = $nama3;
                } else{
                    $urutan2 = $nama3;
                    $urutan3 = $nama1;
                }
            } else{
                $urutan1 = $nama3;
                if($nama1 < $nama2){
                    $urutan2 = $nama1;
                    $urutan3 = $nama2;
                } else{
                    $urutan2 = $nama2;
                    $urutan3 = $nama1;
                }
            }

            echo "$urutan1<br>";
            echo "$urutan2<br>";
            echo "$urutan3";
        }
        ?>
    </body>
</hmtl>