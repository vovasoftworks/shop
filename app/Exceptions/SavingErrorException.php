<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class SavingErrorException extends ApiException
{
    public function __construct()
    {
        parent::__construct("Saving error", Response::HTTP_NOT_FOUND);
    }
}
