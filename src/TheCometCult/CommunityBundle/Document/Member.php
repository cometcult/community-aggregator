<?php

namespace TheCometCult\CommunityBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @MongoDB\Document(repositoryClass="TheCometCult\CommunityBundle\Repository\MemberRepository")
 * @MongoDBUnique(fields="fbId", message="Sorry, it seems you're already registered. Thanks for the support!")
 */
class Member
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\String
     * @Assert\NotBlank(message="Please supply a name")
     */
    protected $name;

    /**
     * @MongoDB\Int
     * @Assert\NotBlank(message="Please supply your age")
     */
    protected $age;

    /**
     * @MongoDB\String
     * @Assert\NotBlank(message="Please connect with Facebook account")
     */
    protected $fbId;

    /**
     * @MongoDB\String
     * @Assert\NotBlank(message="Please supply a short bio")
     */
    protected $bio;

    /**
     * @MongoDB\String
     * @Assert\NotBlank(message="Please supply your homeland")
     */
    protected $homeland;

    /**
     * @MongoDB\String
     * @Assert\NotBlank(message="Please supply your occupancy")
     */
    protected $occupancy;

    /**
     * @MongoDB\String
     */
    protected $websiteUrl;

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

    /**
     * @param string $websiteUrl
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    }

    /**
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }
}
