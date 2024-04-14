<?php 

class QueryResult {
    public bool|NULL $status;
    public string $query;
    public array|mysqli_result $data;
    public int $affected_rows;
    public string $message;
};