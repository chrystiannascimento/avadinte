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
* Heading and course images settings page file.
*
* @packagetheme_fordson
* @copyright  2016 Chris Kenniburg
* @creditstheme_fordson - MoodleHQ
* @licensehttp://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_avadinte_banner', get_string('bannersettings', 'theme_avadinte'));
// Content Info
$name = 'theme_avadinte/textcontentinfo';
$heading = get_string('textcontentinfo', 'theme_avadinte');
$information = get_string('textcontentinfodesc', 'theme_avadinte');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);


// Show hide user enrollment toggle.
$name = 'theme_avadinte/showbanner';
$title = get_string('showbanner', 'theme_avadinte');
$description = get_string('showbanner_desc', 'theme_avadinte');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Banner title
$name = 'theme_avadinte/bannertitle';
$title = get_string('bannertitle', 'theme_avadinte');
$description = get_string('bannertitle_desc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Frontpage Textbox.
$name = 'theme_avadinte/bannertextbox';
$title = get_string('bannertextbox', 'theme_avadinte');
$description = get_string('bannertextbox_desc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);


// Must add the page after definiting all the settings!
$settings->add($page);