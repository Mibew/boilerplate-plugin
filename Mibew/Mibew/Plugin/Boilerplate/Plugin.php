<?php
/**
 * @file The main file of Mibew:Boilerplate plugin.
 *
 * Plugin's class name, its namespace and file path must follow special naming
 * conventions. The name of the main plugin class should match pattern:
 * "\<Vendor Name>\Mibew\Plugin\<Plugin name>\Plugin". It should be placed in
 * "<mibew root>/plugins/<Vendor Name>/Mibew/Plugin/<Plugin name>/Plugin.php"
 * file. Names of plugin and directories/files are case sensitive!
 *
 * To turn the plugin on add the following to <mibew root>/libs/config.php
 * <code>
 * $plugins_list[] = array(
 *     'name' => 'Mibew:Boilerplate',
 *     'config' => array();
 * );
 * </code>
 */

namespace Mibew\Mibew\Plugin\Boilerplate;

/**
 * Defenition of the main plugin class.
 *
 * Plugin class must implements \Mibew\Plugin\PluginInterface and can extends
 * \Mibew\Plugin\AbstractPlugin class. The latter contains basic functions that
 * can be helpfull.
 */
class Plugin extends \Mibew\Plugin\AbstractPlugin implements \Mibew\Plugin\PluginInterface
{
    /**
     * Determine if the plugin was initialized correctly or not.
     *
     * By setting this propery to true by default we make the plugin
     * initialized by default, so there is no need to add custom contructor
     * or initializer.
     */
    protected $initialized = true;

    /**
     * The main entry point of a plugin
     *
     * If a plugin extends \Mibew\Plugin\AbstructPlugin class the only method
     * that should be implemented is "run".
     *
     * Here we can attache event listeners and do other job.
     */
    public function run()
    {
        // We need an instatance of EventDispatcher class to attach handlers to
        // events. So get it.
        $dispatcher = \Mibew\EventDispatcher::getInstance();
        // There are a lot of events. Use a few of them to show how they work.
        $dispatcher->attachListener('pageAddCSS', $this, 'addCustomCss');
    }

    /**
     * Just attaches custom CSS file to every page that support it (chat windows
     * and users waiting screen).
     */
    public function addCustomCss(&$args)
    {
        $args['css'][] = MIBEW_WEB_ROOT . '/' . $this->getFilesPath() . '/css/styles.css';
    }

    /**
     * Also we can add dependencies. But make shure that they was loaded BEFORE
     * current plugin in config.php
     *
     * If the plugin depends, for example, on "Abc:BestFeature" and "Xyz:Logger"
     * we need to return the following array:
     * <code>
     * return array(
     *     'Abc:BestFeature',
     *     'Xyz:Logger',
     * );
     * </code>
     */
    public static function getDependencies()
    {
        // This plugin does not depend on others so return an empty array.
        return array();
    }
}
