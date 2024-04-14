<?php

if ($request->method === 'GET') {
    switch (session_status()) {
        case PHP_SESSION_NONE:
            handleFirstLaunch();
            break;
        case PHP_SESSION_ACTIVE:
            handleContinuedSession();
            break;
        default:
            handleFirstLaunch();
            break;
    }
}

if ($request->method === 'POST') {
    include_once "$APP_ROOT/routes/run_sql.php";
}
