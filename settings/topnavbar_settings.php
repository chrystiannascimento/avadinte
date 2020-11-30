<?php
defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_avadinte_topnavbar', get_string('topnavbar_settings', 'theme_avadinte'));
$page->add(new admin_setting_heading('theme_avadinte_topnavbar', get_string('topnavbar_headingsub', 'theme_avadinte'), format_text(get_string('topnavbar_desc' , 'theme_avadinte'), FORMAT_MARKDOWN)));
    

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
    

    // This is the main color descriptor
    $name = 'theme_avadinte/tnbnavbar';
    $heading = get_string('tnbnavbar', 'theme_avadinte');
    $information = get_string('tnbnavbar_desc', 'theme_avadinte');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    //Sticky Navbar at the top

    $name = 'theme_avadinte/topnavbarsticky';
    $title = get_string('topnavbarsticky', 'theme_avadinte');
    $description = get_string('topnavbarsticky_desc', 'theme_avadinte');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_avadinte/enablehome';
    $title = get_string('enablehome','theme_avadinte');
    $description = get_string('enablehome_desc', 'theme_avadinte');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    //
    $name = 'theme_avadinte/enablemyhome';
    $title = get_string('enablemyhome', 'theme_avadinte');
    $description = get_string('enablemyhome_desc', 'theme_avadinte');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_avadinte/enablecalendar';
    $title = get_string('enablecalendar', 'theme_avadinte');
    $description = get_string('enablecalendar_desc', 'theme_avadinte');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_avadinte/enablecourses';
    $title = get_string('enablecourses', 'theme_avadinte');
    $description = get_string('enablecourses_desc', 'theme_avadinte');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

  

    $name = 'theme_avadinte/enablecallcenter';
    $title = get_string('enablecallcenter', 'theme_avadinte');
    $description = get_string('enablecallcenter_desc', 'theme_avadinte');
    $default = 'http://atendimento.nead.ufma.br/view.php';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $page->add($setting);








// Must add the page after definiting all the settings!
$settings->add($page); 