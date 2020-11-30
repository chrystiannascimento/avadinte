<?php
defined('MOODLE_INTERNAL') || die();


$page = new admin_settingpage('theme_avadinte_course', get_string('course_settings', 'theme_avadinte'));


$page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);
