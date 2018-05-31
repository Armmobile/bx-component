<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

global $USER;
if (!is_object($USER)) $USER = new CUser;

$arAuthResult = $USER->Login($_GET['LOGIN'], $_GET['PASSWORD'], "Y");

$APPLICATION->arAuthResult = $arAuthResult;

if (gettype($arAuthResult) == 'boolean' && $arAuthResult) {
    $arAuthResult = array();
    $arAuthResult['LOGIN'] = CUser::GetLogin();
    $arAuthResult['TYPE'] = 'SUCCESS';
    $arAuthResult['MESSAGE'] = 'Регистрация успешна.<br>';
}

print_r(json_encode($arAuthResult));


