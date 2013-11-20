<?php
/**
 * Created by PhpStorm.
 * File: TestController.php
 * User: Yuriy Tarnavskiy
 * Date: 17.11.13
 * Time: 17:13
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\Lesson6Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Etheriq\Lesson6Bundle\Model\LoadDataToBD;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

class MainDbController extends Controller
{
    public function showBranchIdAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $currentBranch = $em->getRepository('EtheriqLesson6Bundle:Branch')->find($id);

        if (!$currentBranch)
        {
            throw new \Exception("branch with id $id not found");
        }

        return $this->render('EtheriqLesson6Bundle:Pages:showDb.html.twig', array('branch' => $currentBranch));
    }

    public function showAllBranchAction()
    {
        $branch = $this->getDoctrine()->getRepository('EtheriqLesson6Bundle:Branch')->findAll();

        return $this->render('EtheriqLesson6Bundle:Pages:showDb.html.twig', array('data' => $branch));
    }

    public function showTopicByIdAction($id)   // render
    {
        $topics = $this->getDoctrine()->getRepository('Etheriq\Lesson6Bundle\Entity\Topic')->findBy(
            array('branch'=>$id)
        );

        return $this->render('EtheriqLesson6Bundle:Pages:showTopics.html.twig', array('topic' => $topics));
    }

    public function showTopicIdAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $topic = $em->getRepository('EtheriqLesson6Bundle:Topic')->find($id);

        if (!$topic)
        {
            throw new \Exception("Topic with id $id not found");
        }

        return $this->render('EtheriqLesson6Bundle:Pages:showTopicDetail.html.twig', array('topic' => $topic));
    }

    public function loadFromModelAction()
    {
        $load = new LoadDataToBD();
        $load->initBD($this->getDoctrine()->getManager());

        return new RedirectResponse($this->generateUrl('etheriq_lesson6_showDb'));
    }

    public function loadFixtureAction()
    {
            $loader = new Loader();
            $loader->loadFromDirectory(__DIR__ . '/../DataFixtures/ORM');

            $purger = new ORMPurger();
            $executor = new ORMExecutor($this->getDoctrine()->getManager(), $purger);
            $executor->execute($loader->getFixtures());

        return new RedirectResponse($this->generateUrl('etheriq_lesson6_showDb'));
    }
}