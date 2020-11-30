<?php
defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_avadinte_header', get_string('header_settings', 'theme_avadinte'));
$page->add(new admin_setting_heading('theme_avadinte_header', get_string('header_headingsub', 'theme_avadinte'), format_text(get_string('header_desc' , 'theme_avadinte'), FORMAT_MARKDOWN)));

    $name = 'theme_avadinte/showcourseheader';
    $title = get_string('showcourseheader', 'theme_avadinte');
    $description = get_string('showcourseheader_desc', 'theme_avadinte');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


// Must add the page after definiting all the settings!
$settings->add($page); 