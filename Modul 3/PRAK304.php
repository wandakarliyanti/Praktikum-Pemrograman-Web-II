<html>
    <head>
        <title>Banyak Bintang</title>
        <style>
            .bintang{
                width: 50px;
                height: 50px;
            }
        </style>
    </head>
    <body>
        <?php
        $jumlahBintang = isset($_POST['jumlahBintang']) ? $_POST['jumlahBintang'] : '';
            
        if(isset($_POST['submit'])){
            $jumlahBintang = $_POST['jumlahBintang'];
        }

        if(isset($_POST['tambah'])){
            $jumlahBintang += 1;
        }elseif(isset($_POST['kurang'])){
            if($jumlahBintang > 0){
                $jumlahBintang -= 1;
            }
        }
        ?>

        <?php
        if(isset($_POST['submit']) || $jumlahBintang > 0):
        ?>
        
        <p>Jumlah bintang <?= $jumlahBintang ?><br><br></p>
        
        <?php
        for($i = 0; $i < $jumlahBintang; $i++):
        ?>
        
        <img src = 'star-images-9441.png' class = 'bintang'>
        <?php endfor; ?>

        <form method = "post" action = "">
            <input type = "submit" name = "tambah" value = "Tambah">
            <input type = "submit" name = "kurang" value = "Kurang">
            <input type = "hidden" name = "jumlahBintang" value = "<?= $jumlahBintang ?>">
        </form>
        <?php else: ?>

        <form method = "post" action = "" autocomplete = "off">
            <label for = "jumlahBintang">Jumlah bintang</label>
            <input type = "number" name = "jumlahBintang" value = "<?= $jumlahBintang ?>"><br>
            <input type = "submit" name = "submit" value = "Submit">
        </form>
        <?php endif; ?>
    </body>
</html>