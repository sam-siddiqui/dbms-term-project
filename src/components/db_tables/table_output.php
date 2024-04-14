<div class="list-group-item list-group-item-action db-table-group" onclick="getTableHead(this)">
    <ul class="db-tables">
        <li> <?= $currentTableName ?> </li>
        <?php include("individual_table.php");?>
    </ul>
</div>