<!DOCTYPE html>
<html>
    <head>
        <title>search students</title>
        <link rel="stylesheet" href="css/table.css" type="text/css" />
    </head>
    <body>
        <?php
        require_once 'dbconfig.php';
        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // execute the stored procedure
            $sql = 'CALL countcc()';
            // call the stored procedure
            $q = $pdo->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
        ?>
        <table>
            <tr>
                <th>no of students</th>
            </tr>
            <?php while ($r = $q->fetch()): ?>
                <tr>
                    <td><?php echo $r['customerName'] ?></td>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </body>
</html>
