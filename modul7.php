<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<table>
<?php
for ($i = 1; $i <= 1000; $i++) {
    $text = "$i. Ini adalah hari ke-$i belajar PHP";
    if ($i == 3) {
        $text = strtolower($text);
    } elseif ($i == 5) {
        $text = str_replace("hari", "Ilari", $text);
    }
    echo "<tr><td>$text</td></tr>";
}
?>
</table>
