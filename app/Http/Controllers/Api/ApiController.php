<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller {

    /**
     * @var
     */
    protected $statusCode = 200;

    public function __construct() {
        parent::__construct();
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param string $message
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondNotFound($message = 'Not Found') {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondOK($data, $message = 'OK') {
        return $this->setStatusCode(200)->respondWithSuccess($data, $message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondUnauthorized($message = 'Unauthorized') {
        return $this->setStatusCode(401)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondAccessDenied($message = 'Access Denied') {
        return $this->setStatusCode(403)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondBadRequest($message = 'Bad Request') {
        return $this->setStatusCode(400)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondInternalError($message = 'Internal Server Error') {
        return $this->setStatusCode(500)->respondWithError($message);
    }

    /**
     * @param $message
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    private function respondWithSuccess($data, $message) {
        return $this->respond([
            'code'    => $this->getStatusCode(),
            'message' => $message,
            'data'    => $data,
        ]);
    }

    /**
     * @param $message
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    private function respondWithError($message) {
        return $this->respond([
            'code'    => $this->getStatusCode(),
            'message' => $message,
        ]);
    }

    /**
     * @param $data
     * @param array $headers
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    private function respond($data, $headers = []) {
        return response($data, $this->getStatusCode(), $headers);
    }

}
