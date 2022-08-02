<?php

/*
 * @copyright   2018 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
return [
    'name'        => 'Tutorials',
    'description' => 'Mautic Guided Tutorials',
    'version'     => '1.0',
    'author'      => 'Joey Keller',
    'routes' => [
        'api' => [
            'mautic_api_tutorials' => [
                'standard_entity' => true,
                'name'            => 'tutorials',
                'path'            => '/tutorials',
                'controller'      => 'MauticTutorialsBundle:Api\Tutorials',
            ],
            'mautic_api_tutorials_version' => [
                'path'       => '/tutorials/all',
                'controller' => 'MauticTutorialsBundle:Api\Tutorials:getAll',
                'method'     => 'GET',
            ],
        ],
    ],

        'integrations' => [
            'mautic.integration.tutorials' => [
                'class' => \MauticPlugin\MauticTutorialsBundle\Integration\MauticTutorialsIntegration::class,
                'arguments' => [
                    'request_stack',
                    'translator',
                    'mautic.plugin.model.integration_entity',
                ],
            ],
        ],

    'services' => [
        'models' => [
            'mautic.apitutorials.model.tutorial' => [
                'class' => MauticPlugin\MauticTutorialsBundle\Model\TutorialModel::class,
                'arguments' => []
            ]
        ]
    ]
];
