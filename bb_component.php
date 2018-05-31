<?php

/**
 * Class bb_component
 */
class bb_component
{
    protected $component_name;          //s.b. declare in nested class
    protected $dir = '/local/templates/base_v.1/bb_components/';
    protected $JS_NAME = 'main.js';
    protected $CSS_NAME = 'main.css';

    /**
     * bb_component constructor.
     */
    function __construct()
    {
        $this->requireJS();
        $this->requireCSS();
    }

    public function requireJS()
    {
        $file = $this->dir . $this->component_name . '/' . $this->JS_NAME;
        ?>
        <script>
            var script = document.createElement('script');
            script.src = '<?=$file;?>';
            document.getElementsByTagName('head')[0].appendChild(script);
        </script>
        <?
    }

    public function requireCSS()
    {
        $file = $this->dir . $this->component_name . '/' . $this->CSS_NAME;
        ?>
        <script>
            var link = document.createElement('link');
            link.setAttribute("href", "<?=$file;?>");
            link.setAttribute("rel", "stylesheet");
            document.getElementsByTagName('head')[0].appendChild(link);
        </script>
        <?
    }

}