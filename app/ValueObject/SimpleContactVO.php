<?php

namespace App\ValueObject;

/**
 * @class ContactVO
 * @package App\ValueObjects
 * @author Sergio Vega <sergioluisvega41@gmail.com>
 */
class SimpleContactVO
{

    /**
     * @var string
     */
    private $names;

    /**
     * @var string
     */
    private $contactOne;

    /**
     * @param string $names
     * @param string $contactOne
     */
    public function __construct(
        string $names,
        string    $contactOne
    ){
        $this->names = $names;
        $this->contactOne = $contactOne;
    }

    /**
     * @return string
     */
    public function getNames(): string
    {
        return $this->names;
    }

    /**
     * @return string
     */
    public function getContactOne(): string
    {
        return $this->contactOne;
    }

}
