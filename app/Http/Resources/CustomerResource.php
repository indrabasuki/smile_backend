<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public static $wrap = null;
    public $status;
    public $type;
    public $message;

    public function __construct($resource, $type, $status, $message)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
        $this->type = $type;
    }
    public function toArray($request)
    {
        return [
            'status'        => $this->status,
            'type'          => $this->type,
            'customer'      => $this->resource,
            'message'       => $this->message,
        ];
    }
}
