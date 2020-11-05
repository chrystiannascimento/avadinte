<?php
defined('MOODLE_INTERNAL') || die();


$page = new admin_settingpage('theme_avadinte_course', get_string('course_settings', 'theme_avadinte'));

// Sitename
$name = 'theme_avadinte/sitetitle';
$title = get_string('sitetitle' , 'theme_avadinte');
$description = get_string('sitetitle_desc', 'theme_avadinte');
$title1 = get_string('default', 'theme_avadinte');
$title2 = get_string('category', 'theme_avadinte');
$title3 = get_string('course', 'theme_avadinte');
$default = '1';
$choices = array('1'=>$title1, '2'=>$title2, '3'=>$title3);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);
