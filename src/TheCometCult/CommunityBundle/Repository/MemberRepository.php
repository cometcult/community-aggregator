<?php

namespace TheCometCult\CommunityBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

class MemberRepository extends DocumentRepository
{
    public function countAll()
    {
        return $this->createQueryBuilder()
            ->getQuery()
            ->count();
    }
}
