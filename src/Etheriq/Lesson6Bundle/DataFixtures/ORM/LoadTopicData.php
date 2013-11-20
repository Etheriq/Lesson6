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
                'data' => '2013-11-03',
                'autor' => 'root',
                'text' => 'text',
                'branch' => 1
            ),
            array(
                'title' => 'sources.list',
                'data' => '2013-10-12',
                'autor' => 'root',
                'text' => 'text',
                'branch' => 2
            ),
            array(
                'title' => 'sources.list.save',
                'data' => '2013-10-26',
                'autor' => 'xeon',
                'text' => 'text',
                'branch' => 2
            ),
            array(
                'title' => 'notes',
                'data' => '2013-11-19',
                'autor' => 'root',
                'text' => 'text',
                'branch' => 5
            ),
            array(
                'title' => 'vmcoreinfo',
                'data' => '2013-09-03',
                'autor' => 'root',
                'text' => 'text',
                'branch' => 5
            ),
            array(
                'title' => 'index.html',
                'data' => '2013-11-11',
                'autor' => 'xeon',
                'text' => '<b> Hello Word </b>',
                'branch' => 7
            )
        );

        foreach ($topicData as $topicItem)
        {
            $topic = new Topic();

            $topic->setTitleTopic($topicItem['title']);
            $topic->setDateTopic($topicItem['data']);
            $topic->setAutorTopic($topicItem['autor']);
            $topic->setTextTopic($topicItem['text']);
            //$topic->setBranch($topicItem['branch']);

            $manager->persist($topic);
            //$this->setReference('branch_id', $topic);
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