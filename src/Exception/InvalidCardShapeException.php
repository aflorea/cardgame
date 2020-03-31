<?php


namespace App\Exception;


use Throwable;

class InvalidCardShapeException extends \Exception
{
    /**
     * InvalidCardShapeException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "Invalid card shape provided", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * String representation of the object
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s:%s(%s)', __CLASS__, $this->message, $this->code);
    }
}