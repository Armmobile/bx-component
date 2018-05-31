<?php

/**
 * POST-data:
 *  title
 *  phone
 *  email
 *  tariff*
 */

$date = date('d.m.Y  (H:m)', $_SERVER['REQUEST_TIME']);

$message = "
<div style='background-color: #F3F3F3; font-family: \"Helvetica Neue\", Arial, Helvetica, sans-serif;'>
    
    <div style='padding:20px; text-align: center; color: #444; background-color: #3d5d5b50; font-weight: 900; font-size: 2em; '>$_POST[title]</div>
    
    <div style='padding: 50px; line-height: 2em; font-size: 1.2em; position: relative'>
        <div style='width: 100px; display: inline-block;'>Телефон:</div> <b>$_POST[phone]</b> 
        <br>
        <div style='width: 100px; display: inline-block;'>Email:</div> <b>$_POST[email]</b>
        <br>
        <div style='width: 100px; display: inline-block;'>Тариф:</div> <b>$_POST[tariff]</b>  
        <br><br><br> 
        
        <span style='font-size: 0.8em'>Заявка сделана на странице: <a href='$_SERVER[HTTP_REFERER]' target='_blank'>$_SERVER[HTTP_REFERER]</a></span>
        
        <div style='position: absolute; bottom: 20px; right: 20px; font-size: 0.8em; color: #888;'>$date</div>
             
    </div>
   
</div>
";



$subject = 'Заявка с сайта';

$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";

$to = 'mail@mail.ur';


mail($to, $subject, $message, $headers);