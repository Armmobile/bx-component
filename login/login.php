<?php


/**
 * Class login
 */
class login extends bb_component
{
    protected $component_name = __CLASS__;

    private function printSignInBox()
    {
        global $USER;

        $icon_visibility = '';
        $knownUser_visibility = '';

        if ($USER->IsAuthorized()) {
            $icon_visibility = 'hsb__icon_invisible';
            $knownUser_visibility = 'hsb__known-user-box_visible';
        }
        ?>

        <div class="header-signin-box">
            <div class="hsb__signup-button <?= $icon_visibility; ?>">
                <div class="hsb__icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>

            <div class="hsb__known-user-box <?= $knownUser_visibility; ?>">
                <div class="known-user-box__name"><?= $USER->GetLogin(); ?></div>
                <div class="known-user-box__sign-out-btn"><i class="fa fa-sign-out"></i></div>
            </div>

            <div class="hsb__inputs-box">
                <input type="text" class="hsb__input-item" placeholder="login" name="login">
                <input type="text" class="hsb__input-item" placeholder="password" name="password">
            </div>

        </div>
        <?
    }

    public function printLoginBoxDesktop()
    {
        ?>

        <div class="header-signin-wrapper_desktop">
            <? $this->printSignInBox(); ?>
        </div>

        <?
    }

    public function printLoginBoxMobile()
    {
        ?>

        <div class="header-signin-wrapper_mobile">
            <? $this->printSignInBox(); ?>
        </div>

        <?
    }

}