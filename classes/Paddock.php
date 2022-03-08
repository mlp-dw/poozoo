<?php

class Paddock extends Enclos{
    function __construct($data)
    {
        parent::__construct($data);

    }

    public function clean() {
        if ($this->cleanState > 0) $this->cleanState--;
    }


}
?>