<?php

namespace TheCometCult\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('TheCometCultCommunityBundle:Home:index.html.twig');
    }
}
