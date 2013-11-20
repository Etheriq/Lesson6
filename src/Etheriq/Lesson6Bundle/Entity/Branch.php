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
 * @ORM\Table(name="branch")
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
     * @var
     *
     * @ORM\Column(type="integer")
     */
    protected $idBranchTmp;
    
    /**
     * @ORM\OneToMany(targetEntity="Topic", mappedBy="branch")
     */
    protected $topics;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $parent;


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
     * Set parent
     *
     * @param integer $parent
     * @return Branch
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
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
     * Set idBranchTmp
     *
     * @param integer $idBranchTmp
     * @return Branch
     */
    public function setIdBranchTmp($idBranchTmp)
    {
        $this->idBranchTmp = $idBranchTmp;
    
        return $this;
    }

    /**
     * Get idBranchTmp
     *
     * @return integer 
     */
    public function getIdBranchTmp()
    {
        return $this->idBranchTmp;
    }
}