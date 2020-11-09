<?php
class ApiView
{
    function response($data, $status)
    {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        echo json_encode($data);
    }
    function requestStatus($code)
    {
        $status = array(
            200 => "OK",
            201 => "Created",
            202 => "Accepted",
            401 => "Unauthorized",
            404 => "Not found",
            405 => "Method Not Allowed",
            500 => "Internal Server Error"
        );
        return (isset($status[$code])) ? $status[$code] : $status[500];
    }
}
