<?php
/**
 * Created by PhpStorm.
 * File: Printer.php
 * User: Yuriy Tarnavskiy
 * Date: 14.11.13
 * Time: 15:43
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\Lesson6Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Printer
 * @package Etheriq\Lesson6Bundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="printer")
 */

class Printer
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $modelPrinter;

    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $serialPrinter;

    /**
     * @ORM\Column(type="text")
     */
    protected $descriptionPrinter;

    /**
     * @ORM\ManyToOne(targetEntity="Cartridge", inversedBy="printers")
     * @ORM\JoinColumn(name="cartridge_id", referencedColumnName="id")
     */
    protected $cartridge;

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
     * Set modelPrinter
     *
     * @param string $modelPrinter
     * @return Printer
     */
    public function setModelPrinter($modelPrinter)
    {
        $this->modelPrinter = $modelPrinter;
    
        return $this;
    }

    /**
     * Get modelPrinter
     *
     * @return string 
     */
    public function getModelPrinter()
    {
        return $this->modelPrinter;
    }

    /**
     * Set serialPrinter
     *
     * @param string $serialPrinter
     * @return Printer
     */
    public function setSerialPrinter($serialPrinter)
    {
        $this->serialPrinter = $serialPrinter;
    
        return $this;
    }

    /**
     * Get serialPrinter
     *
     * @return string 
     */
    public function getSerialPrinter()
    {
        return $this->serialPrinter;
    }

    /**
     * Set descriptionPrinter
     *
     * @param string $descriptionPrinter
     * @return Printer
     */
    public function setDescriptionPrinter($descriptionPrinter)
    {
        $this->descriptionPrinter = $descriptionPrinter;
    
        return $this;
    }

    /**
     * Get descriptionPrinter
     *
     * @return string 
     */
    public function getDescriptionPrinter()
    {
        return $this->descriptionPrinter;
    }

    /**
     * Set cartridge
     *
     * @param \Etheriq\Lesson6Bundle\Entity\cartridge $cartridge
     * @return Printer
     */
    public function setCartridge(\Etheriq\Lesson6Bundle\Entity\cartridge $cartridge = null)
    {
        $this->cartridge = $cartridge;
    
        return $this;
    }

    /**
     * Get cartridge
     *
     * @return \Etheriq\Lesson6Bundle\Entity\cartridge 
     */
    public function getCartridge()
    {
        return $this->cartridge;
    }
}