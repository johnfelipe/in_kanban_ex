<?php

namespace CPMKE;

class Plugin{
    
    public $path = null;
    public $url = null;
    public $setting = null;
    public $kanban = null;




    public function __construct($plugin_path, $plugin_url) {
        
        $this->path = $plugin_path;
        $this->url = $plugin_url;
        $this->setting = new settings(\CPMKE, $this);
        $this->kanban = new kanban_ex($this);
        
        
    }
    
}

