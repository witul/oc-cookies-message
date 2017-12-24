<?php namespace Infoadvisor\Widgets;

use Infoadvisor\Widgets\Models;
use Backend;
use System\Classes\PluginBase;

/**
 * widgets Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Infoadvisor widgets',
            'description' => 'No description provided yet...',
            'author'      => 'infoadvisor',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Infoadvisor\Widgets\Components\CookieMessage' => 'cookieMessage',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'infoadvisor.widgets.some_permission' => [
                'tab' => 'widgets',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'widgets' => [
                'label'       => 'widgets',
                'url'         => Backend::url('infoadvisor/widgets/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['infoadvisor.widgets.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerSettings(){
        return [
            'settings' => [
                'label'       => 'Komunikat o cookies',
                'description' => '',
                'category'    => 'Users',
                'icon'        => 'icon-globe',
                'class'       => 'Infoadvisor\Widgets\Models\Settings',
                //'url'         => Backend::url('infoadvisor/widgets/cookiemessage'),
                'order'       => 500,
                'keywords'    => 'geography place placement'
            ]
        ];
    }

}
