<?php
include "koneksi.php";

$keyword = isset($_GET['hobi']) ? $_GET['hobi'] : '';

$sql = "
        SELECT p.nama, p.alamat, h.hobi
        FROM person p
        JOIN hobi h ON p.id = h.person_id
        WHERE h.hobi LIKE '%$keyword%'
    ";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Hobi</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
    </style>
</head>
<body>
    <h2>Cari Orang Berdasarkan Hobi</h2>
    <form method="get">
        <input type="text" name="hobi" placeholder="Masukkan hobi..." value="<?= $keyword ?>">
        <button type="submit">Cari</button>
    </form>

    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['hobi']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
