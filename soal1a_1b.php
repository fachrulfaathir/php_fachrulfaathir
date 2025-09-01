<?php
if (!isset($_POST['step'])) {
    ?>
    <form method="post">
        <label>Inputkan Jumlah Baris:</label>
        <input type="number" name="baris" required> Contoh: 1 <br><br>

        <label>Inputkan Jumlah Kolom:</label>
        <input type="number" name="kolom" required> Contoh: 3 <br><br>

        <input type="hidden" name="step" value="1">
        <button type="submit">SUBMIT</button>
    </form>
    <?php
} elseif ($_POST['step'] == 1) {
    $baris = (int)$_POST['baris'];
    $kolom = (int)$_POST['kolom'];
    ?>
    <form method="post">
        <?php
        for ($i = 1; $i <= $baris; $i++) {
            for ($j = 1; $j <= $kolom; $j++) {
                echo "$i.$j: <input type='text' name='data[$i][$j]' required> ";
            }
            echo "<br><br>";
        }
        ?>
        <input type="hidden" name="baris" value="<?php echo $baris; ?>">
        <input type="hidden" name="kolom" value="<?php echo $kolom; ?>">
        <input type="hidden" name="step" value="2">
        <button type="submit">SUBMIT</button>
    </form>
    <?php
} elseif ($_POST['step'] == 2) {
    $data = $_POST['data'];
    foreach ($data as $i => $row) {
        foreach ($row as $j => $value) {
            echo "$i.$j : $value <br>";
        }
    }
}
?>
