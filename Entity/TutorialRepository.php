<?php

namespace MauticPlugin\MauticTutorialsBundle\Entity;

use Mautic\CoreBundle\Entity\CommonRepository;
use Mautic\LeadBundle\Entity\Lead;


class TutorialRepository extends CommonRepository
{
    public function getTableAlias()
    {
        return 'tfs';
    }
}
