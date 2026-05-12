<?php
// Pengulangan 1 - 50 dengan aturan Ipin-Upin
for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "Upin dan Ipin Selamanya<br>";
    } elseif ($i % 3 == 0) {
        echo "Ipin<br>";
    } elseif ($i % 5 == 0) {
        echo "Upin<br>";
    } else {
        echo $i . "<br>";
    }
}
?>