<?php
/*
 * Copyright 2014 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * @file The main file of Mibew:Boilerplate plugin.
 *
 * Plugin's class name, its namespace and file path must follow special naming
 * conventions. The name of the main plugin class should match pattern:
 * "\<Vendor Name>\Mibew\Plugin\<Plugin name>\Plugin". It should be placed in
 * "<mibew root>/plugins/<Vendor Name>/Mibew/Plugin/<Plugin name>/Plugin.php"
 * file. Names of vendor, plugin and directories/files are case sensitive!
 *
 * Notice that vendor and plugin names can contains only numbers and latin
 * letters and must start with a capitalized letter.
 *
 * Here are examples of good plugins names:
 *  - Abc:Xyz
 *  - Foo12:Bar
 *  - Acme:TheBestPlugin
 *
 * To configure the plugin add its configs to the "plugins" structure in
 * "<mibew root>/configs/config.yml" file. If the "plugins" structure looks
 * like:
 * <code>
 * plugins: []
 * </code>
 * it will become:
 * <code>
 * plugins:
 *     "Mibew:Boilerplate":
 *         very_important_value: "$3.50"
 * </code>
 *
 * To turn the plugin on navigate to "<Mibew Base URL>/operator/plugin" page and
 * enable the plugin.
 */

namespace Mibew\Mibew\Plugin\Boilerplate;

use Mibew\EventDispatcher\EventDispatcher;
use Mibew\EventDispatcher\Events;

/**
 * Defenition of the main plugin class.
 *
 * Plugin class must implements \Mibew\Plugin\PluginInterface and can extends
 * \Mibew\Plugin\AbstractPlugin class. The latter contains basic functions that
 * can be helpfull.
 *
 * If the plugin extends \Mibew\Plugin\AbstractPlugin class it must implement
 * only "run" and "getVersion" methods.
 */
class Plugin extends \Mibew\Plugin\AbstractPlugin implements \Mibew\Plugin\PluginInterface
{
    /**
     * Determine if the plugin was initialized correctly or not.
     *
     * By setting this propery to true by default we can make the plugin
     * initialized by default, so there is no need to add custom contructor
     * or initializer.
     *
     * This propery is overridden here only for example. We do not need to do
     * so in each plugin. In general case it should be set to true in the plugin
     * constructor when all necessary checks will be passed.
     *
     * Another way to control initialization state of the plugin is by means of
     * {@link \Mibew\Plugin\PluginInterface::initialized()} method.
     */
    protected $initialized = true;

    /**
     * Plugin's constructor.
     *
     * The code is situated here can initialize the plugin but cannot depend
     * on other plugins. All dependent code should be placed in "run" method.
     *
     * The current implementation just checks plugin's configurations.
     *
     * @param array $config Associative array of configuration params from the
     * main config file.
     */
    public function __construct($config)
    {
        // Check if a fake config param is set or it does not. In the sake of
        // simplicity we do not check the value.
        if (!isset($config['very_important_value'])) {
            // "very_important_value" param was not set. In this case we cannot
            // initialize the plugin correctly, so we need to tell the system
            // about it.
            $this->initialized = false;
        }
    }

    /**
     * The main entry point of a plugin
     *
     * Here we can attach event listeners and do other job.
     */
    public function run()
    {
        // We need an instatance of EventDispatcher class to attach handlers to
        // events. So get it.
        $dispatcher = EventDispatcher::getInstance();
        // There are a lot of events. Use a few of them to show how they work.
        $dispatcher->attachListener(Events::PAGE_ADD_CSS, $this, 'addCustomCss');
    }

    /**
     * Just attaches custom CSS file to every page that support it (chat windows
     * and users waiting screen).
     *
     * @param array $args Associative array of arguments passed in to event
     * handler. The list of arguments can vary for different events. See an
     * event description to know which arguments are available and how they
     * should be used.
     */
    public function addCustomCss(&$args)
    {
        $args['css'][] = str_replace(DIRECTORY_SEPARATOR, '/', $this->getFilesPath()) . '/css/styles.css';
    }

    /**
     * Returns verision of the plugin.
     *
     * The version can be any string compatible with semantic version
     * convention (see {@link http://semver.org/}). For example one can use the
     * following versions:
     *  - "1.2.3"
     *  - "0.1.7-alpha.2"
     *  - "4.0.0-beta.4"
     *
     * @return string Plugin's version.
     */
    public static function getVersion()
    {
        return '0.1.1';
    }

    /**
     * Also we can add dependencies. But make sure that they were loaded BEFORE
     * current plugin in config.php
     *
     * If the plugin depends, for example, on "Abc:BestFeature" and "Xyz:Logger"
     * we need to return the following array:
     * <code>
     * return array(
     *     'Abc:BestFeature' => '0.2.1',
     *     'Xyz:Logger' => '3.1.4',
     * );
     * </code>
     */
    public static function getDependencies()
    {
        // This plugin does not depend on others so return an empty array.
        return array();
    }
}
