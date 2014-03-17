<?php

namespace TheCometCult\CommunityBundle\Features\Context;

use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\BehaviorException;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;

use TheCometCult\CommunityBundle\Document\Member;

/**
 * MemberContext
 */
class MemberContext extends BehatContext
{
    protected $communityMembers = array();
    /**
     * @Given /^there are community members:$/
     */
    public function thereAreCommunityMembers(TableNode $table)
    {
        foreach ($table->getHash() as $memberData) {
            $member = new Member();
            if (!empty($memberData['name'])) {
                $member->setName($memberData['name']);
            }

            if (!empty($memberData['age'])) {
                $member->setAge($memberData['age']);
            }

            if (!empty($memberData['fb_id'])) {
                $member->setFbId($memberData['fb_id']);
            }

            if (!empty($memberData['bio'])) {
                $member->setBio($memberData['bio']);
            }

            if (!empty($memberData['homeland'])) {
                $member->setHomeland($memberData['homeland']);
            }

            if (!empty($memberData['occupancy'])) {
                $member->setOccupancy($memberData['occupancy']);
            }

            if (!empty($memberData['website_url'])) {
                $member->setWebsiteUrl($memberData['website_url']);
            }

            $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
            $dm->persist($member);
            $dm->flush();
            array_push($this->communityMembers, $member);
        }
    }

    /**
     * @Then /^new member should not be added$/
     */
    public function newMemberShouldNotBeAdded()
    {
        $members = $this->getContainer()
            ->get('doctrine_mongodb')
            ->getRepository('TheCometCultCommunityBundle:Member')
            ->findAll();

        foreach ($members as $member) {
            if (!in_array($member, $this->communityMembers)) {
                throw new BehaviorException("New member was added");
            }
        }
    }

    protected function getContainer()
    {
        return $this->getMainContext()->getContainer();
    }
}
