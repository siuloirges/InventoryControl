<?php
namespace App\ValueObject;

class ContactVO
{

    private $id;
    private $names;
    private $lastNames;
    private $contactOne;
    private $contactTwo;
    private $emailOne;
    private $emailTwo;
    private $departmentId;
    private $municipalityId;
    private $address;
    private $description;

    /**
     * Contact constructor.
     * @param $id
     * @param $names
     * @param $lastNames
     * @param $contactOne
     * @param $contactTwo
     * @param $emailOne
     * @param $emailTwo
     * @param $departmentId
     * @param $municipalityId
     * @param $address
     * @param $description
     */

    public function __construct($id, $names, $lastNames, $contactOne, $contactTwo, $emailOne, $emailTwo, $departmentId, $municipalityId, $address, $description)
    {
        $this->id = $id;
        $this->names = $names;
        $this->lastNames = $lastNames;
        $this->contactOne = $contactOne;
        $this->contactTwo = $contactTwo;
        $this->emailOne = $emailOne;
        $this->emailTwo = $emailTwo;
        $this->departmentId = $departmentId;
        $this->municipalityId = $municipalityId;
        $this->address = $address;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @return mixed
     */
    public function getLastNames()
    {
        return $this->lastNames;
    }

    /**
     * @return mixed
     */
    public function getContactOne()
    {
        return $this->contactOne;
    }

    /**
     * @return mixed
     */
    public function getContactTwo()
    {
        return $this->contactTwo;
    }

    /**
     * @return mixed
     */
    public function getEmailOne()
    {
        return $this->emailOne;
    }

    /**
     * @return mixed
     */
    public function getEmailTwo()
    {
        return $this->emailTwo;
    }

    /**
     * @return mixed
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * @return mixed
     */
    public function getMunicipalityId()
    {
        return $this->municipalityId;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }


}
