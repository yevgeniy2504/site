<?php
include_once($_SERVER['DOCUMENT_ROOT']."/incom/modules/general/mysql.php");

if (isset($_POST["name"]) && $_POST["name"]!='' && isset($_POST["token"]) && isset($_POST["token"]))
{
    $incom->guest->lang = "ru";

//    print_r($incom->guest->add_guest($_POST["name"], $_POST["mail"], $_POST["text"], $_POST["star"] , $_POST["id"]));
//    exit();

    if ($incom->guest->add_guest($_POST["name"], $_POST["mail"], $_POST["text"], $_POST["star"] , $_POST["id"]))
    {
        echo '<script>';
        echo 'jQuery(".guest_field").val("");';
        echo 'jQuery("#guest_info").html("'.$incom->guest->text_success.'").css("color","green").slideDown("slow");';
        echo '</script>';


        $link = $_SERVER['HTTP_REFERER'].'#guest';

        if ($incom->guest->send_mail==1)
            $incom->guest->send_mail($link, $_POST["name"], $_POST["text"]);

    }
    else
    {

        echo '<script>';
        echo 'jQuery("#guest_info").html("Ошибка отправки отзыва. Попробуйте позже").css("color","red").slideDown("slow");';
        echo '</script>';
    }

    exit;
}