<?php
defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_avadinte_header', get_string('header_settings', 'theme_avadinte'));
$page->add(new admin_setting_heading('theme_avadinte_header', get_string('header_headingsub', 'theme_avadinte'), format_text(get_string('header_desc' , 'theme_avadinte'), FORMAT_MARKDOWN)));

    $name = 'theme_avadinte/showcourseheader';
    $title = get_string('showcourseheader', 'theme_avadinte');
    $description = get_string('showcourseheader_desc', 'theme_avadinte');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // This is the breadcrumb
    $name = 'theme_avadinte/breadcrumb';
    $heading = get_string('breadcrumb', 'theme_avadinte');
    $information = get_string('breadcrumb_desc', 'theme_avadinte');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    /*
    // Breadcrumb home.
    $name = 'theme_avadinte/breadcrumbhome';
    $title = get_string('breadcrumbhome', 'theme_avadinte');
    $description = get_string('breadcrumbhome_desc', 'theme_avadinte');
    $radchoices = array(
        'text' => get_string('breadcrumbhome_text', 'theme_avadinte'),
        'icon' => get_string('breadcrumbhome_icon', 'theme_avadinte')
    );
    $setting = new admin_setting_configselect($name, $title, $description, 'icon', $radchoices);
    $temp->add($setting);

    $name = 'theme_avadinte/breadcrumbseparator';
    $title = get_string('breadcrumbseparator', 'theme_avadinte');
    $description = get_string('breadcrumbseparator_desc', 'theme_avadinte');
    $setting = new admin_setting_configtext($name, $title, $description, 'angle-right');
    $temp->add($setting);
    */
    // @breadcrumbBackground setting.
    $name = 'theme_avadinte/breadcrumbbkg';
    $title = get_string('breadcrumbbkg', 'theme_avadinte');
    $description = get_string('breadcrumbbkg_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    


// Must add the page after definiting all the settings!
$settings->add($page); 