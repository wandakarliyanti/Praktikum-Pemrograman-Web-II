<html>
    <head>
        <title>Data Smartphone Samsung</title>
        <style>
            table {
                width: 288px;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            td {
                padding: 2px;
                text-align: left;
            }
            th {
                padding-left: 2px;
                padding-right: 2px;
                padding-top: 5px;
                padding-bottom: 5px;
                background-color: #FF0000;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <table>
            <tr><td><table>
                <th><h2>Data Smartphone Samsung<h2></th>
            </tr></td></table>

            <?php
            $dataSmartphone = ["S22" => "Samsung Galaxy S22", "S22+" => "Samsung Galaxy S22+", "A03" => "Samsung Galaxy A03", "Xcover5" => "Samsung Galaxy Xcover 5"];
            foreach ($dataSmartphone as $key => $value):
            ?>
            
            <tr><td><table>
                <td>
                    <?php
                    echo htmlspecialchars($value);
                    ?>
                </td>
            </tr></td></table>
            
            <?php
            endforeach;
            ?>
        </table>
    </body>
</html>