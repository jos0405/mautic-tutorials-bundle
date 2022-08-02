<?php

/*
 * @copyright   2014 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\MauticTutorialsBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class TutorialsIntegration.
 */
class TutorialsIntegration extends AbstractIntegration
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getName()
    {
        return 'Mautic Guided Tutorials';
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getIcon()
    {
        return 'plugins/MauticTutorialsBundle/Assets/img/whatsapp.png';
    }
}
