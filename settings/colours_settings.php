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

    // Variable $brandprimary.
    $name = 'theme_avadinte/brandprimary';
    $title = get_string('brandprimary', 'theme_avadinte');
    $description = get_string('brandprimary_desc', 'theme_avadinte');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
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
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Top navbar background setting.
    $name = 'theme_avadinte/topnavbarbg';
    $title = get_string('topnavbarbg', 'theme_avadinte');
    $description = get_string('topnavbarbg_desc', 'theme_avadinte');
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

    // Drawer background
    $name = 'theme_avadinte/drawerbkg';
    $title = get_string('drawerbkg', 'theme_avadinte');
    $description = get_string('drawerbkg_desc', 'theme_avadinte');
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