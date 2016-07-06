<?php

function flash($message, $level = 'info')
{
    //success info warning danger
    //alert-dismissible
    session()->flash('flash_message', $message);
    session()->flash('flash_message_level', $level);
}
