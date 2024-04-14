<?php
$keyFieldHTML = function ($itemName, $itemType = '') {
    echo "<li class='key'> $itemName <span class='type'>$itemType<span> </li>";
};
$fieldHTML = function ($itemName, $itemType = '') {
    echo "<li> $itemName <span class='type'>$itemType<span> </li>";
};

if($table === null) $table = $mock_items;

foreach ($table as $itemIndex => $itemArray) {
    if ($itemArray['COLUMN_KEY'] == "PRI") {
        $keyFieldHTML($itemArray['COLUMN_NAME'], $itemArray['COLUMN_TYPE']);
    } else {
        $fieldHTML($itemArray['COLUMN_NAME'], $itemArray['COLUMN_TYPE']);
    }
}
