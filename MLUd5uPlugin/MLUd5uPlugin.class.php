<?php

class MLUd5uPlugin extends StudipPlugin implements Systemplugin {

    public $config = array();

    function __construct() {

        parent::__construct();
        $this->me = get_class($this);
        $this->restoreConfig();
        if (strpos(strtolower($_SERVER['PATH_INFO']), strtolower($this->me)) === false
            && $this->isTargetSubject($GLOBALS['user']->id)) {
            header("Location: " . PluginEngine::getUrl($this, array(), 'show/page1'));
            page_close();
            die();
        }
    }

    function restoreConfig(){
        $config = DBManager::get()
        ->query("SELECT comment FROM config WHERE field = 'CONFIG_" . $this->getPluginName() . "' AND is_default=1")
        ->fetchColumn();
        $this->config = unserialize($config);
        return $this->config != false;
    }

    function storeConfig(){
        $config = serialize($this->config);
        $field = "CONFIG_" . $this->getPluginName();
        $st = DBManager::get()
        ->prepare("REPLACE INTO config (config_id, field, value, is_default, type, range, chdate, comment)
            VALUES (?,?,'do not edit',1,'string','global',UNIX_TIMESTAMP(),?)");
        return $st->execute(array(md5($field), $field, $config));
    }

    function getDisplayTitle()
    {
        return $this->me;
    }

    function isTargetSubject($user_id)
    {
        if ($GLOBALS['perm']->get_perm($user_id) !== 'dozent') {
            return false;
        }
        if (isset($_SESSION[$this->me])) {
            return false;
        }
        $_SESSION[$this->me] = true;
        if ((time() - $GLOBALS['user']->user_vars[$this->me]['last_checked']) < (10*24*60*60)) {
            return false;
        }
        $db = DbManager::get();
        $auth_plugin = $db->query("SELECT IFNULL(auth_plugin,'standard') FROM auth_user_md5 WHERE user_id='$user_id'")->fetchColumn();
        if ($auth_plugin != 'standard') {
            return false;
        }
        return true;
    }

    /**
    * This method dispatches and displays all actions. It uses the template
    * method design pattern, so you may want to implement the methods #route
    * and/or #display to adapt to your needs.
    *
    * @param  string  the part of the dispatch path, that were not consumed yet
    *
    * @return void
    */
    function perform($unconsumed_path) {
        if(!$unconsumed_path){
            header("Location: " . PluginEngine::getUrl($this), 302);
            return false;
        }
        $trails_root = $this->getPluginPath();
        $dispatcher = new Trails_Dispatcher($trails_root, null, 'show');
        $dispatcher->current_plugin = $this;
        $dispatcher->dispatch($unconsumed_path);
    }

}
