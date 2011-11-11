<?php
require 'application.php';

class ShowController extends ApplicationController {


    function before_filter($action, $args)
    {
        parent::before_filter($action, $args);
        if (Request::get('cancel') !== null) {
            $GLOBALS['user']->user_vars[$this->plugin->me]['last_checked'] = time();
            $this->redirect(UrlHelper::getUrl('index.php'));
        }
    }

    function index_action()
    {
        $this->redirect('show/page1');
    }

    function page1_action()
    {
        $this->username = studip_utf8encode(get_fullname());
    }

    function page2_action()
    {
    }

    function page3_action()
    {
        $found = $this->checkdata();
        if (count($found)) {
            $this->found = $found;
        } else {
            $this->flash['message'] = 'Ihre Daten konnten nicht zugeordnet werden.';
            $this->redirect('show/page2');
        }
    }

    function page4_action()
    {
        list($id, $mail) = @unserialize(Request::get('loginCombi'));
        $this->d5u_ok = $this->d5u($id, $mail, $GLOBALS['user']->id);
    }

    private function checkdata()
    {
        if (Request::int('staffNumber') === 29624) {
            return array('dk5os' => 'irgendwas@dozenten.uni-halle.de',
                        'dk98ws' => 'wasanderes@dozenten.uni-halle.de',
                        'so3od' => 'anderes@dozenten.uni-halle.de');
        }
        return array();
    }

    private function d5u($id, $mail, $user_id)
    {
    }
}

