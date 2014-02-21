<?php

namespace TheCometCult\CommunityBundle\Features\Context;

use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\BehaviorException;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;

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
        $memberManager = $this->getContainer()->get('the_comet_cult_community.member_manager');
        foreach ($table->getHash() as $member) {
            $memberManager->create(
                $member['name'],
                $member['age'],
                $member['fb_id'],
                $member['bio'],
                $member['homeland'],
                $member['occupancy']
            );
        }
    }

    protected function getContainer()
    {
        return $this->getMainContext()->getContainer();
    }
}
