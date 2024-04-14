<?php
session_start();
$postBody = $request->get_post_body();
$darkMode = $postBody['previousDarkMode'];
$sqlQuery = $postBody['SQLQuery'];

$results = handleSQLQuery($sqlQuery);
if(strpos(strtolower($sqlQuery), "alter") !== false) loadDBInformationInSession();
$_SESSION['dark_mode'] = $darkMode;
$_SESSION['last_sql_results'] = $results;
$_SESSION['last_sql_query'] = $sqlQuery;
$_SESSION['text_in_editor'] = $postBody['editorContent'];
handleContinuedSession();