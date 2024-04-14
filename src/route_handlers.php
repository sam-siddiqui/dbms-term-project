<?php
function loadSessionDefaults() {
    session_start();
    foreach ($GLOBALS["sessionDefaults"] as $key => $value) {
        if(isset($_SESSION[$key])) continue;
        $_SESSION[$key] = $value;
    };
    loadDBInformationInSession();
}

function loadDBInformationInSession() {

    $tableNamesQuery = "SELECT table_name FROM INFORMATION_SCHEMA.TABLES WHERE table_type = 'BASE TABLE'";
    
    $arrayOfTableNames = handleSQLQuery($tableNamesQuery, true)['data'];

    $columnInfoQuery = function($table_name) {
        return "SELECT COLUMN_NAME, COLUMN_TYPE, COLUMN_KEY FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$table_name'";
    };

    $tables = array();
    foreach ($arrayOfTableNames as $tableNo => $array) {  
        $currentTableName = $array['table_name'];
        $query = $columnInfoQuery($currentTableName);
        $columns = handleSQLQuery($query, true)['data'];
        $tables[$currentTableName] = $columns;
    }

    
    $_SESSION['table_names'] = $arrayOfTableNames;
    $_SESSION['tables'] = $tables;
}

function handleFirstLaunch() {
    $routes = $GLOBALS["routes"];
    $rootComponentFolder = $GLOBALS["rootComponentFolder"];
    loadSessionDefaults();
    
    include("routes/{$routes['indexPage']}");
}

function handleContinuedSession() {
    // session_start();

    $routes = $GLOBALS["routes"];
    $rootComponentFolder = $GLOBALS["rootComponentFolder"];
    include("routes/{$routes['indexPage']}");
}

function handleSQLQuery(string $sqlQuery, $prepared = false, $keepAlive = false): bool|string|array {
    /**
     * @var array
     */
    $results = NULL;
    $APP_ROOT = $GLOBALS["APP_ROOT"];

    include "$APP_ROOT/utility/db_conn.php";

    $resultsType = $results['status'];
    if(($resultsType === false) || ($resultsType === null) || ($results['data'] === [])) return $results;

    $rows = array();
    while ($row = $results['data'] -> fetch_assoc()) {
        $rows[] = $row;
    }
    $results['data'] = $rows;
    return $results;
}