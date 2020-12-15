<?php
defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_avadinte_drawer', get_string('drawer_settings', 'theme_avadinte'));
$page->add(new admin_setting_heading('theme_avadinte_drawer', get_string('drawer_headingsub', 'theme_avadinte'), format_text(get_string('drawer_desc' , 'theme_avadinte'), FORMAT_MARKDOWN)));

    //
    $name = 'theme_avadinte/leftdrawer';
    $heading = get_string('leftdrawer', 'theme_avadinte');
    $information = get_string('leftdrawer_desc', 'theme_avadinte');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    //
    /*
    $name = 'theme_avadinte/shownavclosed';
    $title = get_string('shownavclosed', 'theme_avadinte');
    $description = get_string('shownavclosed_desc', 'theme_avadinte');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
*/
    // Set size of left drawer
    /*
    $name = 'theme_avadinte/leftdrawersize';
    $title = get_string('leftdrawersize','theme_avadinte');
    $description = get_string('leftdrawersize_desc', 'theme_avadinte');
    $default = 'size1';
    $choices = array(
        'size1' =>'315px',
        'size2' => '365px',
        'size3' => '415px',
        );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
*/
    // Drawer background
    $name = 'theme_avadinte/drawerbkg';
    $title = get_string('drawerbkg', 'theme_avadinte');
    $description = get_string('drawerbkg_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#E9E9E9',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Drawer color
    $name = 'theme_avadinte/drawercolor';
    $title = get_string('drawercolor', 'theme_avadinte');
    $description = get_string('drawercolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#000',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Drawer hover
    $name = 'theme_avadinte/drawerhover';
    $title = get_string('drawerhover', 'theme_avadinte');
    $description = get_string('drawerhover_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, ' #FFFFFF',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

     // Drawer hover color
     $name = 'theme_avadinte/drawerhoverbg';
     $title = get_string('drawerhoverbg', 'theme_avadinte');
     $description = get_string('drawerhoverbg_desc', 'theme_avadinte');
     $previewconfig = null;
     $setting = new admin_setting_configcolourpicker($name, $title, $description, '#690000',$previewconfig);
     $setting->set_updatedcallback('theme_reset_all_caches');
     $page->add($setting);

    //Drawer active level 1
    $name = 'theme_avadinte/draweractivel1';
    $title = get_string('draweractivel1', 'theme_avadinte');
    $description = get_string('draweractivel1_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#BEBFC1',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    //Drawer active level 2
    $name = 'theme_avadinte/draweractivel2';
    $title = get_string('draweractivel2', 'theme_avadinte');
    $description = get_string('draweractivel2_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#D4D6D5',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    //Drawer dimmed color
    $name = 'theme_avadinte/drawerdimmed';
    $title = get_string('drawerdimmed', 'theme_avadinte');
    $description = get_string('drawerdimmed_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, ' #6c757d',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    //Drawer dimmed bg
    $name = 'theme_avadinte/drawerdimmedbg';
    $title = get_string('drawerdimmedbg', 'theme_avadinte');
    $description = get_string('drawerdimmedbg_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#FFFFFF',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);











// Must add the page after definiting all the settings!
$settings->add($page); 