<?php

defined('MOODLE_INTERNAL') || die();

// Each page is a tab - the first is the "General" tab.                                                                         
$page = new admin_settingpage('theme_avadinte_general', get_string('generalsettings', 'theme_avadinte'));                             
$page->add(new admin_setting_heading('theme_avadinte_general', get_string('general_headingsub', 'theme_avadinte'), format_text(get_string('general_desc' , 'theme_avadinte'), FORMAT_MARKDOWN)));

// Replicate the preset setting from boost.                                                                                     
$name = 'theme_avadinte/preset';                                                                                                   
$title = get_string('preset', 'theme_avadinte');                                                                                   
$description = get_string('preset_desc', 'theme_avadinte');                                                                        
$default = 'default.scss';                                                                                                      

// We list files in our own file area to add to the drop down. We will provide our own function to                              
// load all the presets from the correct paths.                                                                                 
$context = context_system::instance();                                                                                          
$fs = get_file_storage();                                                                                                       
$files = $fs->get_area_files($context->id, 'theme_avadinte', 'preset', 0, 'itemid, filepath, filename', false);                    

$choices = [];                                                                                                                  
foreach ($files as $file) {                                                                                                     
    $choices[$file->get_filename()] = $file->get_filename();                                                                    
}                                                                                                                               
// These are the built in presets from Boost.                                                                                   
$choices['default.scss'] = 'default.scss';                                                                                      
$choices['plain.scss'] = 'plain.scss';                                                                                          

$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);                                     
$setting->set_updatedcallback('theme_reset_all_caches');                                                                        
$page->add($setting);                                                                                                           

// Preset files setting.                                                                                                        
$name = 'theme_avadinte/presetfiles';                                                                                              
$title = get_string('presetfiles','theme_avadinte');                                                                               
$description = get_string('presetfiles_desc', 'theme_avadinte');                                                                   

$setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,                                         
    array('maxfiles' => 20, 'accepted_types' => array('.scss')));                                                               
$page->add($setting);     


// Must add the page after definiting all the settings!                                                                         
$settings->add($page); 