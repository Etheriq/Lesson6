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
use Etheriq\Lesson6Bundle\Entity\Branch;
use Etheriq\Lesson6Bundle\Entity\Topic;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;


class TestDbController extends Controller
{
    protected $emm;

    public function testAction()
    {
        $em = $this->getDoctrine()->getManager();
        $date = new \DateTime();

        $branch1 = new Branch();  //            /usr
        $branch1->setTitleBranch('usr');

        $top2 = new Topic();
        $top2->setAutorTopic('Anna');
        $top2->setBranch($branch1);
        $top2->setDateTopic($date);
        $top2->setTextTopic('top2 text');
        $top2->setTitleTopic('top2 title');

        $branch2 = new Branch();  //            /usr/doc
        $branch2->setTitleBranch('doc');

        $top = new Topic();
        $top->setAutorTopic('Yuriy');
        $date->setDate(date('Y'), date('m'), date('d'));
        $top->setDateTopic($date);
        $top->setTextTopic('top0 text');
        $top->setTitleTopic('top0 title');
        $top->setBranch($branch2);

        $em->persist($branch1);
        $em->persist($branch2);
        $em->persist($top);
        $em->persist($top2);

//*********************************************

            $top1 = new Topic();
            $top1->setAutorTopic('Yuriy');
            $date->setDate(date('Y')-2, date('m')-1, date('d')+3);
            $top1->setDateTopic($date);
            $top1->setTextTopic('top1 text');
            $top1->setTitleTopic('top1 title');
            $top1->setBranch($branch2);
            $em->persist($top1);



        $branch3 = new Branch();  //            /usr/view
        $branch3->setTitleBranch('view');
            $top8 = new Topic();
            $top8->setAutorTopic('Anna8');
            $top8->setBranch($branch3);
            $top8->setDateTopic($date);
            $top8->setTextTopic('top8 text');
            $top8->setTitleTopic('top8 title');

        $em->persist($branch3);
        $em->persist($top8);

        $branch4 = new Branch();  //            /usr/view/default
        $branch4->setTitleBranch('default');
            $top3 = new Topic();
            $top3->setAutorTopic('Anna3');
            $top3->setBranch($branch4);
            $top3->setDateTopic($date);
            $top3->setTextTopic('top3 text');
            $top3->setTitleTopic('top3 title');
        $em->persist($branch4);
        $em->persist($top3);

        $branch5 = new Branch();  //            /usr/view/main
        $branch5->setTitleBranch('main');
            $top4 = new Topic();
            $top4->setAutorTopic('Anna4');
            $top4->setBranch($branch5);
            $top4->setDateTopic($date);
            $top4->setTextTopic('top4 text');
            $top4->setTitleTopic('top4 title');

            $top5 = new Topic();
            $top5->setAutorTopic('Anna5');
            $top5->setBranch($branch5);
            $top5->setDateTopic($date);
            $top5->setTextTopic('top5 text');
            $top5->setTitleTopic('top5 title');
        $em->persist($branch5);
        $em->persist($top4);
        $em->persist($top5);

        $branch6 = new Branch();  //            /src
        $branch6->setTitleBranch('src');

        $branch7 = new Branch();  //            /src/contr
        $branch7->setTitleBranch('contr');
            $top6 = new Topic();
            $top6->setAutorTopic('Anna6');
            $top6->setBranch($branch7);
            $top6->setDateTopic($date);
            $top6->setTextTopic('top6 text');
            $top6->setTitleTopic('top6 title');
        $em->persist($branch6);
        $em->persist($branch7);
        $em->persist($top6);

        $branch8 = new Branch();  //            /src/contr/default
        $branch8->setTitleBranch('default');
            $top7 = new Topic();
            $top7->setAutorTopic('Anna7');
            $top7->setBranch($branch8);
            $top7->setDateTopic($date);
            $top7->setTextTopic('top7 text');
            $top7->setTitleTopic('top7 title');
        $em->persist($branch8);
        $em->persist($top7);


        $em->flush();

        $branch1->setParentBranch($branch1->getId());
        $branch2->setParentBranch($branch1->getId());
        $branch3->setParentBranch($branch1->getId());
        $branch4->setParentBranch($branch3->getId());
        $branch5->setParentBranch($branch3->getId());
        $branch6->setParentBranch($branch1->getId());
        $branch7->setParentBranch($branch6->getId());
        $branch8->setParentBranch($branch7->getId());

        $em->flush();


    return $this->redirect('/les6/web/');



    }

    public function showTestAction()
    {
        /*
        $topics = $this->getDoctrine()->getRepository('EtheriqLesson6Bundle:Topic');  //->findAll();


        //*********************************************************
/*
        foreach ($topics as $key=>$item)
        {
            if ($key == 'id')
            {
                $topic = $this->getDoctrine()->getRepository('EtheriqLesson6Bundle:Branch')->find($item); //  findOneBy(array('id' => $item), null, 20);

                //$topic->

                //$branch = $topic->getTopics();

            }
        }
*/
  /*
        $topics = $this->getDoctrine()->getRepository('EtheriqLesson6Bundle:Branch')->findBy(array('id'));

        $qq = array();
        foreach ($topics as $item)
        {
            $qq[] = $item;
        }
*/

        // ***********************************************************************
        /*
        $em = $this->getDoctrine()->getManager();


        $top = $em->getRepository('EtheriqLesson6Bundle:Branch')->find(7);
        //$q=$top->getTopics();
        if (!$top)
        {
            throw new \Exception('branch not found');
        }

        $rez = array();
        foreach ($top->getTopics() as $topic)
        {
            $rez[] = $topic->getTitleTopic() . "\n\n";
        }
        */
        // ***********************************************************************

        $branch = $this->getDoctrine()->getManager()->getRepository('EtheriqLesson6Bundle:Branch')->findAll();
        /*
        $rez = array();
        foreach ($branch as $item)
        {
            $rez[] = $item->getId(); //." ".$item->getTitleTopic();
        }
*/
        //return new Response(var_dump($rez));
        return $this->render('EtheriqLesson6Bundle:Pages:test.html.twig', array('data' => $branch));
    }

    public function showAction()
    {
        $branch = $this->getDoctrine()->getRepository('EtheriqLesson6Bundle:Branch')->findAll();

        return $this->render('EtheriqLesson6Bundle:Pages:showDb.html.twig', array('data' => $branch));
    }

    public function showTopicByIdAction($id)
    {
        $topics = $this->getDoctrine()->getRepository('Etheriq\Lesson6Bundle\Entity\Topic')->findBy(
            array('branch'=>$id)
        );

        return $this->render('EtheriqLesson6Bundle:Pages:showTopics.html.twig', array('topic' => $topics));
    }

    public function showTopicIdAction($id)
    {
        $topic = $this->getDoctrine()->getRepository('EtheriqLesson6Bundle:Topic')->findBy(
            array('id'=>$id)
        );

        return $this->render('EtheriqLesson6Bundle:Pages:showTopicDetail.html.twig', array('topic' => $topic));
    }

} 