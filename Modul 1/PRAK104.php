<html>
    <head>
        <title>Data Smartphone Samsung</title>
        <style>
            table {
                width: 195px;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 2px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <table>
            <tr><td><table>
                <th>Data Smartphone Samsung</th>
            </table></td></tr>

            <?php
            $dataSmartphone = ["Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5"];
            foreach ($dataSmartphone as $smartphone):
            ?>

            <tr><td><table>
                <td>
                    <?php
                    echo htmlspecialchars($smartphone);
                    ?>
                </td>
            </table></td></tr>

            <?php
            endforeach;
            ?>
        </table>
    </body>
</html>