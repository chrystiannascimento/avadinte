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
* Social networking settings page file.
*
* @package    theme_avadinte
* @copyright  2016 Chris Kenniburg
* @credits    theme_boost - MoodleHQ
* @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

/* Social Network Settings */
$page = new admin_settingpage('theme_avadinte_footer', get_string('footerheading', 'theme_avadinte'));
$page->add(new admin_setting_heading('theme_avadinte_footer', get_string('footerheadingsub', 'theme_avadinte'), format_text(get_string('footerdesc' , 'theme_avadinte'), FORMAT_MARKDOWN)));

// footer branding
$name = 'theme_avadinte/contacts';
$title = get_string('contacts', 'theme_avadinte');
$description = get_string('contactsdesc', 'theme_avadinte');
$default = get_string('contacts', 'theme_avadinte');
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// footer branding
$name = 'theme_avadinte/website';
$title = get_string('website', 'theme_avadinte');
$description = get_string('websitedesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// footer branding
$name = 'theme_avadinte/phone1';
$title = get_string('phone1', 'theme_avadinte');
$description = get_string('phonedesc', 'theme_avadinte');
$default = 'Direção - 3272-8054';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_avadinte/phone2';
$title = get_string('phone2', 'theme_avadinte');
$description = get_string('phonedesc', 'theme_avadinte');
$default = 'Coordenação Administrativa - 3272-8055';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_avadinte/phone3';
$title = get_string('phone3', 'theme_avadinte');
$description = get_string('phonedesc', 'theme_avadinte');
$default = 'Coordenação de Cursos e Tutoria - 3272-8059';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_avadinte/phone4';
$title = get_string('phone4', 'theme_avadinte');
$description = get_string('phonedesc', 'theme_avadinte');
$default = 'Secretaria de Cursos - 3272-8059';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_avadinte/phone5';
$title = get_string('phone5', 'theme_avadinte');
$description = get_string('phonedesc', 'theme_avadinte');
$default = 'Coordenação UAB - 3272-8058';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_avadinte/phone6';
$title = get_string('phone6', 'theme_avadinte');
$description = get_string('phonedesc', 'theme_avadinte');
$default = 'Coordenação Pedagógica - 3272-8054';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_avadinte/phone7';
$title = get_string('phone7', 'theme_avadinte');
$description = get_string('phonedesc', 'theme_avadinte');
$default = 'Coordenação Tecnológica - 3272-8060';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);





// footer branding
$name = 'theme_avadinte/mail';
$title = get_string('mail', 'theme_avadinte');
$description = get_string('maildesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);


// This is the descriptor for socialicons
$name = 'theme_avadinte/socialiconsinfo';
$heading = get_string('footerheadingsocial', 'theme_avadinte');
$information = get_string('footerdesc', 'theme_avadinte');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);


// Website url setting.
$name = 'theme_avadinte/website';
$title = get_string('website', 'theme_avadinte');
$description = get_string('websitedesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Blog url setting.
$name = 'theme_avadinte/blog';
$title = get_string('blog', 'theme_avadinte');
$description = get_string('blogdesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Facebook url setting.
$name = 'theme_avadinte/facebook';
$title = get_string(        'facebook', 'theme_avadinte');
$description = get_string(      'facebookdesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);



// Twitter url setting.
$name = 'theme_avadinte/twitter';
$title = get_string('twitter', 'theme_avadinte');
$description = get_string('twitterdesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);


// Instagram url setting.
$name = 'theme_avadinte/instagram';
$title = get_string('instagram', 'theme_avadinte');
$description = get_string('instagramdesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// YouTube url setting.
$name = 'theme_avadinte/youtube';
$title = get_string('youtube', 'theme_avadinte');
$description = get_string('youtubedesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Skype url setting.
$name = 'theme_avadinte/skype';
$title = get_string('skype', 'theme_avadinte');
$description = get_string('skypedesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// General social url setting 1.
$name = 'theme_avadinte/social1';
$title = get_string('sociallink', 'theme_avadinte');
$description = get_string('sociallinkdesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Social icon setting 1.
$name = 'theme_avadinte/socialicon1';
$title = get_string('sociallinkicon', 'theme_avadinte');
$description = get_string('sociallinkicondesc', 'theme_avadinte');
$default = 'home';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$page->add($setting);

// General social url setting 2.
$name = 'theme_avadinte/social2';
$title = get_string('sociallink', 'theme_avadinte');
$description = get_string('sociallinkdesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Social icon setting 2.
$name = 'theme_avadinte/socialicon2';
$title = get_string('sociallinkicon', 'theme_avadinte');
$description = get_string('sociallinkicondesc', 'theme_avadinte');
$default = 'home';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$page->add($setting);

// General social url setting 3.
$name = 'theme_avadinte/social3';
$title = get_string('sociallink', 'theme_avadinte');
$description = get_string('sociallinkdesc', 'theme_avadinte');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Social icon setting 3.
$name = 'theme_avadinte/socialicon3';
$title = get_string('sociallinkicon', 'theme_avadinte');
$description = get_string('sociallinkicondesc', 'theme_avadinte');
$default = 'home';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$page->add($setting);

// Must add the page after definiting all the settings!
$settings->add($page);
