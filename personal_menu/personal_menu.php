<?

/**
 * Class personal_menu
 */
class personal_menu extends bb_component
{
    protected $component_name = __CLASS__;
    protected $USER;
    protected $APPLICATION;

    /**
     * personal_menu constructor.
     */
    function __construct()
    {
        parent::__construct();

        global $APPLICATION;
        $this->APPLICATION = $APPLICATION;

        global $USER;
        $this->USER = $USER;
    }

    public function printMenuBox()
    {
        if ($this->USER->IsAuthorized()) {

            ?>
            <div class="p-menu-box">
                <? $this->APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "personal",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "personal",
                        "USE_EXT" => "Y",
                        "COMPONENT_TEMPLATE" => "main"
                    ),
                    false
                ); ?>
            </div>
            <?
        }

    }



}