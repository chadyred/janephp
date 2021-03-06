<?php

namespace Jane\OpenApi3\Tests\Expected\Exception;

class GetTestBadRequestException extends \RuntimeException implements ClientException
{
    private $error;
    public function __construct(\Jane\OpenApi3\Tests\Expected\Model\Error $error)
    {
        parent::__construct('bad request', 400);
        $this->error = $error;
    }
    public function getError()
    {
        return $this->error;
    }
}