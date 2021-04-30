<?php


namespace App\Http\Controllers;


class ApiController
{
    /**
     * Send a 200 OK response.
     *
     * @param $data
     *
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseOk($data = null, $message = null)
    {
        return $this->setStatus(200)->response($data, $this->status, $message);
    }

    /**
     * Status Number.
     *
     * @var int
     */
    private $status;

    /**
     * Return a response wrapper.
     *
     * @param null $data
     * @param int $status
     *
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($data = null, $status = 200, $message = null)
    {
        return response()->json([
            'code' => 100,
            'message' => $message,
            'data' => $data,
            'status' => $status
        ]);
    }

    /**
     * Set the status with the given number.
     *
     * @param  int  $status
     *
     * @return $this
     */
    protected function setStatus(int $status)
    {
        $this->status = $status;

        return $this;
    }
}
