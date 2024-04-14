<div class="table-responsive" style="max-height: 20vw; overflow-y:auto; max-width: 80vw; overflow-x:auto;">
    <p><?= $results['message'] . " ". $results['affected_rows'] . " rows fetched"; ?></p>
    <pre><?= isset($_SESSION['last_sql_query']) ? $_SESSION['last_sql_query'] : '' ?></pre>
    <table class="table table-bordered table-striped">
        <?php generateTableHead($fieldNames) ?>
        <?php generateTableBody($fieldNames, $results['data']) ?>
    </table>
</div>

<?php
function generateTableHead($fieldNames) {
    echo "<thead>";
    echo "<tr>";
    foreach ($fieldNames as $key => $fieldName) {
        echo "<th>" . $fieldName . "</th>";
    };
    echo "</tr>";
    echo "</thead>";
}

function generateTableBody($fieldNames, $results) {
    echo "<tbody>";

    foreach ($results as $rowNum => $data) {
        echo "<tr>";
        foreach ($fieldNames as $key => $fieldName) {
            echo "<td>" . $data[$fieldName] .  "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
}
