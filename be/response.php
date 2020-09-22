<?php

class response {
    function success($data) {
        header('Content-Type: application/json');
        $arr = [
            'message'   => isset($data['message']) ? $data['message'] : 'Request executed successfully.',
            'data'      => isset($data['data']) ? $data['data'] : [],
            'code'      => 200
        ];
        return json_encode($arr);
    }

    function error($data) {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        $arr = [
            'message'   => isset($data['message']) ? $data['message'] : 'Error executing request.',
            'data'      => isset($data['data']) ? $data['data'] : [],
            'code'      => 500
        ];
        die(json_encode($arr));
    }
}