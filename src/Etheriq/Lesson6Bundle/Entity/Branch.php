<?php
/**
 * Created by PhpStorm.
 * File: Branch2.php
 * User: Yuriy Tarnavskiy
 * Date: 19.11.13
 * Time: 21:31
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\Lesson6Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 *
 * @ORM\Entity
 * @ORM\Table(name="branch2")
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
     * @ORM\OneToMany(targetEntity="Topic", mappedBy="branch")
     */
    protected $topics;

    /**
     * @ORM\OneToMany(targetEntity="Branch", mappedBy="parent")
     */
    protected  $childrens;

    /**
     * @ORM\ManyToOne(targetEntity="Branch", inversedBy="childrens")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected  $parent;

    public function __construct()
    {
        $this->childrens = new ArrayCollection();
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

    /**
     * Add childrens
     *
     * @param \Etheriq\Lesson6Bundle\Entity\Branch $childrens
     * @return Branch
     */
    public function addChildren(\Etheriq\Lesson6Bundle\Entity\Branch $childrens)
    {
        $this->childrens[] = $childrens;
    
        return $this;
    }

    /**
     * Remove childrens
     *
     * @param \Etheriq\Lesson6Bundle\Entity\Branch $childrens
     */
    public function removeChildren(\Etheriq\Lesson6Bundle\Entity\Branch $childrens)
    {
        $this->childrens->removeElement($childrens);
    }

    /**
     * Get childrens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildrens()
    {
        return $this->childrens;
    }

    /**
     * Set parent
     *
     * @param \Etheriq\Lesson6Bundle\Entity\Branch $parent
     * @return Branch
     */
    public function setParent(\Etheriq\Lesson6Bundle\Entity\Branch $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Etheriq\Lesson6Bundle\Entity\Branch
     */
    public function getParent()
    {
        return $this->parent;
    }
}