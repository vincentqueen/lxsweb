<?php
define('IN_SDCMS', true);
define('SYS_PATH', str_replace("\\", "/", dirname(__FILE__)) . "/");
header('Content-Type: text/html; charset=utf-8');

$db_path = SYS_PATH . 'data/sdcms.db';
if (!file_exists($db_path)) {
    die("Database not found at $db_path");
}

try {
    $db = new PDO('sqlite:' . $db_path);
    echo "<h1>Database Check</h1>";
    echo "<style>table{border-collapse:collapse;width:100%;} th,td{border:1px solid #ccc;padding:8px;text-align:left;}</style>";
    
    echo "<h2>Categories (sd_category)</h2>";
    $cateInfo = $db->query("PRAGMA table_info(sd_category)")->fetchAll(PDO::FETCH_ASSOC);
    $cateCols = array_map(function($r){ return $r['name']; }, $cateInfo);
    $pick = function($cols, $candidates) {
        foreach ($candidates as $c) {
            if (in_array($c, $cols, true)) return $c;
        }
        return null;
    };
    $cateId = $pick($cateCols, ['id','cateid','cid']);
    $cateName = $pick($cateCols, ['catename','name','title']);
    $cateParent = $pick($cateCols, ['parent','followid','pid']);
    $cateShow = $pick($cateCols, ['isshow','is_show','show']);
    if ($cateId && $cateName) {
        echo "<p>Checking IDs: 32, 36, 40, 46, 52</p>";
        $select = $cateId." as id, ".$cateName." as name";
        $select .= $cateParent ? ", ".$cateParent." as parent" : ", '' as parent";
        $select .= $cateShow ? ", ".$cateShow." as isshow" : ", '' as isshow";
        $stmt = $db->query("SELECT $select FROM sd_category WHERE $cateId IN (32, 36, 40, 46, 52)");
        echo "<table><tr><th>ID</th><th>Name</th><th>Parent</th><th>Is Show</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['parent']}</td><td>{$row['isshow']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Columns: ".implode(', ', $cateCols)."</p>";
    }

    echo "<h2>Page Models (sd_model_page)</h2>";
    $pageInfo = $db->query("PRAGMA table_info(sd_model_page)")->fetchAll(PDO::FETCH_ASSOC);
    $pageCols = array_map(function($r){ return $r['name']; }, $pageInfo);
    $pageId = $pick($pageCols, ['id','pageid','cid_id']);
    $pageCid = $pick($pageCols, ['cid','cateid','classid']);
    $pageTitle = $pick($pageCols, ['title','name']);
    $pagePiclist = $pick($pageCols, ['piclist','pics','picturelist']);
    if ($pageCid && $pagePiclist) {
        echo "<p>Checking content for CIDs: 32, 36, 40, 46, 52</p>";
        $select = ($pageId ? $pageId." as id, " : "'' as id, ");
        $select .= $pageCid." as cid";
        $select .= $pageTitle ? ", ".$pageTitle." as title" : ", '' as title";
        $select .= ", ".$pagePiclist." as piclist";
        $stmt = $db->query("SELECT $select FROM sd_model_page WHERE $pageCid IN (32, 36, 40, 46, 52)");
        echo "<table><tr><th>ID</th><th>CID</th><th>Title</th><th>Piclist Status</th><th>JSON Check</th><th>Preview</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $len = strlen($row['piclist']);
            $raw = $row['piclist'];
            $raw = preg_replace('/^\xEF\xBB\xBF/', '', $raw);
            $json = json_decode($raw, true);
            $json_status = $json ? "OK (" . count($json) . " items)" : "<span style='color:red'>Invalid JSON</span> (" . json_last_error_msg() . ")";
            $preview = '';
            if (!$json) {
                $fixed = str_replace(["\r", "\n"], ["\\r", "\\n"], $raw);
                $json_fixed = json_decode($fixed, true);
                if ($json_fixed) {
                    $json_status .= " -> <span style='color:green'>Fixed (" . count($json_fixed) . " items)</span>";
                } else {
                    $raw2 = stripslashes($raw);
                    $json_fixed2 = json_decode($raw2, true);
                    if ($json_fixed2) {
                        $json_status .= " -> <span style='color:green'>Stripslashes Fixed (" . count($json_fixed2) . " items)</span>";
                    } else {
                        $json_status .= " -> <span style='color:red'>Fix Failed</span>";
                    }
                }
                $preview = htmlspecialchars(mb_substr($raw, 0, 300, 'UTF-8'));
            }
            echo "<tr><td>{$row['id']}</td><td>{$row['cid']}</td><td>{$row['title']}</td><td>Length: $len</td><td>$json_status</td><td style='max-width:420px;word-break:break-all;'>$preview</td></tr>";
        }
        echo "</table>";
        echo "<h3>Available CIDs</h3>";
        $stmt = $db->query("SELECT $pageCid as cid, count(1) as cnt FROM sd_model_page GROUP BY $pageCid ORDER BY $pageCid");
        echo "<table><tr><th>CID</th><th>Count</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>{$row['cid']}</td><td>{$row['cnt']}</td></tr>";
        }
        echo "</table>";
        if ($cateId && $cateName) {
            echo "<h3>Category Mapping</h3>";
            $stmt = $db->query("SELECT $pageCid as cid FROM sd_model_page GROUP BY $pageCid ORDER BY $pageCid");
            $cids = [];
            while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cids[] = $r['cid'];
            }
            if (count($cids) > 0) {
                $cidList = implode(',', array_map('intval', $cids));
                $select = $cateId." as id, ".$cateName." as name";
                $select .= $cateParent ? ", ".$cateParent." as parent" : ", '' as parent";
                $select .= $cateShow ? ", ".$cateShow." as isshow" : ", '' as isshow";
                $stmt = $db->query("SELECT $select FROM sd_category WHERE $cateId IN ($cidList)");
                echo "<table><tr><th>ID</th><th>Name</th><th>Parent</th><th>Is Show</th></tr>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['parent']}</td><td>{$row['isshow']}</td></tr>";
                }
                echo "</table>";
            }
        }
    } else {
        echo "<p>Columns: ".implode(', ', $pageCols)."</p>";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
