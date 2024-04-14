<?php 
class Request {
    public $method;
    public $full_uri;
    public $isValid;
    public $param;
    private $postBody;
    private $valid_methods = array("GET", "POST");

    function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->full_uri = "http://" . $_SERVER["SERVER_NAME"] . "/" . $_SERVER["REQUEST_URI"];

        if (in_array($this->method, $this->valid_methods)) {
            $this->isValid = true;
            $this->set_params();

            if ($this->method == "POST") {
                $this->set_post_body();
            }
        } else {
            $this->isValid = false;
        }
    }

    function set_params() {
        $PARAM = array();
        foreach ($_GET as $param_name => $param_val) {
            $PARAM[htmlspecialchars($param_name)] = htmlspecialchars($param_val);
        }
        $this->param = $PARAM;
    }

    function set_post_body() {
        $POST = array();
        foreach ($_POST as $param_name => $param_val) {
            $POST[htmlspecialchars($param_name)] = $param_val;
        }
        $this->postBody = $POST;
    }

    function get_post_body() {
        return $this->postBody;
    }

    function get_request_breadcrumbs() {
        return str_split($this->full_uri);
    }
}