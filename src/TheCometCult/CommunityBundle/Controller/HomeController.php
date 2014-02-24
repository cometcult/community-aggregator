<?php

namespace TheCometCult\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $membersNumber = $this
            ->get('the_comet_cult_community.member_repository')
            ->countAll();

        $members = $this->get('doctrine_mongodb')
            ->getRepository('TheCometCultCommunityBundle:Member')
            ->findAll();

        return $this->render('TheCometCultCommunityBundle:Home:index.html.twig', array(
            'membersNumber' => $membersNumber,
            'members' => $members
        ));
    }
}
