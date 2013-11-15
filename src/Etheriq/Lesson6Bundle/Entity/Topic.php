<?php
/**
 * Created by PhpStorm.
 * File: Topic.php
 * User: Yuriy Tarnavskiy
 * Date: 15.11.13
 * Time: 12:43
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\Lesson6Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Topic
 * @package Etheriq\Lesson6Bundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="topic")
 */
class Topic
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $titleTopic;

    /**
     * @ORM\Column(type="date")
     */
    protected $dateTopic;

    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $autorTopic;

    /**
     * @ORM\Column(type="text")
     */
    protected $textTopic;

    /**
     * @ORM\OneToMany(targetEntity="Branch", mappedBy="topics")
     * @ORM\Column(name="branch_id")
     */
    protected $topics;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titleTopic
     *
     * @param string $titleTopic
     * @return Topic
     */
    public function setTitleTopic($titleTopic)
    {
        $this->titleTopic = $titleTopic;
    
        return $this;
    }

    /**
     * Get titleTopic
     *
     * @return string 
     */
    public function getTitleTopic()
    {
        return $this->titleTopic;
    }

    /**
     * Set dateTopic
     *
     * @param \DateTime $dateTopic
     * @return Topic
     */
    public function setDateTopic($dateTopic)
    {
        $this->dateTopic = $dateTopic;
    
        return $this;
    }

    /**
     * Get dateTopic
     *
     * @return \DateTime 
     */
    public function getDateTopic()
    {
        return $this->dateTopic;
    }

    /**
     * Set autorTopic
     *
     * @param string $autorTopic
     * @return Topic
     */
    public function setAutorTopic($autorTopic)
    {
        $this->autorTopic = $autorTopic;
    
        return $this;
    }

    /**
     * Get autorTopic
     *
     * @return string 
     */
    public function getAutorTopic()
    {
        return $this->autorTopic;
    }

    /**
     * Set textTopic
     *
     * @param string $textTopic
     * @return Topic
     */
    public function setTextTopic($textTopic)
    {
        $this->textTopic = $textTopic;
    
        return $this;
    }

    /**
     * Get textTopic
     *
     * @return string 
     */
    public function getTextTopic()
    {
        return $this->textTopic;
    }

    /**
     * Set topics
     *
     * @param string $topics
     * @return Topic
     */
    public function setTopics($topics)
    {
        $this->topics = $topics;
    
        return $this;
    }

    /**
     * Get topics
     *
     * @return string 
     */
    public function getTopics()
    {
        return $this->topics;
    }
}