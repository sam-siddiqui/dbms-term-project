<?php

include_once $GLOBALS['APP_ROOT']."/classes/PDO.php";

class DB_Connection {
    public string $servername;
    public string $username;
    private string $password;
    private string $database;
    private string|NULL $query;
    private static mysqli|NULL $conn;
    public bool $conn_status;
    public string|NULL $conn_message;
    private string $forbidden_keywords_regex = '/(?:\s|^)(drop|truncate|grant)(\s|$)/i';

    function __construct() {
        $this->database = "term_project";
        $this->servername = "localhost";
        $this->username = "termproject";
        $this->password = "";
        $this->query = NULL;
    }

    function set_query(string $unsanitized_query) {
        $sanitized_query = $this->sanitize_query($unsanitized_query);
        $this->query = $sanitized_query;
    }

    private function sanitize_query($unsanitized_query) {
        // $html_escaped = htmlspecialchars($unsanitized_query);
        // $mysql_escaped = mysqli_real_escape_string(self::$conn, $unsanitized_query);
        return $unsanitized_query;
    }

    private function check_for_forbidden_keywords(string $query) {
        if(preg_match($this->forbidden_keywords_regex,$query))
            throw new mysqli_sql_exception("DROP, TRUNCATE or similar keywords are not allowed!", 500);
    }

    function get_query(): string {
        return $this->query;
    }

    private function generateQueryMessage(string|null $query) {
        $msg = "";
        if($query == "") $msg = "No Query Given!";

        else if(preg_match('/(?:\s|^)(select)(\s|$)/i',  $query)) {
            $msg = "Query Successful!";
        }
        else if(preg_match('/(?:\s|^)(update)(\s|$)/i',  $query)) {
            $msg = "Table Updated!";
        }
        else if(preg_match('/(?:\s|^)(create)(\s|$)/i',  $query)) {
            $msg = "Table Created!";
        }
        else if(preg_match('/(?:\s|^)(insert)(\s|$)/i',  $query)) {
            $msg = "Row Inserted!";
        }
        else if(preg_match('/(?:\s|^)(delete)(\s|$)/i',  $query)) {
            $msg = "Row(s) Deleted!";
        }
        return $msg;
    }

    /**
     * @return array<bool, array, number>
     */
    function get_results() {
        $results = array();
        
        if($this->query === "") 
            $results = array("status" => null, "data" => [], "message" => $this->generateQueryMessage($this->query), "affected_rows" => 0, "query" => $this->query);
        else 
            try {
                $this->check_for_forbidden_keywords($this->query);  //WebApp Level Check
                    
                $result = self::$conn->query($this->query);
                if(gettype($result) === "boolean")
                    $results = array("status" => true, "data" => [], "message" => $this->generateQueryMessage($this->query), "affected_rows" => self::$conn->affected_rows, "query" => $this->query);
                else
                    $results = array("status" => true, "data" => $result, "message" => $this->generateQueryMessage($this->query), "affected_rows" => $result->num_rows, "query" => $this->query);
            } catch (\mysqli_sql_exception $error) {
                $results = array("status" => false, "data" => [], "message" => $error->getMessage(), "query" => $this->query);
                if($error->getCode() === 1142) $results['message'] = "This permission is not allowed!";
                //DBMS Level Check based on Privileges
            }
        return $results;
    }

    function fetch_from_prepared(string $sqlQuery) {
        $results = array();
        $stmt = self::$conn->stmt_init();
        $stmt->prepare($sqlQuery);
        try {
            $stmt->execute();
            $results = array("status" => true, "data" => $stmt->get_result(), "message" => $this->generateQueryMessage($this->query), "affected_rows" => $stmt->affected_rows, "query" => $sqlQuery);
        } catch (\mysqli_sql_exception $error) {
            $results = array("status" => false, "data" => [], "message" => $error->getMessage(), "query" => $sqlQuery); 
        }
        return $results;
    }

    function create_connection() {
        if (isset(self::$conn) && self::$conn !== NULL) return self::$conn;

        $connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
        
        if ($connection->connect_error) {
            $this->conn_status = false;
            $this->conn_message = $connection->connect_error;
        } else {
            $this->conn_status = true;
            self::$conn = $connection;
            $this->conn_message = "Success";
        }
    }

    function close_connection(): bool|NULL {
        $returnMessage = NULL;
        
        if(!isset(self::$conn)) $returnMessage = NULL;
        else {
            self::$conn->close();
            self::$conn = NULL;
            $returnMessage = true;
        }
        return $returnMessage;
    }
}
