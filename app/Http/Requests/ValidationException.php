<?php

namespace App\Http\Requests;

class ValidationException extends \Illuminate\Validation\ValidationException
{
    public $message;

    public function __construct($validator, $response = null, $errorBag = 'default')
    {
        parent::__construct($validator, $response = null, $errorBag);

        $this->message = 'ValidationError';
    }
}