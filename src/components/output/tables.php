<?php
/**
 * @var array status: bool|null, data: array, message: string, affected_rows: number, query: string
 */
$results = $_SESSION['last_sql_results'];
if($results === NULL || $results['status'] === NULL) include_once "initial_empty_output.php";
else if (isset($results['status']) && $results['status'] === true && $results['affected_rows'] === 0) include_once "change_output.php";
else if(isset($results['status']) && $results['status'] === false) include_once "error_output.php";
else {
    $fieldNames = array_keys($results['data'][0]);
    include_once "data_output.php";
}