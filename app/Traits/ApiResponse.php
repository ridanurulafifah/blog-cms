<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{
    public function retrieveResponse($status = true, $message = null, mixed $data = null, $code = Response::HTTP_OK)
    {
        return $this->responseHandle(status: $status, message: $message, data: $data, code: $code = Response::HTTP_OK);
    }

    private function responseHandle(bool $status, string $message = null, mixed $data = null, int $code = Response::HTTP_OK)
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data?->response()->getData(true),
        ];
        return response($response, $code);
    }
}
