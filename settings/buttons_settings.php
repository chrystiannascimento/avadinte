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

$page = new admin_settingpage('theme_avadinte_buttons', get_string('buttons_settings', 'theme_avadinte'));
$page->add(new admin_setting_heading('theme_avadinte_buttons', get_string('buttons_headingsub', 'theme_avadinte'), format_text(get_string('buttons_desc' , 'theme_avadinte'), FORMAT_MARKDOWN)));
    //Buttons radius
    $name = 'theme_avadinte/buttonradius';
    $title = get_string('buttonradius', 'theme_avadinte');
    $description = get_string('buttonradiusdesc', 'theme_avadinte');
    $radchoices = $from0to6px;
    $setting = new admin_setting_configselect($name, $title, $description, '5px', $radchoices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Buttons background color.
    $name = 'theme_avadinte/buttoncolor';
    $title = get_string('buttoncolor', 'theme_avadinte');
    $description = get_string('buttoncolordesc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#690000', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Buttons background hover color.
    $name = 'theme_avadinte/buttonhovercolor';
    $title = get_string('buttonhovercolor', 'theme_avadinte');
    $description = get_string('buttonhovercolordesc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#690000', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Buttons text color.
    $name = 'theme_avadinte/buttontextcolor';
    $title = get_string('buttontextcolor', 'theme_avadinte');
    $description = get_string('buttontextcolordesc', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#ffffff', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Secondary Buttons background color.
    $name = 'theme_avadinte/buttoncolorscnd';
    $title = get_string('buttoncolorscnd', 'theme_avadinte');
    $description = get_string('buttoncolordescscnd', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#ced4da', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Secondary Buttons background hover color.
    $name = 'theme_avadinte/buttonhovercolorscnd';
    $title = get_string('buttonhovercolorscnd', 'theme_avadinte');
    $description = get_string('buttonhovercolordescscnd', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#ced4da', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Secondary Buttons text color.
    $name = 'theme_avadinte/buttontextcolorscnd';
    $title = get_string('buttontextcolorscnd', 'theme_avadinte');
    $description = get_string('buttontextcolordescscnd', 'theme_avadinte');
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#212529', $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

   

 // Must add the page after definiting all the settings!
$settings->add($page); 