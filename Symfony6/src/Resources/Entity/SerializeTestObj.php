<?php

namespace App\Resources\Entity;

use DateTimeInterface;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Annotation\SerializedName;

class SerializeTestObj
{
    /**
     * @var int $age
     */
    private $age;

    /**
     * @var string $firstName
     */
    private $firstName;

    /**
     * @var string $lastNames
     */
    private $lastNames;

    /**
     * @var DateTimeInterface $birthDate
     */
    private $birthDate;

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): SerializeTestObj
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return ($this->firstName) ?? '';
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): SerializeTestObj
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastNames(): string
    {
        return ($this->lastNames) ?? '';
    }

    /**
     * @return string
     */
    public function getFullName() : string {
        return $this->getFirstName() . ' ' . $this->getLastNames();
    }

    /**
     * @param string $lastNames
     */
    public function setLastNames(string $lastNames): SerializeTestObj
    {
        $this->lastNames = $lastNames;

        return $this;
    }

    /**
     * @return DateTimeInterface
     * @SerializedName("birthDateAndTime")
     */
    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    /**
     * @param DateTimeInterface $birthDate
     */
    public function setBirthDate(DateTimeInterface $birthDate): SerializeTestObj
    {
        $this->birthDate = $birthDate;

        return $this;
    }

}