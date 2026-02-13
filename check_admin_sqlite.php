<?php
if (!class_exists('SQLite3')) {
    die("SQLite3 class not found");
}
$db = new SQLite3('data/sdcms.db');
$results = $db->query("SELECT adminid, adminname, adminpass FROM sd_admin");
$rows = [];
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    $rows[] = $row;
}
print_r($rows);
?>
