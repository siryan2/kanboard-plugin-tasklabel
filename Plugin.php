<?php

namespace Kanboard\Plugin\Tasklabel;

use Kanboard\Core\Translator;
use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\Tasklabel\Model\TasklabelColorModel;

class Plugin extends Base
{
    public function initialize() {
        $container = $this->container;

        $this->container['colorModel'] = $this->container->factory(function ($c) {
            return new TasklabelColorModel($c);
        });

        // Unfortunally, we cannot set the default colors because of a missing Setter-Function
        // Thus, we need to change the default_colors in ColorModel to "protected".
        // This is not safe for updates!
    }

    public function onStartup() {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getClasses() {
        return array(
            'Plugin\Tasklabel\Model' => array(
                'TasklabelColorModel',
            )
        );
    }

    public function getPluginName() {
        return 'Tasklabel';
    }

    public function getPluginDescription() {
        return t('This plugin add new Color names to represent the current state.');
    }

    public function getPluginAuthor() {
        return 'Yannick Herzog';
    }

    public function getPluginVersion() {
        return '0.1.0';
    }

    public function getPluginHomepage() {
        return 'https://github.com/siryan2/kanboard-plugin-tasklabel';
    }

    /**
     * Normally, we can use this array the extend default_colors
     * @var array
     */
    private $new_default_colors = array(
        'red task_open' => array(
            'name' => 'Task open',
            'background' => 'rgb(255, 187, 187)',
            'border' => 'rgb(255, 151, 151)',
        ),
        'blue task_in_process' => array(
            'name' => 'Task in process',
            'background' => 'rgb(219, 235, 255)',
            'border' => 'rgb(168, 207, 255)',
        ),
        'yellow task_test_dev' => array(
            'name' => 'Task Test DEV',
            'background' => 'rgb(245, 247, 196)',
            'border' => 'rgb(223, 227, 45)',
        ),
        'purple task_update_prod' => array(
            'name' => 'Task Update PROD',
            'background' => 'rgb(223, 176, 255)',
            'border' => 'rgb(205, 133, 254)',
        ),
        'green task_done' => array(
            'name' => 'Task done',
            'background' => 'rgb(189, 244, 203)',
            'border' => 'rgb(74, 227, 113)',
        ),
        'brown actually_not_neccessary' => array(
            'name' => 'Actually not neccessary',
            'background' => '#d7ccc8',
            'border' => '#4e342e',
        ),
        'yellow' => array(
            'name' => 'Yellow',
            'background' => 'rgb(245, 247, 196)',
            'border' => 'rgb(223, 227, 45)',
        ),
        'blue' => array(
            'name' => 'Blue',
            'background' => 'rgb(219, 235, 255)',
            'border' => 'rgb(168, 207, 255)',
        ),
        'green' => array(
            'name' => 'Green',
            'background' => 'rgb(189, 244, 203)',
            'border' => 'rgb(74, 227, 113)',
        ),
        'purple' => array(
            'name' => 'Purple',
            'background' => 'rgb(223, 176, 255)',
            'border' => 'rgb(205, 133, 254)',
        ),
        'red' => array(
            'name' => 'Red',
            'background' => 'rgb(255, 187, 187)',
            'border' => 'rgb(255, 151, 151)',
        ),
        'orange' => array(
            'name' => 'Orange',
            'background' => 'rgb(255, 215, 179)',
            'border' => 'rgb(255, 172, 98)',
        ),
        'grey' => array(
            'name' => 'Grey',
            'background' => 'rgb(238, 238, 238)',
            'border' => 'rgb(204, 204, 204)',
        ),
        'brown' => array(
            'name' => 'Brown',
            'background' => '#d7ccc8',
            'border' => '#4e342e',
        ),
        'deep_orange' => array(
            'name' => 'Deep Orange',
            'background' => '#ffab91',
            'border' => '#e64a19',
        ),
        'dark_grey' => array(
            'name' => 'Dark Grey',
            'background' => '#cfd8dc',
            'border' => '#455a64',
        ),
        'pink' => array(
            'name' => 'Pink',
            'background' => '#f48fb1',
            'border' => '#d81b60',
        ),
        'teal' => array(
            'name' => 'Teal',
            'background' => '#80cbc4',
            'border' => '#00695c',
        ),
        'cyan' => array(
            'name' => 'Cyan',
            'background' => '#b2ebf2',
            'border' => '#00bcd4',
        ),
        'lime' => array(
            'name' => 'Lime',
            'background' => '#e6ee9c',
            'border' => '#afb42b',
        ),
        'light_green' => array(
            'name' => 'Light Green',
            'background' => '#dcedc8',
            'border' => '#689f38',
        ),
        'amber' => array(
            'name' => 'Amber',
            'background' => '#ffe082',
            'border' => '#ffa000',
        ),
    );
}
