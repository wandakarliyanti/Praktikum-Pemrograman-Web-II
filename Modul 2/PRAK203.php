<html>
    <head>
        <title>Konversi Suhu</title>
    </head>
    <body>
        <form method = "post" action = "">
            <label for = "nilai">Nilai:</label>
            <input type = "number" name = "nilai"><br>

            <label for = "dari">Dari:</label><br>
            <input type = "radio" id = "dariCelcius" name = "dari" value = "C">
            <label for = "dariCelcius">Celcius</label><br>
            <input type = "radio" id = "dariFahrenheit" name = "dari" value = "F">
            <label for = "dariFahrenheit">Fahrenheit</label><br>
            <input type = "radio" id = "dariRheamur" name = "dari" value = "R">
            <label for = "dariRheamur">Rheamur</label><br>
            <input type = "radio" id = "dariKelvin" name = "dari" value = "K">
            <label for = "dariKelvin">Kelvin</label><br>

            <label for = "menjadi">Ke:</label><br>
            <input type = "radio" id = "menjadiCelcius" name = "menjadi" value = "C">
            <label for = "menjadiCelcius">Celcius</label><br>
            <input type = "radio" id = "menjadiFahrenheit" name = "menjadi" value = "F">
            <label for = "menjadiFahrenheit">Fahrenheit</label><br>
            <input type = "radio" id = "menjadiRheamur" name = "menjadi" value = "R">
            <label for = "menjadiRheamur">Rheamur</label><br>
            <input type = "radio" id = "menjadiKelvin" name = "menjadi" value = "K">
            <label for = "menjadiKelvin">Kelvin</label><br>

            <input type = "submit" name = "submit" value = "Konversi">
        </form>

        <?php
        if (isset($_POST["submit"])){
            $nilai = $_POST['nilai'];
            $dari = $_POST['dari'];
            $menjadi = $_POST['menjadi'];
            $hasil = 0;

            switch($dari){
                case 'C':
                    switch($menjadi){
                        case 'C':
                            $hasil = $nilai;
                            break;
                        case 'F':
                            $hasil = (9/5 * $nilai) + 32;
                            break;
                        case 'R':
                            $hasil = 4/5 * $nilai;
                            break;
                        case 'K':
                            $hasil = $nilai + 273.15;
                            break;
                    }
                    break;
                case 'F':
                    switch($menjadi){
                        case 'C':
                            $hasil = 5/9 * ($nilai - 32);
                            break;
                        case 'F':
                            $hasil = $nilai;
                            break;
                        case 'R':
                            $hasil = 4/9 * ($nilai - 32);
                            break;
                        case 'K':
                            $hasil = 5/9 * ($nilai - 32) + 273.15;
                            break;
                    }
                    break;
                case 'R':
                    switch($menjadi){
                        case 'C':
                            $hasil = 5/4 * $nilai;
                            break;
                        case 'F':
                            $hasil = (9/4 * $nilai) + 32;
                            break;
                        case 'R':
                            $hasil = $nilai;
                            break;
                        case 'K':
                            $hasil = (5/4 * $nilai) + 273.15;
                            break;
                    }
                    break;
                case 'K':
                    switch($menjadi){
                        case 'C':
                            $hasil = $nilai - 273.15;
                            break;
                        case 'F':
                            $hasil = 9/5 * ($nilai - 273.15) + 32;
                            break;
                        case 'R':
                            $hasil = 4/5 * ($nilai - 273.15);
                            break;
                        case 'K':
                            $hasil = $nilai;
                            break;
                    }
                    break;
            }

            echo "<h3>Hasil Konversi: $hasil °$menjadi<h3>";
        }
        ?>
    </body>
</html>