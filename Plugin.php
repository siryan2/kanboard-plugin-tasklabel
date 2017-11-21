<?php

namespace Kanboard\Plugin\Tasklabel;

use Kanboard\Core\Translator;
use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\Tasklabel\Model\TasklabelColorModel;

class Plugin extends Base
{
    public function initialize() {
        $container = $this->container;

        // Unfortunally, we cannot set the default colors because of a missing Setter-Function
        // Thus, we need to change the default_colors in ColorModel to "protected".
        // This is not safe for updates!
        $this->container['colorModel'] = $this->container->factory(function ($c) {
            return new TasklabelColorModel($c);
        });
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
        return '0.2.0';
    }

    public function getPluginHomepage() {
        return 'https://github.com/siryan2/kanboard-plugin-tasklabel';
    }
}
