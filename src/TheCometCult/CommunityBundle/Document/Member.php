<?php

namespace TheCometCult\CommunityBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;

/**
 * @MongoDB\Document(repositoryClass="TheCometCult\CommunityBundle\Repository\MemberRepository")
 * @MongoDBUnique(fields="fbId", message="Member already applied.")
 */
class Member
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\Int
     */
    protected $age;

    /**
     * @MongoDB\String
     */
    protected $fbId;

    /**
     * @MongoDB\String
     */
    protected $bio;

    /**
     * @MongoDB\String
     */
    protected $homeland;

    /**
     * @MongoDB\String
     */
    protected $occupancy;

    /**
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param string $fbId
     */
    public function setFbId($fbId)
    {
        $this->fbId = $fbId;
    }

    /**
     * @return string $fbId
     */
    public function getFbId()
    {
        return $this->fbId;
    }

    /**
     * @param string $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @return string $bio
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param string $homeland
     */
    public function setHomeland($homeland)
    {
        $this->homeland = $homeland;
    }

    /**
     * @return string $homeland
     */
    public function getHomeland()
    {
        return $this->homeland;
    }

    /**
     * @param string $occupancy
     */
    public function setOccupancy($occupancy)
    {
        $this->occupancy = $occupancy;
    }

    /**
     * @return string $occupancy
     */
    public function getOccupancy()
    {
        return $this->occupancy;
    }
}
