<?php

//some starbox stuff to get the author boxes to work
add_action('init','starBoxCustom');

function starBoxCustom(){
        if (!class_exists('ABH_Controllers_Frontend'))
            return;

        ABH_Classes_ObjController::getController('ABH_Controllers_Frontend')->custom = true;
}

function starBoxShow($user_id) {
        if (!class_exists('ABH_Controllers_Frontend'))
            return;

        ABH_Classes_ObjController::getController('ABH_Classes_Tools');

        $theme = ABH_Classes_Tools::getOption('abh_theme');

        $str = '';
        $str .= '<script type="text/javascript" src="' . _ABH_ALL_THEMES_URL_ . $theme . '/js/frontend.js?ver=' . ABH_VERSION . '"></script>';
        $str .= '<link rel="stylesheet"  href="' . _ABH_ALL_THEMES_URL_ . $theme . '/css/frontend.css?ver=' . ABH_VERSION . '" type="text/css" media="all" />';
        $str .= ABH_Classes_ObjController::getController('ABH_Controllers_Frontend')->showBox($user_id);

        return $str;
    }

/**
 * Enable photon on this https site
 */
add_filter( 'jetpack_photon_reject_https', '__return_false' );
