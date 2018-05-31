<?php

/**
 * Class bb_form
 */
class bb_form extends bb_component
{

    protected $component_name = __CLASS__;

    /**
     * Regular form on Services
     */
    public function printFormBlockV1()
    {
        ?>
        <div class="bb-form-box">
            <? $this->printFormV1(array('SUBMIT-TEXT' => 'Заказать')); ?>
        </div>
        <?php
    }

    /**
     * @param $param
     */
    public function printFormV1($param)
    {
        $submitText = isset($param['SUBMIT-TEXT']) ? $param['SUBMIT-TEXT'] : 'Обсудить мой проект';

        ?>

        <form class="bb-form_request" action="">

            <div class="bb-form__input-box">

                <input name="title" type="hidden" value="">

                <div class="bb-form__input-item">
                    <input name="phone" class="input-item__input" type="text" placeholder="Телефон">
                </div>

                <div class="bb-form__input-item">
                    <input name="email" class="input-item__input" type="text" placeholder="Email">
                </div>

            </div>

            <div class="bb-form__input-item">
                <div class="bb-form__disclaimer">Нажимая на кнопку «Заказать» вы даете согласие на <a
                            href="/company/docs/user_agreement">обработку своих персональных данных</a></div>
                <input class="input-item__input_submit" type="submit" value="<?= $submitText; ?>">
            </div>

            <!-- hidden screen Success-->
            <div class="bb-form__screen bb-form__screen_success">
                <div class="bb-form-screen__title">
                    <i class="fa fa-check"></i><br>Ваша заявка успешно отправлена
                </div>
            </div>
            <!-- hidden screen Error-->
            <div class="bb-form__screen bb-form__screen_error">
                <div class="bb-form-screen__title">
                    <i class="fa fa-times"></i><br>Ошибка отправки.<br><br>Перезагрузите страницу и попробуйте снова
                </div>
            </div>

        </form>
        <?php
    }

    /**
     * Last project-tile form
     */
    public function printFormBlockV2()
    {
        ?>
        <div class="bb-form-box_protfolio-last-button">
            <? $this->printFormV1(); ?>
        </div>
        <?php
    }

}