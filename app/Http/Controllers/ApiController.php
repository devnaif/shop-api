<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
class ApiController extends Controller
{
    private $statusCode = 200;
    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    /**
     * @param mixed $statusCode
     * @return $this
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
    public function respondNotFound($message = 'Not found!')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }
    public function respondInvalidRequest($message = 'Invalid request!')
    {
        return $this->setStatusCode(400)->respondWithError($message);
    }
    public function respondInternalError($message = 'Internal error!')
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }
    public function respondCreated($message = 'Created successfully!')
    {
        return $this->setStatusCode(201)->respondWithError($message);
    }
    public function respondDeleted($message = 'Deleted successfully!')
    {
        return $this->setStatusCode(201)->respondWithError($message);
    }
    public function respondWithPagination($paginator, $items)
    {
        $data = array(
            'data'      => $items,
            'paginator'  => [
                'total_count'   => $paginator->total(),
                'limit'         => (Integer)$paginator->perPage(),
                'current_page'  => $paginator->currentPage(),
                'total_pages'   => ceil( $paginator->total() / $paginator->perPage() )
            ]
        );
        return $this->respond($data);
    }
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message'   => $message
            ]
        ]);
    }
}