<?php

namespace TheCometCult\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use TheCometCult\CommunityBundle\Form\Type\MemberType;
use TheCometCult\CommunityBundle\Document\Member;

class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        $member = new Member();
        $form = $this->createForm(new MemberType(), $member);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($member);
            $dm->flush();
            $this
                ->get('session')
                ->getFlashBag()
                ->add('notice', sprintf('You were added'));
        }

        $members = $this->get('doctrine_mongodb')
            ->getRepository('TheCometCultCommunityBundle:Member')
            ->findAll();

        $membersNumber = $this
            ->get('the_comet_cult_community.member_repository')
            ->countAll();

        return $this->render('TheCometCultCommunityBundle:Home:index.html.twig', array(
            'members' => $members,
            'membersNumber' => $membersNumber,
            'form' => $form->createView()
        ));
    }
}
