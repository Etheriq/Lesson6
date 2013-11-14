<?php
/**
 * Created by PhpStorm.
 * File: PrinterController.php
 * User: Yuriy Tarnavskiy
 * Date: 14.11.13
 * Time: 16:18
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\Lesson6Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etheriq\Lesson6Bundle\Entity\Printer;
use Etheriq\Lesson6Bundle\Entity\Cartridge;

class PrinterController extends Controller
{
    public function insertAction()
    {
        $cartridge = new Cartridge();
        $cartridge->setCartridgeName('Q5949A');

        $printer = new Printer();
        $printer->setModelPrinter('Hewlett Packard LaserJet 1320');
        $printer->setSerialPrinter('CJH76J55DQ');
        $printer->setDescriptionPrinter('Laser printer for busines');
        $printer->setCartridge($cartridge);

        $em = $this->getDoctrine()->getManager();
        $em->persist($cartridge);
        $em->persist($printer);
        $em->flush();

        return $this->render('EtheriqLesson6Bundle:Pages:insertPrinterData.html.twig', array(
            'printerName' =>$printer->getModelPrinter(),
            'idPrinter' => $printer->getId(),
            'idCartridge' => $cartridge->getId(),
            'cartridgeName' => $cartridge->getCartridgeName()
        ));
    }

} 