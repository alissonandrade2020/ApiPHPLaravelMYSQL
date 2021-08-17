<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * Getting ID in URL to validate UPDATE
     */
    public function getRegisterId()
    {
        return (isset($this->segments()[3]) ? $this->segments()[3] : null);
    }
}
