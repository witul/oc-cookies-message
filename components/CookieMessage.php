<?php namespace Infoadvisor\Widgets\Components;


use Infoadvisor\Widgets\Models\Settings;
use RainLab\Pages\Classes\Page;
use Cms\Classes\Theme;
use Cms\Classes\ComponentBase;
use Cookie;


const COOKIE_NAME = 'confirm_cookie';

class CookieMessage extends ComponentBase
{
    protected $settings;

    public function onRun(){
        $this->settings=Settings::instance();
        $this->addJs('/plugins/infoadvisor/widgets/assets/src/node_modules/qwest/qwest.min.js');
    }

    public function componentDetails()
    {
        return [
            'name'        => 'Cookie Message',
            'description' => 'Powiadomienie o ciasteczkach'
        ];
    }
	public function cookiesAccepted(){
		$cookie  = Cookie::get(COOKIE_NAME);
		return (bool) $cookie;
	}

    public function onAgree(){
        return \Response::json(['status'=>1])->withCookie(COOKIE_NAME, '1');
    }

    public function onCancel(){
        return \Response::json(['status'=>2])->withCookie(COOKIE_NAME, '2');
	}


    public function defineProperties()
    {
        return [];
    }

    public function hasAgreeButton(){
        return (bool) $this->settings->cookie_show_button;
    }

    public function hasCloseButton(){
        return (bool) $this->settings->cookie_show_close;
    }

    public function getTermsLink(){

        if($this->settings->cookie_use_link && $this->settings->cookie_terms_page){
            return Page::url($this->settings->cookie_terms_page);
        }
        else return false;
    }

    public function message(){
        $message=$this->settings->toArray();
        $data=[];
		$data['raw_text']=$message['cookie_text'];
		$data['agree_button_text']=$message['cookie_button_label'];
        return $data;
    }

}
