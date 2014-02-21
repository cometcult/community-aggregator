<?php

namespace spec\TheCometCult\CommunityBundle\Manager;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MemberManagerSpec extends ObjectBehavior
{
    /**
     * @param Doctrine\ODM\MongoDB\DocumentManager $dm
     */
    function let($dm)
    {
    	$this->beConstructedWith($dm);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('TheCometCult\CommunityBundle\Manager\MemberManagerInterface');
    }

    function it_should_create_member()
    {
    	$this
    		->create('Michal', 13, '755560893', 'hello', 'Romania', 'UK')
    		->shouldHaveType('TheCometCult\CommunityBundle\Document\Member');
    }
}
