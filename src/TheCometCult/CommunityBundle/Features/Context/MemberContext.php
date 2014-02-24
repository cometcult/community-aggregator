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

            $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
            $dm->persist($member);
            $dm->flush();
        }
    }

    protected function getContainer()
    {
        return $this->getMainContext()->getContainer();
    }
}
