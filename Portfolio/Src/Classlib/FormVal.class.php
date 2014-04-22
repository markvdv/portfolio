<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formVal
 *
 * @author Mark.Vanderveken
 */
namespace Src\Classlib;
use Src\Exceptions\TextContainsHTMLException;
class FormVal {
    //put your code here
    public static function hasHTML($sText) {
       if ($sText!=strip_tags($sText)){
           throw new TextContainsHTMLException();
       }
        return $sText;
    }
}
