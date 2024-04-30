<html>
    <head>
        <title>Menampilkan Gambar</title>
    </head>
    <body>
        <form method = "post" action = "" autocomplete = "off">
            <label for = "tinggi">Tinggi :</label>
            <input type = "number" name="tinggi" value = "<?php echo isset($_POST['tinggi']) ? $_POST['tinggi'] : ''; ?>"><br>

            <label for = "alamatGambar">Alamat Gambar :</label>
            <input type = "text" name = "alamatGambar" value = "<?php echo isset($_POST['alamatGambar']) ? $_POST['alamatGambar'] : ''; ?>"><br>
        
            <input type = "submit" name = "submit" value = "Cetak">
        </form>

        <?php
        function tampilkanGambar($alamatGambar){
            echo "<img src='$alamatGambar' style='width: 20px; height: 20px; margin: 2px;'>";
        }

        function cetakBentuk($tinggi, $gambar){
            $i = $tinggi;
            while($i >= 1){
                $j = 1;
                while($j <= $tinggi - $i){
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    $j++;
                }
                $k = 1;
                while($k <= $i){
                    tampilkanGambar($gambar);
                    $k++;
                }
                echo "<br>";
                $i--;
            }
        }
        
        if(isset($_POST['submit'])){
            $tinggi = $_POST['tinggi'];
            $gambar = $_POST['alamatGambar'];
            
            if($tinggi >= 0){
                cetakBentuk($tinggi, $gambar);
            }else{
                echo "<span style='color: red;'>Tinggi segitiga harus bilangan asli!</span>";
            }
        }
        ?>
    </body>
</html>