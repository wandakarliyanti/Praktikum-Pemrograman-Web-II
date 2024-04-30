<html>
    <head>
        <title>Cetak String</title>
    </head>
    <body>
        <form method = "post" action = "" autocomplete = "off">
            <input type = "text" name = "string">
            
            <input type = "submit" name = "submit" value = "submit">
        </form>

        <?php
        if(isset($_POST['submit'])){
            $string = $_POST['string'];
            $ubahString = strtolower($string);
            $karakter = str_split($ubahString);
            $panjang = strlen($ubahString);
            $hasil = "";

            foreach($karakter as $index => $char){
                $karakterBerulang = "";
                $karakterBerulang .= strtoupper($char);
                $karakterBerulang .= str_repeat(strtolower($char), $panjang - 1);
                $hasil .= $karakterBerulang;
            }
            echo "<h3>Input:</h3>";
            echo "$string";
            echo "<h3>Output:</h3>";
            echo "$hasil";
        }
        ?>
    </body>
</html>