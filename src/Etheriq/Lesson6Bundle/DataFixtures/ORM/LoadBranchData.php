<?php
/**
 * Created by PhpStorm.
 * File: LoadBranchData.php
 * User: Yuriy Tarnavskiy
 * Date: 20.11.13
 * Time: 14:34
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\Lesson6Bundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Etheriq\Lesson6Bundle\Entity\Branch;
use Etheriq\Lesson6Bundle\Entity\Topic;

class LoadBranchData extends AbstractFixture implements OrderedFixtureInterface
{
    protected  $references = array();

    public function load(ObjectManager $manager)
    {
        $branchData = array(
            array(
                'titleBranch' => 'etc',
                'parent' =>null,
                'idt' => 1
            ),
            array(
                'titleBranch' => 'apt',
                'parent' =>1,
                'idt' => 2
            ),
            array(
                'titleBranch' => 'sources.list.d',
                'parent' =>2,
                'idt' => 3
            ),
            array(
                'titleBranch' => 'sys',
                'parent' =>null,
                'idt' => 4
            ),
            array(
                'titleBranch' => 'kernel',
                'parent' =>4,
                'idt' => 5
            ),
            array(
                'titleBranch' => 'var',
                'parent' =>null,
                'idt' => 6
            ),
            array(
                'titleBranch' => 'www',
                'parent' =>6,
                'idt' => 7
            )
        );

        foreach ($branchData as $key => $branchItem)
        {
            $branch = new Branch();

            $branch->setTitleBranch($branchItem['titleBranch']);
            $branch->setParent($branchItem['parent']);
            $branch->setIdBranchTmp($branchItem['idt']);

            $manager->persist($branch);
            $this->setReference('idt', $branch);
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
        return 1;
    }
} 