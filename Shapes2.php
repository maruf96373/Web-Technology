<html>
<head>
    <title>Shapes2</title>
</head>
<body>
    <table border='1' cellspacing='0' width=300 height=300>
        <tr>
            <td width=150 height=80>
                <?php
                print("The Array to Declare");
                ?>
            </td>
            <td width=150 height=80>
                <?php
                print("Shapes to print");
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <table border='1' cellspacing='0' width=100 height=100>
                    <?php
                    $Array = array(
                        array('<td>1</td>', '<td>2</td>', '<td>3</td>', '<td>A</td>'),
                        array('<td>1</td>', '<td>2</td>', '<td>B</td>', '<td>C</td>'),
                        array('<td>1</td>', '<td>D</td>', '<td>E</td>', '<td>F</td>')
                    );
                    foreach ($Array as $row) {
                        echo '<tr>' . implode('', $row) . '</tr>';
                    }
                    ?>
                </table>
            </td>
            <td>
                <table border='1' cellspacing='0' width=100 height=100>
                    <tr>
                        <td>
                            <?php
                            for ($i = 3; $i >= 1; $i--) {
                                for ($j = 1; $j <= $i; $j++) {
                                    print($j);
                                }
                                print("<br>");
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $a = 'A';
                            for ($i = 0; $i < 3; $i++) {
                                for ($j = 0; $j <= $i; $j++) {
                                    print($a++);
                                }
                                print("<br>");
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
