<hmtl>
    <head>
        <title>Jumlah Peserta</title>
        <style>
            .merah{
                color: red;
            }
            .hijau{
                color: green;
            }
        </style>
    </head>
    <body>
        <form method = "post" action = "" autocomplete = "off">
            <label for = "jumlahPeserta">Jumlah Peserta :</label>
            <input type = "number" name =  "jumlahPeserta" value = "<?php echo isset($_POST['jumlahPeserta']) ? $_POST['jumlahPeserta'] : ''; ?>"><br>
            
            <input type = "submit" name = "submit" value = "Cetak">
        </form>

        <?php
        if(isset($_POST['submit'])){
            $jumlahPeserta = $_POST['jumlahPeserta'];
            $bilangan = 1;
            
            while($bilangan <= $jumlahPeserta){
                if($bilangan %2 == 0){
                    echo "<span class = 'hijau'><h3>Peserta ke-$bilangan</h3></span>";
                }else{
                    echo "<span class = 'merah'><h3>Peserta ke-$bilangan</h3></span>";
                }
                $bilangan++;
            }
        }
        ?>
    </body>
</html>