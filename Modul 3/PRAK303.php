<html>
    <head>
        <title>Bilangan Deret</title>
    </head>
    <body>
        <form method = "post" action = "" autocomplete = "off">
            <label for = "batasBawah">Batas Bawah :</label>
            <input type = "number" name = "batasBawah" value = "<?php echo isset($_POST['batasBawah']) ? $_POST['batasBawah'] : ''; ?>"><br>

            <label for = "batasAtas">Batas Atas :</label>
            <input type = "number" name = "batasAtas" value = "<?php echo isset($_POST['batasAtas']) ? $_POST['batasAtas'] : ''; ?>"><br>
            
            <input type = "submit" name = "submit" value = "Cetak">
        </form>
        
        <?php
        if(isset($_POST['submit'])){
            $batasBawah = $_POST['batasBawah'];
            $batasAtas = $_POST['batasAtas'];
            $bilangan = $batasBawah;

            do{
                if(($bilangan + 7) % 5 == 0){
                    echo "<img src='star-images-9441.png' style='width: 16px; height: 16px'> ";
                }else{
                    echo "$bilangan ";
                }
                $bilangan++;
            }while($bilangan <= $batasAtas);
        }
        ?>
    </body>
</html>