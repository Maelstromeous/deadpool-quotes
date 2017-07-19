<?php

namespace AppBundle\Entity;

class Quote
{
    private $id;
    private $quote;
    private $added;

    public function getId()
    {
        return $this->id;
    }

    public function setId($val)
    {
        $this->id = $val;
    }

    public function getQuote()
    {
        return $this->quote;
    }

    public function setQuote($val)
    {
        $this->quote = $val;
    }

    public function getAdded()
    {
        return $this->added;
    }

    public function setAdded($val)
    {
        $this->added = $val;
    }
}