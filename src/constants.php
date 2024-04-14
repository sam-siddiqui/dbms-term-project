<?php
global $rootComponentFolder;
global $APP_ROOT;
global $routes;

$APP_ROOT = __DIR__;
$rootComponentFolder = $APP_ROOT . "/components/";

$db_credentials = array(
    "database" => "term_project",
    "servername" => "localhost",
    "username" => "termproject",
    "password" => "",
);

$routes = [
    "indexPage" => "load_page.php",
    "runQuery" => "run_sql.php",
    "changeSQLFile" => "change_sql_file.php"
];

$sessionDefaults = array(
    'dark_mode' => 'light',
    'editor_themes' => array('light' => 'xq-light', 'dark' => 'xq-dark'),
    'sql_file' => NULL,
    'last_sql_results' => NULL,
    'table_names' => NULL,
    'tables' => NULL,
    'affected_rows' => 0,
    'status' => NULL
);