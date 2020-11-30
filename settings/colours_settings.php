<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Colours settings page file.
 *
 * @packagetheme_fordson
 * @copyright  2016 Chris Kenniburg
 * @creditstheme_fordson - MoodleHQ
 * @licensehttp://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_avadinte_colours', get_string('colours_settings', 'theme_avadinte'));
$page->add(new admin_setting_heading('theme_avadinte_colours', get_string('colours_headingsub', 'theme_avadinte'), format_text(get_string('colours_desc' , 'theme_avadinte'), FORMAT_MARKDOWN)));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_configtextarea('theme_avadinte/scsspre',
    get_string('rawscsspre', 'theme_avadinte'), get_string('rawscsspre_desc', 'theme_avadinte'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the main color descriptor
    $name = 'theme_avadinte/maincolors';
    $heading = get_string('maincolors', 'theme_avadinte');
    $information = get_string('maincolors_desc', 'theme_avadinte');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);


    // Variable $brandprimary.
    $name = 'theme_avadinte/brandprimary';
    $title = get_string('brandprimary', 'theme_avadinte');
    $description = get_string('brandprimary_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#690000', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandsuccess.
    $name = 'theme_avadinte/brandsuccess';
    $title = get_string('brandsuccess', 'theme_avadinte');
    $description = get_string('brandsuccess_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandwarning.
    $name = 'theme_avadinte/brandwarning';
    $title = get_string('brandwarning', 'theme_avadinte');
    $description = get_string('brandwarning_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $branddanger.
    $name = 'theme_avadinte/branddanger';
    $title = get_string('branddanger', 'theme_avadinte');
    $description = get_string('branddanger_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brandinfo.
    $name = 'theme_avadinte/brandinfo';
    $title = get_string('brandinfo', 'theme_avadinte');
    $description = get_string('brandinfo_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    // @bodyBackground setting.
    $name = 'theme_avadinte/bodybackground';
    $title = get_string('bodybackground', 'theme_avadinte');
    $description = get_string('bodybackground_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // @main content background setting.
    $name = 'theme_avadinte/maincontentbackground';
    $title = get_string('maincontentbackground', 'theme_avadinte');
    $description = get_string('maincontentbackground_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#fff');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // LINK color
    $name = 'theme_avadinte/linkcolor';
    $title = get_string('linkcolor', 'theme_avadinte');
    $description = get_string('linkcolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#000',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // LINK hover color
    $name = 'theme_avadinte/linkhovercolor';
    $title = get_string('linkhovercolor', 'theme_avadinte');
    $description = get_string('linkhovercolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#000',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    /* selection text color
    $name = 'theme_avadinte/selectiontextcolor';
    $title = get_string('selectiontextcolor', 'theme_avadinte');
    $description = get_string('selectiontextcolor_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // selection text bg-color
    $name = 'theme_avadinte/selectiontextbgcolor';
    $title = get_string('selectiontextbgcolor', 'theme_avadinte');
    $description = get_string('selectiontextbgcolor_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    */

    // This is the breadcrum colours
    $name = 'theme_avadinte/topnavbarcolors';
    $heading = get_string('topnavbarcolors', 'theme_avadinte');
    $information = get_string('topnavbarcolors_desc', 'theme_avadinte');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Top navbar background setting.
    $name = 'theme_avadinte/topnavbarbg';
    $title = get_string('topnavbarbg', 'theme_avadinte');
    $description = get_string('topnavbarbg_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#690000', $previewconfig );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Top navbar text color background setting.
    $name = 'theme_avadinte/topnavbartextcolor';
    $title = get_string('topnavbartextcolor', 'theme_avadinte');
    $description = get_string('topnavbartextcolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#FFF', $previewconfig );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // breadcrumb text color
    $name = 'theme_avadinte/breadcrumbtextcolor';
    $title = get_string('breadcrumbtextcolor', 'theme_avadinte');
    $description = get_string('breadcrumbtextcolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#000', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);



    // This is the breadcrum colours
    $name = 'theme_avadinte/breadcrumbcolors';
    $heading = get_string('breadcrumbcolors', 'theme_avadinte');
    $information = get_string('breadcrumbcolors_desc', 'theme_avadinte');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // breadcrumb text color
    $name = 'theme_avadinte/breadcrumbtextcolor';
    $title = get_string('breadcrumbtextcolor', 'theme_avadinte');
    $description = get_string('breadcrumbtextcolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#000', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // breadcrumb bg color
    $name = 'theme_avadinte/breadcrumbbgcolor';
    $title = get_string('breadcrumbbgcolor', 'theme_avadinte');
    $description = get_string('breadcrumbbgcolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#fff', $previewconfig );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the footer colours
    $name = 'theme_avadinte/footercolors';
    $heading = get_string('footercolors', 'theme_avadinte');
    $information = get_string('footercolors_desc', 'theme_avadinte');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // footer text color
    $name = 'theme_avadinte/footertextcolor';
    $title = get_string('footertextcolor', 'theme_avadinte');
    $description = get_string('footertextcolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#fff',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // footer bg color
    $name = 'theme_avadinte/footerbgcolor';
    $title = get_string('footerbgcolor', 'theme_avadinte');
    $description = get_string('footerbgcolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#690000', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // footer link color
    $name = 'theme_avadinte/footerlinkcolor';
    $title = get_string('footerlinkcolor', 'theme_avadinte');
    $description = get_string('footerlinkcolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#fff',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the forum colours
    $name = 'theme_avadinte/forumcolors';
    $heading = get_string('forumcolors', 'theme_avadinte');
    $information = get_string('forumcolors_desc', 'theme_avadinte');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // forum heading bg color
    $name = 'theme_avadinte/forumheadingbgcolor';
    $title = get_string('forumheadingbgcolor', 'theme_avadinte');
    $description = get_string('forumheadingbgcolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#FFF',$previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // forum body bg color
    $name = 'theme_avadinte/forumbodybgcolor';
    $title = get_string('forumbodybgcolor', 'theme_avadinte');
    $description = get_string('forumbodybgcolor_desc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#FFF', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the ativity box colours
    $name = 'theme_avadinte/ativityboxcolors';
    $heading = get_string('ativityboxcolors', 'theme_avadinte');
    $information = get_string('ativityboxcolors_desc', 'theme_avadinte');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // ativity box bg color
    $name = 'theme_avadinte/ativityboxbgcolor';
    $title = get_string('ativityboxbgcolor', 'theme_avadinte');
    $description = get_string('ativityboxbgcolor_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);










    
    
    
    
    


    // @breadcrumbBackground setting.
    $name = 'theme_avadinte/breadcrumbbkg';
    $title = get_string('breadcrumbbkg', 'theme_avadinte');
    $description = get_string('breadcrumbbkg_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Card background
    $name = 'theme_avadinte/cardbkg';
    $title = get_string('cardbkg', 'theme_avadinte');
    $description = get_string('cardbkg_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    

    // Footer drawer background
    $name = 'theme_avadinte/footerbkg';
    $title = get_string('footerbkg', 'theme_avadinte');
    $description = get_string('footerbkg_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    


    // Raw SCSS to include after the content.
    $setting = new admin_setting_configtextarea('theme_avadinte/scss', get_string('rawscss', 'theme_fordson'),
    get_string('rawscss_desc', 'theme_avadinte'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page); 