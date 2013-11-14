<?php

namespace Etheriq\Lesson6Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EtheriqLesson6Bundle:Default:homePage.html.twig');
    }
}
