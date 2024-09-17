<?php namespace AppUser\User;

use Backend;
use System\Classes\PluginBase;
use Illuminate\Support\Facades\App;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'User',
            'description' => 'No description provided yet...',
            'author' => 'AppUser',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        include __DIR__ . '/routes.php'; // REVIEW - Toto by sa malo diať automaticky myslím, teda routes.php by ti mali fungovať automaticky ak ich máš správne pomenované a na správnom mieste

        /* REVIEW - Tu vidím že si našiel aj tento spôsob používania middleware, je to fajn niekedy to pravdepodobne použiješ alebo sa s tým stretneš
                $this->app['Illuminate\Contracts\Http\Kernel']
                    ->pushMiddleware(\AppUser\User\Middleware\AuthMiddleware::class);

                $this->app['Illuminate\Contracts\Http\Kernel']
                    ->pushMiddleware(\AppUser\User\Middleware\GuestMiddleware::class);*/
    }


    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents() // REVIEW - Tu registruješ componenty ktoré nikde neexistujú, teda aspoň nie pod namespace 'AppUser\User\Components\Login'... každopádne nepotrebuješ componenty
    {
        return [
            'AppUser\User\Components\Login' => 'loginForm',
            'AppUser\User\Components\Register' => 'registerForm'
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions() // REVIEW - Permissions nemusíš riešiť. Sú v OctoberCMS kebyže to developer potrebuje, ale zo skúsenosti ak už sa riešia permissions tak sa to robí custom
    {
        return [
            'appuser.user.manage_users' => [
                'tab' => 'User',
                'label' => 'Manage users'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'users' => [
                'label' => 'Users',
                'url' => Backend::url('appuser/user/users'),
                'icon' => 'icon-user',
                'permissions' => ['appuser.user.*'],
                'order' => 500,
            ],
            'logs' => [
                'label' => 'Logs',
                'url' => Backend::url('appuser/user/logs'),
                'icon' => 'icon-list',
                'permissions' => ['appuser.user.*'],
                'order' => 510,
            ],
        ];
    }
}
