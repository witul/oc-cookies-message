<?php namespace Infoadvisor\Widgets\Models;

use RainLab\Pages\Classes\PageList;
use Cms\Classes\Theme;
use Model;

class Settings extends Model
{
    public $implement = [
        'System.Behaviors.SettingsModel',
        '@RainLab.Translate.Behaviors.TranslatableModel'
    ];
    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['cookie_text','cookie_button_label'];

    // A unique code
    public $settingsCode = 'infoadvisor_widgets_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    public function getCookieTermsPageOptions(){
        $list=new PageList(Theme::getActiveTheme());
        $map=[];
        $list->listPages()->each(function($v)use(&$map){
            $title=$v->viewBag['title'];
            $code=$v->getBaseFileName();
            $map[$code]=$title;
        });
        return $map;
    }
}
