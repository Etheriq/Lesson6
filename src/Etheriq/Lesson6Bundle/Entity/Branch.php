<?php
/**
 * Created by PhpStorm.
 * File: Branch.php
 * User: Yuriy Tarnavskiy
 * Date: 15.11.13
 * Time: 13:16
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\Lesson6Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Branch
 * @package Etheriq\Lesson6Bundle\Entity
 *
 *
 * @ORM\Entity
 * @ORM\table(name="branch")
 */
class Branch
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $titleBranch;

    /**
     * @ORM\OneToOne(targetEntity="Branch")
     * @ORM\JoinColumn(name="branch_id", referencedColumnName="id")
     */
    protected $parentBranch;

    /**
     * @ORM\OneToMany(targetEntity="Topic", mappedBy="topic")
     */
    protected $topics;

    public function __construct()
    {
        $this->topics = new ArrayCollection();
    }

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
     * Set titleBranch
     *
     * @param string $titleBranch
     * @return Branch
     */
    public function setTitleBranch($titleBranch)
    {
        $this->titleBranch = $titleBranch;
    
        return $this;
    }

    /**
     * Get titleBranch
     *
     * @return string 
     */
    public function getTitleBranch()
    {
        return $this->titleBranch;
    }

    /**
     * Set parentBranch
     *
     * @param \Etheriq\Lesson6Bundle\Entity\Branch $parentBranch
     * @return Branch
     */
    public function setParentBranch(\Etheriq\Lesson6Bundle\Entity\Branch $parentBranch = null)
    {
        $this->parentBranch = $parentBranch;
    
        return $this;
    }

    /**
     * Get parentBranch
     *
     * @return \Etheriq\Lesson6Bundle\Entity\Branch 
     */
    public function getParentBranch()
    {
        return $this->parentBranch;
    }

    /**
     * Add topics
     *
     * @param \Etheriq\Lesson6Bundle\Entity\Topic $topics
     * @return Branch
     */
    public function addTopic(\Etheriq\Lesson6Bundle\Entity\Topic $topics)
    {
        $this->topics[] = $topics;
    
        return $this;
    }

    /**
     * Remove topics
     *
     * @param \Etheriq\Lesson6Bundle\Entity\Topic $topics
     */
    public function removeTopic(\Etheriq\Lesson6Bundle\Entity\Topic $topics)
    {
        $this->topics->removeElement($topics);
    }

    /**
     * Get topics
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTopics()
    {
        return $this->topics;
    }
}