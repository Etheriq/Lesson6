<?php
/**
 * Created by PhpStorm.
 * File: Cartridge.php
 * User: Yuriy Tarnavskiy
 * Date: 14.11.13
 * Time: 16:48
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\Lesson6Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

 /**
 *
 * @ORM\Entity
 * @ORM\Table(name="cartridge")
 */
class Cartridge
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Printer", mappedBy="cartridge")
     */
    protected $cartridges;

    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $cartridgeName;

    public function __construct()
    {
        $this->cartridges = new ArrayCollection();
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
     * Add cartridges
     *
     * @param \Etheriq\Lesson6Bundle\Entity\Printer $cartridges
     * @return Cartridge
     */
    public function addCartridge(\Etheriq\Lesson6Bundle\Entity\Printer $cartridges)
    {
        $this->cartridges[] = $cartridges;
    
        return $this;
    }

    /**
     * Remove cartridges
     *
     * @param \Etheriq\Lesson6Bundle\Entity\Printer $cartridges
     */
    public function removeCartridge(\Etheriq\Lesson6Bundle\Entity\Printer $cartridges)
    {
        $this->cartridges->removeElement($cartridges);
    }

    /**
     * Get cartridges
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCartridges()
    {
        return $this->cartridges;
    }

    /**
     * Set cartridgeName
     *
     * @param string $cartridgeName
     * @return Cartridge
     */
    public function setCartridgeName($cartridgeName)
    {
        $this->cartridgeName = $cartridgeName;
    
        return $this;
    }

    /**
     * Get cartridgeName
     *
     * @return string 
     */
    public function getCartridgeName()
    {
        return $this->cartridgeName;
    }
}