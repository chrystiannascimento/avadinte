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
 * Overriden theme boost core renderer.
 *
 * @package    theme_moove
 * @copyright  2017 Willian Mano - http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_avadinte\output;

use html_writer;
use custom_menu;
use action_menu_filler;
use action_menu_link_secondary;
use stdClass;
use moodle_url;
use action_menu;
use pix_icon;
use theme_config;
use core_text;
use help_icon;
use context_system;
use core_course_list_element;
use context_course;

use coding_exception;
use tabobject;
use tabtree;
use custom_menu_item;
use block_contents;
use navigation_node;
use action_link;
use preferences_groups;
use single_button;
use single_select;
use paging_bar;
use url_select;

defined('MOODLE_INTERNAL') || die;
require_once ($CFG->dirroot . "/course/renderer.php");

/**
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package    theme_moove
 * @copyright  2017 Willian Mano - http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_renderer extends \theme_boost\output\core_renderer {

    /**
     * Render the login signup form into a nice template for the theme.
     *
     * @param mform $form
     * @return string
     */
    public function render_login_signup_form($form) {
        global $SITE;

        $context = $form->export_for_template($this);

        $context['logourl'] = $this->get_logo();

        $context['sitename'] = format_string($SITE->fullname, true,
            ['context' => \context_course::instance(SITEID), "escape" => false]);

        return $this->render_from_template('core/signup_form_layout', $context);
    }


    public function topmenu() {
        global $PAGE, $COURSE, $CFG, $DB, $OUTPUT;
        $course = $this->page->course;
        $context = context_course::instance($course->id);
        $courseid = optional_param('course', SITEID, PARAM_INT);
        $courseid = $course->id;

        $topmenucontext = [];

        



        


        $siteadmintitle = get_string('siteadmintitle','theme_avadinte' );
        $siteadminurl = new moodle_url('/admin/search.php');
        $hasadminlink = has_capability('moodle/site:configview', $context);
        $hasadminlink = has_capability('moodle/site:configview', \context_system::instance());
        $siteadminisactive =$PAGE->url->compare($siteadminurl, URL_MATCH_BASE);
        $context = $this->page->context;
        $contextid = optional_param('contextid', \context_system::instance()->id, PARAM_INT);

        $topmenucontext[] =[
            'isadminlink' => $hasadminlink,
            'isactive' => $PAGE->url->compare($siteadminurl, URL_MATCH_BASE),
            'text' => get_string('siteadmintitle','theme_avadinte' ),
            'action' => new moodle_url('/admin/search.php'),
        ];

        //Pagina Inicial
        $homepagetitle = get_string('homepagetitle', 'theme_avadinte');
        $homepageurl = new moodle_url('/?redirect=0');
        $homepageisactive =$PAGE->url->compare($homepageurl, URL_MATCH_BASE);

        $topmenucontext[] =[
            'isadminlink' => '',
            'isactive' => $PAGE->url->compare($homepageurl, URL_MATCH_BASE),
            'text' => get_string('homepagetitle', 'theme_avadinte'),
            'action' => new moodle_url('/?redirect=0'),

        ];
        //Disciplinas
        

         //Disciplinas
         $mycoursespagetitle=get_string('mycoursespagetitle','theme_avadinte' );
         $mycoursespageurl= new moodle_url('/my/');
         //$coursespageisactive = $PAGE->url->compare($coursespageurl, URL_MATCH_BASE);
         $mycoursepageurl = new moodle_url('/course/view.php', array('id' => $courseid));
         $mycoursespageisactive = $PAGE->url->compare($mycoursespageurl, URL_MATCH_BASE) || $PAGE->url->compare($mycoursepageurl, URL_MATCH_BASE) ? true : false ;

         $topmenucontext[] =[
            'isadminlink' => '',
            'isactive' => $PAGE->url->compare($mycoursespageurl, URL_MATCH_BASE) || $PAGE->url->compare($mycoursepageurl, URL_MATCH_BASE) ? true : false,
            'text' => get_string('mycoursespagetitle','theme_avadinte' ),
            'action' => new moodle_url('/my/'),

        ];
         //Calendario
         $calendartitle = get_string('calendar','theme_avadinte' );

         $iscoursecalendar = $courseid != SITEID;

        if ($iscoursecalendar) {
            $calendarurl = new moodle_url('/calendar/view.php?view=month', array(
                'course' => $PAGE->course->id
            ));
        } else {
            $calendarurl = new moodle_url('/calendar/view.php?view=month' );
        }

        $calendarisactive =$PAGE->url->compare($calendarurl, URL_MATCH_BASE);

        $topmenucontext[] =[
            'isadminlink' =>'',
            'isactive' => $PAGE->url->compare($calendarurl, URL_MATCH_BASE),
            'text' => get_string('calendar','theme_avadinte' ),
            'action' => $calendarurl,

        ];

        //Central de Atendimentos 
        $attendtitle=get_string('attendtitle','theme_avadinte' );
        $attendurl= "http://atendimento.nead.ufma.br/view.php";

        $topmenucontext[] =[
            'isadminlink' =>'',
            'isactive' =>'',
            'text' => get_string('attendtitle','theme_avadinte' ),
            'action' =>"http://atendimento.nead.ufma.br/view.php",

        ];

        //Private File
        $privatefilestitle = get_string('privatefilestitle','theme_avadinte' );
        $privatefilesurl = new moodle_url('/user/files.php');
        $privatefilesisactive = $PAGE->url->compare($privatefilesurl, URL_MATCH_BASE);

        $topmenucontext[] =[
            'isadminlink' =>'',
            'isactive' => $PAGE->url->compare($privatefilesurl, URL_MATCH_BASE),
            'text' => get_string('privatefilestitle','theme_avadinte' ),
            'action' => new moodle_url('/user/files.php'),

        ];

        //Content bank
        $contentbanktitle = get_string('contentbanktitle','theme_avadinte' );
        $contentbankurl = new \moodle_url('/contentbank/index.php', ['contextid' => $contextid]);
        $contentbankisactive = $PAGE->url->compare($contentbankurl, URL_MATCH_BASE);
        
        $topmenucontext[] =[
            'isadminlink' =>'',
            'isactive' => $PAGE->url->compare($contentbankurl, URL_MATCH_BASE),
            'text' => get_string('contentbanktitle','theme_avadinte' ),
            'action' => new \moodle_url('/contentbank/index.php', ['contextid' => $contextid]),

        ];
        //Courses Page
        $coursespagetitle=get_string('coursespagetitle','theme_avadinte' );
        $coursespageurl= new moodle_url('/course/index.php');
        $coursespageisactive = $PAGE->url->compare($coursespageurl, URL_MATCH_BASE);

        $topmenucontext[] =[
            'isadminlink' => $hasadminlink,
            'isactive' => $PAGE->url->compare($coursespageurl, URL_MATCH_BASE),
            'text' => get_string('coursespagetitle','theme_avadinte' ),
            'action' => new moodle_url('/course/index.php'),

        ];


  
        
        
        // Send to template.
        $dashmenu = [  'hasadminlink' => $hasadminlink, 'siteadmintitle' => $siteadmintitle, 'siteadminurl' => $siteadminurl, 'siteadminisactive' => $siteadminisactive,
                        'homepagetitle'=>$homepagetitle, 'homepageurl'=>$homepageurl, 'homepageisactive' => $homepageisactive,
                        'mycoursespagetitle' => $mycoursespagetitle, 'mycoursespageurl' => $mycoursespageurl, 'mycoursespageisactive' => $mycoursespageisactive,
                        'calendartitle' => $calendartitle, 'calendarurl' => $calendarurl, 'calendarisactive' => $calendarisactive,
                        'attendtitle' => $attendtitle, 'attendurl' => $attendurl,
                        'privatefilestitle' => $privatefilestitle, 'privatefilesurl' => $privatefilesurl, 'privatefilesisactive' => $privatefilesisactive,
                        //'contentbanktitle' => $contentbanktitle, 'contentbankurl' => $contentbankurl, 'contentbankisactive' => $contentbankisactive,
                        'coursespagetitle' => $coursespagetitle, 'coursespageurl' => $coursespageurl, 'coursespageisactive' => $coursespageisactive,



                    ];

      
        return $this->render_from_template('theme_avadinte/topmenu', $dashmenu);
    }


    public function has_compact_logo() {
        global $OUTPUT;
        $logo = $OUTPUT->get_compact_logo_url();     
        return  !empty($logo);
    }

    protected function generate_sections_and_activities(stdClass $course) {
        global $CFG;
        require_once ($CFG->dirroot . '/course/lib.php');
        $modinfo = get_fast_modinfo($course);
        $sections = $modinfo->get_section_info_all();
        // For course formats using 'numsections' trim the sections list
        $courseformatoptions = course_get_format($course)->get_format_options();
        if (isset($courseformatoptions['numsections'])) {
            $sections = array_slice($sections, 0, $courseformatoptions['numsections'] + 1, true);
        }
        $activities = array();
        foreach ($sections as $key => $section) {
            // Clone and unset summary to prevent $SESSION bloat (MDL-31802).
            $sections[$key] = clone ($section);
            unset($sections[$key]->summary);
            $sections[$key]->hasactivites = false;
            if (!array_key_exists($section->section, $modinfo->sections)) {
                continue;
            }
            foreach ($modinfo->sections[$section->section] as $cmid) {
                $cm = $modinfo->cms[$cmid];
                $activity = new stdClass;
                $activity->id = $cm->id;
                $activity->course = $course->id;
                $activity->section = $section->section;
                $activity->name = $cm->name;
                $activity->icon = $cm->icon;
                $activity->iconcomponent = $cm->iconcomponent;
                $activity->hidden = (!$cm->visible);
                $activity->modname = $cm->modname;
                $activity->nodetype = navigation_node::NODETYPE_LEAF;
                $activity->onclick = $cm->onclick;
                $url = $cm->url;
                if (!$url) {
                    $activity->url = null;
                    $activity->display = false;
                }
                else {
                    $activity->url = $url->out();
                    $activity->display = $cm->is_visible_on_course_page() ? true : false;
                }
                $activities[$cmid] = $activity;
                if ($activity->display) {
                    $sections[$key]->hasactivites = true;
                }
            }
        }
        return array(
            $sections,
            $activities
        );
    }





    public function coursenav(){
        global $PAGE, $COURSE, $CFG, $DB, $OUTPUT;
        $icons = array('url' => 'fa fa-file-text', 
            'resource' => 'fa fa-file-text', 
            'forum' => 'fa fa-comments-o', 
            'feedback' => 'fa fa-pencil-square-o', 
            'page' => 'fa fa-file-text-o',
            'h5pactivity' => 'fa fa-file-text-o',
            'folder' => 'fa fa-folder-open-o',
            'assign' => 'fa fa-pencil-square-o',
            'data' => 'fa fa-database',
            'chat' => 'fa fa-commenting-o',
            'choice' => 'fa fa-question',
            'lti' => 'fa fa-puzzle-piece',
            'glossary' => 'fa fa-sort-alpha-asc', 
             );

        $course = $this->page->course;
        $context = context_course::instance($course->id);
        $courseid = optional_param('course', SITEID, PARAM_INT);
        $courseid = $course->id;
        $data = [];
        $items = array($this->page->navigation);
        $course  =  $DB -> get_record ( 'course' ,  array ( 'id'  =>  $courseid ) ) ; 
        $secandact = $this->generate_sections_and_activities($COURSE);
        $sections = $secandact[0];
        $activities = $secandact[1];
      



        $dados=[];


        foreach($activities as $activity) {
            $dados[$activity->section][]=[
                'action' => $activity->url,
                'text' => $activity->name,
                'shorttext' => $activity->name,
                'icon' => array_key_exists($activity->modname, $icons)? $icons[$activity->modname]:'',
                'type' => $activity->nodetype,
                'key' => $activity->id,
                'modname' => $activity->modname,
                'hidden' => $activity->hidden,
                
            ];

        }

        foreach($sections as $section){
                $sectionname = 'Unidade ' . $section->section;
                if($section->name){
                    $sectionname = $section->name;
                }
                if($section->section==0){
                    $sectionname = 'Informações gerais';
                }
                $data[] = [
                    'action' => 'topic' . $section->section,
                    'text' =>   $sectionname,
                    'shorttext' =>   $sectionname,
                    'icon' => 'fa fa-list',
                    'type' => \navigation_node::TYPE_SETTING,
                    'section'=> $section->section,
                    'issectionzero' => $section->section ==0?true: false, 
                    'key'=> $section->id,  
                   'hasactivites' => $section->hasactivites,
                    'activities' => $section->hasactivites ?$dados[$section->section]: false,
                ];
        }



        $courselinks =[];

        $admingrade = new moodle_url('/grade/report/grader/index.php', array(
            'id' => $PAGE->course->id));
        $studentgrade = new moodle_url('/grade/report/grader/index.php', array(
                'id' => $PAGE->course->id));
        $isstudent = !has_capability('moodle/course:viewhiddenactivities', $context);

        $courselinks[] =[
            
            'action' =>  $isstudent? $studentgrade : $admingrade,
            'text' =>get_string('gradebook', 'grades'),
            'shorttext' => get_string('gradebook', 'grades'),
            'icon' => 'fa fa-table fa-fw',
            'type' => \navigation_node::TYPE_SETTING,
            'key' => 'grades',
            ];
        $courselinks[] =[
        
            'action' =>  new moodle_url('/user/index.php', array('id' => $PAGE->course->id)),
            'text' =>  get_string('participants', 'moodle'),
            'shorttext' =>  get_string('participants', 'moodle'),
            'icon' => 'icon fa fa-users fa-fw',
            'type' => \navigation_node::TYPE_SETTING,
            'key' => 'participants',
            ];

            $contentbank =[
                'hascontentbank' => has_capability('moodle/contentbank:access', $context),        
                'action' =>  new moodle_url('/contentbank/index.php', ['contextid' => $context->id]),
                'text' =>  get_string('contentbank'),
                'shorttext' =>  get_string('contentbank'),
                'icon' => 'fa fa-shopping-bag',
                'type' => \navigation_node::TYPE_SETTING,
                'key' => 'contentbank',
            ];



      
        



       


        $cncontext = [
            'courselinks' => $courselinks,

            'topics' =>$data,
            'contentbank' => $contentbank


        ];
        return $this->render_from_template('theme_avadinte/sidebar_course', $cncontext);

    }



    public function coursesearch(){
        global $PAGE, $COURSE, $CFG, $DB, $OUTPUT;
        $renderer = $PAGE->get_renderer('core_course');
        $search = optional_param('search', '', PARAM_RAW); // Search words. Shortname, fullname, idnumber and summary get searched.


        return $renderer->search_courses('');

    }

    public function full_header() {
        $pageheaders=array("my-index" => get_string('mycoursespagetitle', 'theme_avadinte'),
                            "site-index" => get_string('homepagetitle', 'theme_avadinte'),
                            );
        $hasadmincap = has_capability('moodle/site:configview', \context_system::instance());
        if ($this->page->include_region_main_settings_in_header_actions() &&
                !$this->page->blocks->is_block_present('settings')) {
            // Only include the region main settings if the page has requested it and it doesn't already have
            // the settings block on it. The region main settings are included in the settings block and
            // duplicating the content causes behat failures.
            $this->page->add_header_action(html_writer::div(
                $this->region_main_settings_menu(),
                'd-print-none',
                ['id' => 'region-main-settings-menu']
            ));
        }
        $theme = theme_config::load('avadinte');
        $pagetype = $this->page->pagetype;
        $pageheader = '';
        if(array_key_exists($pagetype, $pageheaders)){
            $pageheader= $pageheaders[$pagetype];

        }
        

        $header = new stdClass();
        $header->hasadmincap = $hasadmincap;
        $header->pageheader = $pageheader;
        $header->settingsmenu = $this->context_header_settings_menu();
        $header->contextheader = $this->context_header();

        
        $header->hasnavbar = empty($this->page->layout_options['nonavbar']);
        $header->navbar = $this->navbar();
        $header->pageheadingbutton = $this->page_heading_button();
        $header->courseheader = $this->course_header();
        $header->headeractions = $this->page->get_header_actions();
        return $this->render_from_template('theme_avadinte/full_header', $header); 
    }


  



}


