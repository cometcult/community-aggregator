<?php

namespace spec\TheCometCult\CommunityBundle\Repository;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MemberRepositorySpec extends ObjectBehavior
{
    /**
     * @param Doctrine\ODM\MongoDB\DocumentManager $dm
     * @param Doctrine\ODM\MongoDB\UnitOfWork $uow
     * @param Doctrine\ODM\MongoDB\Mapping\ClassMetadata $classMetadata
     */
    function let($dm, $uow, $classMetadata)
    {
        $this->beConstructedWith($dm, $uow, $classMetadata);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('TheCometCult\CommunityBundle\Repository\MemberRepository');
    }

    /**
     * @param Doctrine\ODM\MongoDB\DocumentManager $dm
     * @param Doctrine\ODM\MongoDB\Query\Builder $qb
     * @param Doctrine\MongoDB\Query\Query $query
     * @param Doctrine\MongoDB\EagerCursor $cursor
     */
    function it_should_count_all_members($dm, $qb, $query, $cursor)
    {
        $dm->createQueryBuilder(Argument::any())->willReturn($qb);
        $qb->getQuery()->shouldBeCalled()->willReturn($query);
        $query->count()->willReturn(5);

        $this->countAll()->shouldReturn(5);
    }
}
