<?php
namespace MymmiJ\Shapes;

class ParamException extends \Exception
{
    private $previous;
    
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code);
        
        if (!is_null($previous))
        {
            $this->previous = $previous;
        }
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}

?>