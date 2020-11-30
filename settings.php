<?php
 
// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.
 
// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();                                                                                                
 
// This is used for performance, we don't need to know about these settings on every page in Moodle, only when                      
// we are looking at the admin settings pages.                                                                                      
if ($ADMIN->fulltree) {                                                                                                             
 
    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.                         
    $settings = new theme_boost_admin_settingspage_tabs('themesettingavadinte', get_string('configtitle', 'theme_avadinte'));     
    // Note new tabs layout for admin settings pages.
    require('settings/general_settings.php');  
    require('settings/presets_adjustments_settings.php');
    require('settings/colours_settings.php');  
    require('settings/content_settings.php');
    require('settings/banner_settings.php');
    require('settings/course_settings.php');
    require('settings/footer_settings.php');
    require('settings/buttons_settings.php');
    require('settings/topnavbar_settings.php');
    require('settings/drawer_settings.php');
    require('settings/header_settings.php');
    

    

                                                                                               
}