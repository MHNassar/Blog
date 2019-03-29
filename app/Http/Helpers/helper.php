<?php

function date_converter($date)
{
    $date = strtotime("$date");
    $date = date('d.m.y', $date);
    $current_date = date('d.m.y');

    if ($date == $current_date) {
        return "Today";
    }

    if ($date > $current_date) {
        return false;
    }
    return $date;

}

function date_checker($date)
{
    $date = strtotime("$date");
    $date = date('d.m.y', $date);
    $current_date = date('d.m.y');
    if ($date > $current_date) {
        return false;
    } else {
        return true;
    }
}

function text_filter($content)
{
    if (strlen($content) < 1000) {
        return $content;
    }
    $output = "";
    $first_sentence = first_sentence($content);
    if (strlen($first_sentence) > 1000) {
        $pos = strpos($first_sentence, ' ', 1000);
        $output .= substr($first_sentence, 0, $pos);
    } else {

        $pos = strpos($content, '.', 1000);
        $output .= substr($content, 0, $pos);
    }
    $output .= " ....";
    return $output;
}

function first_sentence($content)
{

    $pos = strpos($content, '.');
    return substr($content, 0, $pos + 1);

}