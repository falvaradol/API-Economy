<?php

namespace App\Entities\Core;

use App\Common\AppStatus;

final class Response
{
    public $data;
    public $status;
    public $message;

    public function __construct()
    {
        $this->status = AppStatus::Ok;
        $this->message = '';
    }   
}