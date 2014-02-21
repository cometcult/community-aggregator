<?php

namespace TheCometCult\CommunityBundle\Manager;

use Doctrine\ODM\MongoDB\DocumentManager;

use TheCometCult\CommunityBundle\Document\Member;

class MemberManager implements MemberManagerInterface
{
    /**
     * @var DocumentManager
     */
    protected $dm;

    /**
     * @param DocumentManager $dm
     */
    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    /**
     * {@inheritDoc}
     */
    public function create($name, $age, $fbId, $bio, $homeland, $occupancy)
    {
        $member = new Member();

        $member->setName($name);
        $member->setAge($age);
        $member->setFbId($fbId);
        $member->setBio($bio);
        $member->setHomeland($homeland);
        $member->setOccupancy($occupancy);

        $this->dm->persist($member);
        $this->dm->flush();

        return $member;
    }
}
