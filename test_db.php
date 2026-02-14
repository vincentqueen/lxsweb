<?php
try {
    $db = new PDO('sqlite:data/sdcms.db');
    $stmt = $db->query("SELECT id, title, classid, intro FROM sd_content WHERE title LIKE '%先进生产工艺%' OR title LIKE '%环保创新%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h1>Search Results</h1>";
    if (empty($results)) {
        echo "No records found matching titles<br>";
    } else {
        foreach ($results as $row) {
            echo "ID: " . $row['id'] . "<br>";
            echo "ClassID: " . $row['classid'] . "<br>";
            echo "Title: " . htmlspecialchars($row['title']) . "<br>";
            echo "Intro: " . htmlspecialchars($row['intro']) . "<br>";
            echo "<hr>";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>