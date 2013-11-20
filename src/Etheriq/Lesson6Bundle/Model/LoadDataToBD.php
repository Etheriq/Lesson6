<?php
/**
 * Created by PhpStorm.
 * File: LoadDataToBD.php
 * User: Yuriy Tarnavskiy
 * Date: 20.11.13
 * Time: 10:54
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\Lesson6Bundle\Model;

use Etheriq\Lesson6Bundle\Entity\Branch;
use Etheriq\Lesson6Bundle\Entity\Topic;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDataToBD
{
    public function initBD(ObjectManager $om)
    {

        $date = new \DateTime();
        $date->setDate(date('Y'), date('m'), date('d'));

        // Branches
        $etc = new Branch();
        $etc->setTitleBranch('etc');
        $etc->setParent(null);
        $etc->setIdBranchTmp(1);

        $apt = new Branch();
        $apt->setTitleBranch('apt');
        $apt->setIdBranchTmp(2);

        $sourcesListD = new Branch();
        $sourcesListD->setTitleBranch('sources.list.d');
        $sourcesListD->setIdBranchTmp(3);

        $sys = new Branch();
        $sys->setParent(null);
        $sys->setTitleBranch('sys');
        $sys->setIdBranchTmp(4);

        $kernel = new Branch();
        $kernel->setTitleBranch('kernel');
        $kernel->setIdBranchTmp(5);

        $var = new Branch();
        $var->setParent(null);
        $var->setTitleBranch('var');
        $var->setIdBranchTmp(6);

        $www = new Branch();
        $www->setTitleBranch('www');
        $www->setIdBranchTmp(7);

        //  topics
        $resolfConf = new Topic();
        $resolfConf->setTitleTopic('resolf.conf');
        $resolfConf->setAutorTopic('root');
        $resolfConf->setDateTopic($dateToBd = $date->setDate('2013', '11', '20'));
        $resolfConf->setTextTopic('text');
        $resolfConf->setBranch($etc);

        $sourcesList = new Topic();
        $sourcesList->setTitleTopic('sources.list');
        $sourcesList->setAutorTopic('root');
        $sourcesList->setDateTopic($dateToBd = $date->setDate('2013', '11', '22'));
        $sourcesList->setTextTopic('text');
        $sourcesList->setBranch($apt);

        $sourcesListSave = new Topic();
        $sourcesListSave->setTitleTopic('sources.list.save');
        $sourcesListSave->setAutorTopic('xeon');
        $sourcesListSave->setDateTopic($dateToBd = $date->setDate('2012', '12', '25'));
        $sourcesListSave->setTextTopic('text');
        $sourcesListSave->setBranch($apt);

        $notes = new Topic();
        $notes->setTitleTopic('notes');
        $notes->setAutorTopic('root');
        $notes->setDateTopic($dateToBd = $date->setDate('2013', '05', '15'));
        $notes->setTextTopic('text');
        $notes->setBranch($kernel);

        $vmCoreInfo = new Topic();
        $vmCoreInfo->setTitleTopic('vmcoreinfo');
        $vmCoreInfo->setAutorTopic('root');
        $vmCoreInfo->setDateTopic($dateToBd = $date->setDate('2013', '06', '05'));
        $vmCoreInfo->setTextTopic('text');
        $vmCoreInfo->setBranch($kernel);

        $indexHtml = new Topic();
        $indexHtml->setTitleTopic('index.html');
        $indexHtml->setAutorTopic('xeon');
        $indexHtml->setDateTopic($dateToBd = $date->setDate('2013', '11', '08'));
        $indexHtml->setTextTopic("<b>Hello Word </b>");
        $indexHtml->setBranch($www);

        // persist branches
        $om->persist($etc);
        $om->persist($apt);
        $om->persist($sourcesListD);
        $om->persist($sys);
        $om->persist($kernel);
        $om->persist($var);
        $om->persist($www);

        //persist topics
        $om->persist($resolfConf);
        $om->persist($sourcesList);
        $om->persist($sourcesListSave);
        $om->persist($notes);
        $om->persist($vmCoreInfo);
        $om->persist($indexHtml);

        $om->flush();

        $apt->setParent($etc->getId());
        $sourcesListD->setParent($apt->getId());
        $kernel->setParent($sys->getId());
        $www->setParent($var->getId());

        $om->persist($apt);
        $om->persist($sourcesListD);
        $om->persist($kernel);
        $om->persist($www);

        $om->flush();

    }
}
