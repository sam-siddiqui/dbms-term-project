<?php
$mock_items = array(
    array('COLUMN_NAME' => "Item 1",'COLUMN_KEY'=>'PRI', 'COLUMN_TYPE' => 'int(10)'), array('COLUMN_NAME' => "Item 2", 'COLUMN_KEY'=>'', 'COLUMN_TYPE' => 'int(10)'), array('COLUMN_NAME' => "Item 3", 'COLUMN_KEY'=>'', 'COLUMN_TYPE' => 'int(10)')
);
$mock_tables = array(
    'Table 1' => $mock_items,
    'Table 2' => $mock_items
);
?>

<div id="tables-details-section" class="align-items-start">
    <div class="col">
        <div class="list-group flex-column flex-fill justify-content-start db-tables-col" style="border: 1px solid black; max-height: 40vw; overflow-y:auto;">
            <?php
            $rootComponentFolder = $GLOBALS['rootComponentFolder'];
            $tables = isset($_SESSION['tables']) && ($_SESSION['tables'] != null) ? 
                        $_SESSION['tables'] : 
                        $mock_tables;

            foreach ($tables as $tableName => $table) {
                $currentTableName = $tableName;

                include("$rootComponentFolder/db_tables/table_output.php");
            };
            ?>
        </div>
    </div>
</div>