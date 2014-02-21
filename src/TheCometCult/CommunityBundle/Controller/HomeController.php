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

        $this
            ->get('session')
            ->getFlashBag()
            ->add('members-counter', $membersNumber);

        return $this->render('TheCometCultCommunityBundle:Home:index.html.twig');
    }
}
