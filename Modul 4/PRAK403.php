<html>
    <head>
        <title>Data Mata Kuliah</title>
        <style>
            table{
                border-collapse: collapse;
            }
            th{
                text-align: left;
                background: #D0CECE;
            }
            th, td{
                padding-left: 5px;
                padding-bottom: 6px;
            }
            table, th, td{
                border: 1px solid black;
            }
            .Keterangan_Tidak_Revisi{
                background-color: #00AF50;
            }
            .Keterangan_Revisi_KRS{
                background-color: #FF0000;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th width='30'>No</th>
                <th width='90'>Nama</th>
                <th width='180'>Mata Kuliah diambil</th>
                <th width='45'>SKS</th>
                <th width='85'>Total SKS</th>
                <th width='90'>Keterangan</th>
            </tr>
        
            <?php    
            $data=array(
                array(
                    "no" => "1",
                    "nama" => "Ridho",
                    "matkul" => array(
                        array(
                            "pilihan" => "Pemrograman I", 
                            "sks" => 2
                        ),
                        array(
                            "pilihan" => "Praktikum Pemrograman I", 
                            "sks" => 1
                        ),
                        array(
                            "pilihan" => "Pengantar Lingkungan Lahan Basah", 
                            "sks" => 2
                        ),
                        array(
                            "pilihan" => "Arsitektur Komputer", 
                            "sks" => 3
                        )
                    ),
                ),
                array(
                    "no" => "2",
                    "nama" => "Ratna",
                    "matkul" => array(
                        array(
                            "pilihan" => "Basis Data I", 
                            "sks" => 2
                        ),
                        array(
                            "pilihan" => "Praktikum Basis Data I", 
                            "sks" => 1
                        ),
                        array(
                            "pilihan" => "Kalkulus", 
                            "sks" => 3
                        )
                    ),
                ),
                array(
                    "no" => "3",
                    "nama" => "Tono",
                    "matkul" => array(
                        array(
                            "pilihan" => "Rekayasa Perangkat Lunak", 
                            "sks" => 3
                        ),
                        array(
                            "pilihan" => "Analisis dan Perancangan Sistem", 
                            "sks" => 3
                        ),
                        array(
                            "pilihan" => "Komputasi Awan", 
                            "sks" => 3
                        ),
                        array(
                            "pilihan" => "Kecerdasan Bisnis", 
                        "sks" => 3
                        )
                    ),
                )
            );

            function hitungTotalSKS($matkul){
                $totalSks = 0;
                foreach($matkul as $matakuliah){
                    $totalSks += $matakuliah["sks"];
                }
            return $totalSks;
            }
        
            function tentukanKeterangan($totalSks){
                return $totalSks < 7 ? "Revisi KRS" : "Tidak Revisi";
            }

            foreach($data as &$mahasiswa){
                $mahasiswa["totalSks"] = hitungTotalSKS($mahasiswa["matkul"]);
                $mahasiswa["keterangan"] = tentukanKeterangan($mahasiswa["totalSks"]);
            }
            unset($mahasiswa);

            foreach($data as $mahasiswa){
                foreach($mahasiswa["matkul"] as $index => $matakuliah){
                    echo "<tr>";
                    if($index == 0){
                        echo "<td>".$mahasiswa["no"]."</td>";
                        echo "<td>".$mahasiswa["nama"]."</td>";
                        echo "<td>".$matakuliah["pilihan"]."</td>";
                        echo "<td>".$matakuliah["sks"]."</td>";
                        echo "<td>".$mahasiswa["totalSks"]."</td>";
                        echo '<td class="'.($mahasiswa["keterangan"] == "Revisi KRS" ? "Keterangan_Revisi_KRS" : "Keterangan_Tidak_Revisi").'">'.$mahasiswa["keterangan"]."</td>";
                    }else{
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td>".$matakuliah["pilihan"]."</td>";
                        echo "<td>".$matakuliah["sks"]."</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </body>
</html>