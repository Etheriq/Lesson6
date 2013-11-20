<?php
/**
 * Created by PhpStorm.
 * File: LoadTopicData.php
 * User: Yuriy Tarnavskiy
 * Date: 20.11.13
 * Time: 14:59
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\Lesson6Bundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Etheriq\Lesson6Bundle\Entity\Topic;

class LoadTopicData extends AbstractFixture implements OrderedFixtureInterface
{
    protected  $references = array();

    public function load(ObjectManager $manager)
    {
        $topicData = array(
            array(
                'title' => 'resolf.conf',
                'autor' => 'root',
                'text' => 'text',
                'branch' => 1
            ),
            array(
                'title' => 'sources.list',
                'autor' => 'root',
                'text' => 'text',
                'branch' => 2
            ),
            array(
                'title' => 'sources.list.save',
                'autor' => 'xeon',
                'text' => 'text',
                'branch' => 2
            ),
            array(
                'title' => 'notes',
                'autor' => 'root',
                'text' => 'text',
                'branch' => 5
            ),
            array(
                'title' => 'vmcoreinfo',
                'autor' => 'root',
                'text' => 'text',
                'branch' => 5
            ),
            array(
                'title' => 'index.html',
                'autor' => 'xeon',
                'text' => '<b> Hello Word </b>',
                'branch' => 7
            )
        );

        foreach ($topicData as $topicItem)
        {
            $topic = new Topic();

            $topic->setTitleTopic($topicItem['title']);
            $dateTopic = new \DateTime();
            $dateTopic->setDate(mt_rand(2000, 2012), mt_rand(1,12), mt_rand(1,30));
            $topic->setDateTopic($dateTopic);
            $topic->setAutorTopic($topicItem['autor']);
            $topic->setTextTopic($topicItem['text']);
            $topic->setBranch($this->getReference('idt'));

            $manager->persist($topic);
            //$this->setReference('branch', $topic);
        }

        $manager->flush();
    }
/*
    public function addReference($name, $object)
    {
        if (isset($this->references[$name])) {
            throw new \BadMethodCallException("Reference to: ({$name}) already exists, use method setReference in order to override it");
        }
        $this->setReference($name, $object);
    }
*/
    public function getOrder()
    {
        return 2;
    }

} 