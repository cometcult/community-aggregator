<?php

namespace TheCometCult\CommunityBundle\Manager;

use Doctrine\ODM\MongoDB\DocumentManager;

use TheCometCult\CommunityBundle\Document\Member;

interface MemberManagerInterface
{
    /**
     * @param string $name
     * @param string $age
     * @param string $fbId
     * @param string $bio
     * @param string $homeland
     * @param string $occupancy
     *
     * @return Member
     */
    public function create($name, $age, $fbId, $bio, $homeland, $occupancy);
}
