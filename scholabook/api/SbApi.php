<?php
/**
 * Class: SbApi
 * Description: Use to send api request to scholabook api service
 * 
 * Author: https://github.com/rahaman-m
 */
class SbApi {
    public $accessToken;
    public $instituteId;

    protected $response;

    public $initError;
    public $getError;

    public function __construct()
    {
        $this->accessToken  = get_option('sb_access_token');
        $this->instituteId  = get_option('sb_institute_id');

        if(empty($this->accessToken) || empty($this->instituteId)) {
            $this->initError   = '<b>Access token</b> and/or <b>Institute Id</b> not available, please set it from admin panel to use SB APIs.';
        }
    }

    public function postData(string $command, array $postData) {
        if(!empty($this->initError)) {
            $error  = new stdClass;
            $error->status  = 'error';
            $error->message  = $this->initError;
            return $error;
        }
        // return $postData;

        $rawResponse    = $this->_sendRequest($command, $postData);
        $this->response   = json_decode($rawResponse);
        return $this->response;
    }

    private function _sendRequest(string $command, array $param) {

        // Send the POST request with cURL
        $url = "https://scholabook.com/api/inst/{$command}";

        // authorization header with access token
        $authorization  = "Authorization: Bearer ".$this->accessToken;
        $param["institute_id"]  = $this->instituteId;
        $param  = json_encode($param);

        // Initialize handle
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_HTTPHEADER => ['Content-Type: application/json' , $authorization],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $param,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 60
        ]);

        $rawResponse = curl_exec($ch);
        // $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($rawResponse === false) {
            $this->getError = 'Failed to connect to the Scholabook service: ' . $error;
            throw new Exception($this->getError);
        }

        return $rawResponse;
    }
}