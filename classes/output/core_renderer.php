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
 * @package    theme_avadinte
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
 * @package    theme_avadinte
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
        $theme = $theme = theme_config::load('avadinte');

        $topmenucontext = [];

        $siteadmintitle = get_string('siteadmintitle','theme_avadinte' );
        $siteadminurl = new moodle_url('/admin/search.php');
        $hasadminlink = has_capability('moodle/site:configview', $context);
        $hasadminlink = has_capability('moodle/site:configview', \context_system::instance());
        $siteadminisactive =$PAGE->url->compare($siteadminurl, URL_MATCH_BASE);
        $siteadminisactive = $this->page->pagelayout === 'admin' or strpos($this->page->pagetype, 'admin-') === 0 ? true: false;
        $context = $this->page->context;
        $contextid = optional_param('contextid', \context_system::instance()->id, PARAM_INT);

        $topmenucontext[] =[
            'isadminlink' => true,
            'key' => 'siteadmin',
            'isactive' => $siteadminisactive ,
             'text' => get_string('siteadmintitle','theme_avadinte' ),
            'action' => new moodle_url('/admin/search.php'),
        ];

        //Pagina Inicial
        $homepagetitle = get_string('homepagetitle', 'theme_avadinte');
        $homepageurl = new moodle_url('/?redirect=0');
        $homepageisactive =$PAGE->url->compare($homepageurl, URL_MATCH_BASE);

        if($theme->settings->enablehome){
            $topmenucontext[] =[
                'isadminlink' => '',
                'key' => 'sitehome',
                'isactive' => $PAGE->url->compare($homepageurl, URL_MATCH_BASE),
                'text' => get_string('homepagetitle', 'theme_avadinte'),
                'action' => new moodle_url('/?redirect=0'),
    
            ];
        }
        
        //Disciplinas
        

         //Disciplinas

         $mycoursespagetitle=get_string('mycoursespagetitle','theme_avadinte' );

         $mycoursespages=[];
         $mycoursespages[] = new moodle_url('/my/');
         $mycoursespages[] = new moodle_url('/course/view.php', array('id' => $courseid));
         $mycoursespages[] = $PAGE->cm ? new moodle_url('/mod/'.$PAGE->cm->modname.'/view.php', array('id' => $PAGE->cm->id)): new moodle_url('/my/');
         $mycoursespages[] = new moodle_url('/user/index.php', array('id' => $course->id));
         $mycoursespages[] = new moodle_url('/grade/report/grader/index.php', array('id'=>$course->id));

         $mycoursespageisactive = false;
         foreach($mycoursespages as $page){
             if($PAGE->url->compare($page, URL_MATCH_BASE)){
                 $mycoursespageisactive = true;
             }
         }
         $mycoursespageisactive = false;
         if($PAGE->url->compare(new moodle_url('/my/'), URL_MATCH_BASE) || $courseid>1 ){
            $mycoursespageisactive = true;
         }




         if($theme->settings->enablemyhome){
            $topmenucontext[] =[
                'isadminlink' => '',
                'key' => 'mycourses',
                'isactive' => $mycoursespageisactive,
                'text' => get_string('mycoursespagetitle','theme_avadinte' ),
                'action' => new moodle_url('/my/'),
            ];
         }
         
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

        if($theme->settings->enablecalendar){
            $topmenucontext[] =[
                'isadminlink' =>'',
                'key' => 'calendar',
                'isactive' => $PAGE->url->compare($calendarurl, URL_MATCH_BASE) && $courseid==1?true: false,
                'text' => get_string('calendar','theme_avadinte' ),
                'action' => $calendarurl,
            ];
        }

        




        

        //Central de Atendimentos 

        $attendtitle=get_string('attendtitle','theme_avadinte' );
        $attendurl= "http://atendimento.nead.ufma.br/view.php";
        if($theme->settings->enablecallcenter){
            $topmenucontext[] =[
                'isadminlink' =>'',
                'key' => 'callcenter',
                'isactive' =>'',
                'text' => get_string('attendtitle','theme_avadinte' ),
                'action' =>"http://atendimento.nead.ufma.br/view.php",
                'attr' => ' target="_blank"',
            ];
        }

        

        //Private File
        $privatefilestitle = get_string('privatefilestitle','theme_avadinte' );
        $privatefilesurl = new moodle_url('/user/files.php');
        $privatefilesisactive = $PAGE->url->compare($privatefilesurl, URL_MATCH_BASE);

    

        //Content bank
        $contentbanktitle = get_string('contentbanktitle','theme_avadinte' );
        $contentbankurl = new \moodle_url('/contentbank/index.php', ['contextid' => $contextid]);
        $contentbankisactive = $PAGE->url->compare($contentbankurl, URL_MATCH_BASE);
        
      
        //Courses Page
        $coursespagetitle=get_string('coursespagetitle','theme_avadinte' );
        $coursespageurl= new moodle_url('/course/index.php');
        $coursespageisactive = $PAGE->url->compare($coursespageurl, URL_MATCH_BASE);

        if($theme->settings->enablecourses){
            $topmenucontext[] =[
                'isadminlink' => true,
                'key' => 'courses',
                'isactive' => $PAGE->url->compare($coursespageurl, URL_MATCH_BASE),
                'text' => get_string('coursespagetitle','theme_avadinte' ),
                'action' => new moodle_url('/course/index.php'),
            ];
        }

        


  
        
        
        // Send to template.
        $dashmenu = [  
                        'topicos' => $topmenucontext,
                        'admincap' => $hasadminlink,



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

    //
    protected function generate_topics(stdClass $course) {
        global $CFG;
        require_once ($CFG->dirroot . '/course/lib.php');
        $modinfo = get_fast_modinfo($course);
        $sections = $modinfo->get_section_info_all();
        // For course formats using 'numsections' trim the sections list
        $courseformatoptions = course_get_format($course)->get_format_options();
        if (isset($courseformatoptions['numsections'])) {
            $sections = array_slice($sections, 0, $courseformatoptions['numsections'] + 1, true);
        }
        $topics=array();
        $activities = array();
        foreach ($sections as $key => $section) {
            // Clone and unset summary to prevent $SESSION bloat (MDL-31802).
            $sections[$key] = clone ($section);
            unset($sections[$key]->summary);
            $sections[$key]->hasactivites = false;
            $sections[$key]->activities = array();
            if (!array_key_exists($section->section, $modinfo->sections)) {
                continue;
            }
            foreach ($modinfo->sections[$section->section] as $cmid) {
                $cm = $modinfo->cms[$cmid];
                $activity = clone($cm);
                $sections[$key]->activities[$cmid] = $activity;
                if($cm->is_visible_on_course_page()){
                    $sections[$key]->hasactivites = true;
                }
                
            }
            
        }


        return $sections;

    }

    public function coursenav(){
        global $PAGE, $COURSE, $CFG, $DB, $OUTPUT, $USER;
 
        $course = $this->page->course;
        $context = context_course::instance($course->id);
        $courseid = $course->id;
        $data = [];
        $course  =  $DB -> get_record ( 'course' ,  array ( 'id'  =>  $courseid ) ) ; 

        //get sections and modules information
        $sections = $this->generate_topics($COURSE);

    
        $dados=[];
        $activesection=-1;
        $activeactivity=false;
        foreach($sections as $section){
            $activesection=-1;
            if($PAGE->url->compare(new moodle_url('/course/view.php', array('id'=>$courseid)),URL_MATCH_BASE)){
                $activesection = 0;
            }
            foreach($section->activities as $activity){

                if(isset($PAGE->cm->id)){
                    if($PAGE->cm->id == $activity->id){
                        $activesection=$activity->sectionnum;
                        $activeactivity = true;
                    }
                    else {
                        $activeactivity = false  ;
                    }
                }  else{
                    $activeactivity = false  ;
                }
                
                if( !$activity->deletioninprogress){
                    $dados[$activity->sectionnum][] = $this->get_activity_info( $activity, $activeactivity);
                }
            }
            if($section->hasactivites){
                $data[] = $this->get_section_info($section, $dados[$section->section], $activesection );
            } else{
                $data[] = $this->get_section_info($section, null, $activesection );
            }
            
        }


 
    


        $courselinks =[];

        $admingrade = new moodle_url('/grade/report/grader/index.php', array(
            'id' => $PAGE->course->id));
        $studentgrade = new moodle_url('/grade/report/user/index.php', array(
                'id' => $PAGE->course->id));
        $isstudent = !has_capability('moodle/course:viewhiddenactivities', $context);
        $urlgrade = $isstudent? $studentgrade : $admingrade;

        $courselinks[] =[
            
            'action' =>  $urlgrade,
            'text' =>get_string('gradebook', 'grades'),
            'shorttext' => get_string('gradebook', 'grades'),
            'icon' => 'fa fa-table fa-fw',
            'type' => \navigation_node::TYPE_SETTING,
            'key' => 'grades',
            'isactive' => $PAGE->url->compare($urlgrade, URL_MATCH_BASE),
            ];
        $urlparticipants = new moodle_url('/user/index.php', array('id' => $PAGE->course->id));
        $courselinks[] =[
        
            'action' => $urlparticipants  ,
            'text' =>  get_string('participants', 'moodle'),
            'shorttext' =>  get_string('participants', 'moodle'),
            'icon' => 'icon fa fa-users fa-fw',
            'type' => \navigation_node::TYPE_SETTING,
            'key' => 'participants',
            'isactive' => $PAGE->url->compare($urlparticipants , URL_MATCH_BASE),
            ];
            $urlcontentbank = new moodle_url('/contentbank/index.php', ['contextid' => $context->id]);
            $contentbank =[
                'hascontentbank' => has_capability('moodle/contentbank:access', $context),        
                'action' =>  $urlcontentbank,
                'text' =>  get_string('contentbank'),
                'shorttext' =>  get_string('contentbank'),
                'icon' => 'fa fa-shopping-bag',
                'type' => \navigation_node::TYPE_SETTING,
                'key' => 'contentbank',
                'isactive' => $PAGE->url->compare($urlcontentbank , URL_MATCH_BASE),
            ];

        $cncontext = [
            'courselinks' => $courselinks,
            'topics' =>$data,
            'contentbank' => $contentbank
        ];

        return $this->render_from_template('theme_avadinte/sidebar_course', $cncontext);

    }

    

    protected function get_section_info($section, $activities, $activesection) {
        global $PAGE, $COURSE, $CFG, $DB, $OUTPUT, $USER;
        
        $course = $this->page->course;
        $context = context_course::instance($course->id);
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



        $sectionname = 'Unidade ' . $section->section;
        if($section->name){
            $sectionname = $section->name;
        }
        if($section->section==0){
            $sectionname = get_string( "board","theme_avadinte");
        }
        $action='';
        if($course->format=='topics'){
            $url = new moodle_url('/course/view.php', array('id' => $PAGE->course->id, 'section' => $section->section));
            $action = 'href= ' . $url;
        }
        if($course->format == 'buttons' && $section->section==0) {
            $url = new moodle_url('/course/view.php', array('id' => $PAGE->course->id));

            $action =  'href=' .'"'. $url . '"' ;
        }
        //define tooltip
        $canviewhidden = has_capability('moodle/course:viewhiddenactivities', $context);
        $tooltip = '';
        //seção oculta
        if(!$section->visible) {
            if ($canviewhidden){
                $tooltip = get_string('hiddenfromstudents');

            }
            else {
                $tooltip = get_string('notavailable');

            }
        //seção restrita
        } else if ($section->availableinfo) {
                $tooltip = strip_tags($section->availableinfo);
            


        }



        $section_info = [
            'action' => $action,//'topic' . $section->section,
            'text' =>   $sectionname,
            'shorttext' =>   $sectionname,
            'icon' => 'fa fa-list',
            'type' => \navigation_node::TYPE_SETTING,
            'section'=> $section->section,
            'issectionzero' => $section->section ==0?true: false,                     
            'key'=> $section->id,  
           'hasactivites' => $section->hasactivites,
            'activities' => $section->hasactivites ? $activities : false,
            'issectionactive' => $activesection==$section->section?true:false,
            'sectionavailable' => $section->available,
            'availableinfo' => strip_tags($section->availableinfo),
            'available' => $section->available,
            'visible' => $section->visible,
            'availability' => $section->availability,
            'uservisible' =>  $section->uservisible,
            'dimmed' => !$section->available or !$section->visible?true:false,
            'tooltip' => $tooltip,
        ];
        return $section_info;

    }

    protected function get_activity_info( $activity, $activeactivity){

        global $PAGE, $COURSE, $CFG, $DB, $OUTPUT, $USER;
        $course = $this->page->course;
        $courserenderer = $this->page->get_renderer('core', 'course');
        $context = context_course::instance($course->id);
        $completioninfo = new \completion_info($course);
        
        $displayoptions = array(); 
     
        

        
        
        if($activity->deletioninprogress){
            return ;
        }
        $hiddentouser = (!$activity->visible and !has_capability('moodle/course:viewhiddenactivities', $context));
        $restricttouser = (!$activity->available and has_capability('moodle/course:ignoreavailabilityrestrictions', $context));
        $ignoreavailabilityrestrictions = has_capability('moodle/course:ignoreavailabilityrestrictions', $context);

        //define tooltip
        $canviewhidden = has_capability('moodle/course:viewhiddenactivities', $context);
        $ignorerestrictions = has_capability('moodle/course:ignoreavailabilityrestrictions', $context);
        $tooltip = '';
        //atividade oculta
        if(!$activity->visible) {
            if ($canviewhidden){
                $tooltip = get_string('hiddenfromstudents');

            }
            else {
                $tooltip = get_string('notavailable');

            }
        //atividade restrita
        } else if ($activity->availableinfo) {
                $tooltip = strip_tags($activity->availableinfo);
            
        }

        $url = '';
        if ($activity->url) {
            $url = $activity->url->out();
        }
        $notfy = strip_tags($activity->afterlink);
        $numbernotfy='';
        preg_match_all('!\d+!', $notfy, $numbernotfy); 
        
        
       

     


        $activity_info=[
            'action' => $url,
            'text' => $activity->name,
            'shorttext' => $activity->name,
            'icon' => $OUTPUT->image_icon('icon', get_string('pluginname', $activity->modname), $activity->modname), //array_key_exists($activity->modname, $icons)? $icons[$activity->modname]:'',
            'type' => navigation_node::NODETYPE_LEAF,
            'key' => $activity->id,
            'modname' => $activity->modname,
            'hidden' => !$activity->visible,
            'hiddentouser' => $hiddentouser,//$activity->hidden,
            'completion_state' => $completioninfo->get_data($activity, true, $USER->id)->completionstate,
            'modicon' => $courserenderer->course_section_cm_completion($course, $completioninfo,$activity, $displayoptions ),
            'isactive' => $activeactivity,
            'available' => $activity->available,
            'availableinfo' => strip_tags($activity->availableinfo),
            'restricttouser' => $restricttouser,
            'ignoreavailabilityrestrictions' => $ignoreavailabilityrestrictions,
            'dimmed' => !$activity->available or !$activity->visible?true:false, 
            'noaction' => !$activity->available and !$ignorerestrictions ? true:false,
            'notfy' =>strip_tags($activity->afterlink),
            'numbernotfy' => $numbernotfy[0]?$numbernotfy[0][0] :'',
            
            'tooltip' => $tooltip ,


            
        ];
        return $activity_info;


    }







    public function coursenav2(){
        global $PAGE, $COURSE, $CFG, $DB, $OUTPUT, $USER;
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

        $modinfo = get_fast_modinfo($course);
        $completioninfo = new \completion_info($course);
        $courserenderer = $this->page->get_renderer('core', 'course');
        $displayoptions = array();

        //$courserenderer->course_section_cm_completion($course, $completioninfo,, $displayoptions = array());
      



        $dados=[];
        $activesection=0;
        $activeactivity=false;


 
        foreach($activities as $activity) {
            $fullactivity = $modinfo->cms[$activity->id];
            

       

            if($PAGE->url->compare( new moodle_url($fullactivity->url), URL_MATCH_BASE)  ){
                $pageparams= $PAGE->url->params();
                $activityparams = $fullactivity->url->params();
                    if ( $pageparams['id']==$activityparams['id']){
                    $activesection=$activity->section;
            
                    $activeactivity = true;
                }
                else{
                    $activeactivity = false  ;
                } 
            } else{
                $activeactivity = false  ;
            } 
            

            
            
            if($fullactivity->deletioninprogress){
                continue;
            }
            $hiddentouser = ($activity->hidden and !has_capability('moodle/course:viewhiddenactivities', $context));
            $restricttouser = (!$fullactivity->available and has_capability('moodle/course:ignoreavailabilityrestrictions', $context));
            $ignoreavailabilityrestrictions = has_capability('moodle/course:ignoreavailabilityrestrictions', $context);

            //define tooltip
            $canviewhidden = has_capability('moodle/course:viewhiddenactivities', $context);
            $ignorerestrictions = has_capability('moodle/course:ignoreavailabilityrestrictions', $context);
            $tooltip = '';
            //atividade oculta
            if(!$fullactivity->visible) {
                if ($canviewhidden){
                    $tooltip = get_string('hiddenfromstudents');

                }
                else {
                    $tooltip = get_string('notavailable');

                }
            //atividade restrita
            } else if ($fullactivity->availableinfo) {
                    $tooltip = strip_tags($fullactivity->availableinfo);
                
            }



            $dados[$activity->section][]=[
                'action' => $activity->url,
                'text' => $activity->name,
                'shorttext' => $activity->name,
                'icon' => $OUTPUT->image_icon('icon', get_string('pluginname', $activity->modname), $activity->modname), //array_key_exists($activity->modname, $icons)? $icons[$activity->modname]:'',
                'type' => $activity->nodetype,
                'key' => $activity->id,
                'modname' => $activity->modname,
                'hidden' => $activity->hidden,
                'hiddentouser' => $hiddentouser,//$activity->hidden,
                'completion_state' => $completioninfo->get_data($activity, true, $USER->id)->completionstate,
                'modicon' => $courserenderer->course_section_cm_completion($course, $completioninfo,$fullactivity, $displayoptions ),
                'isactive' => $activeactivity,
                'available' => $fullactivity->available,
                'availableinfo' => strip_tags($fullactivity->availableinfo),
                'restricttouser' => $restricttouser,
                'ignoreavailabilityrestrictions' => $ignoreavailabilityrestrictions,
                'dimmed' => !$fullactivity->available or !$fullactivity->visible?true:false, 
                'noaction' => !$fullactivity->available and !$ignorerestrictions ? true:false,
                
                'tooltip' => $tooltip ,


                
            ];  

        }

        foreach($sections as $section){

                $sectionname = 'Unidade ' . $section->section;
                if($section->name){
                    $sectionname = $section->name;
                }
                if($section->section==0){
                    $sectionname = get_string( "board","theme_avadinte");
                }
                $action='';
                if($course->format=='topics'){
                    $url = new moodle_url('/course/view.php', array('id' => $PAGE->course->id, 'section' => $section->section));
                    $action = 'href= ' . $url;
                }
                if($course->format == 'buttons' && $section->section==0) {
                    $url = new moodle_url('/course/view.php', array('id' => $PAGE->course->id));

                    $action =  'href=' .'"'. $url . '"' ;
                }
                //define tooltip
                $canviewhidden = has_capability('moodle/course:viewhiddenactivities', $context);
                $tooltip = '';
                //seção oculta
                if(!$section->visible) {
                    if ($canviewhidden){
                        $tooltip = get_string('hiddenfromstudents');

                    }
                    else {
                        $tooltip = get_string('notavailable');

                    }
                //seção restrita
                } else if ($section->availableinfo) {
                        $tooltip = strip_tags($section->availableinfo);
                    


                }


                $data[] = [
                    'action' => $action,//'topic' . $section->section,
                    'text' =>   $sectionname,
                    'shorttext' =>   $sectionname,
                    'icon' => 'fa fa-list',
                    'type' => \navigation_node::TYPE_SETTING,
                    'section'=> $section->section,
                    'issectionzero' => $section->section ==0?true: false,                     
                    'key'=> $section->id,  
                   'hasactivites' => $section->hasactivites,
                    'activities' => $section->hasactivites ?$dados[$section->section]: false,
                    'issectionactive' => $activesection==$section->section?true:false,
                    'sectionavailable' => $section->available,
                    'availableinfo' => strip_tags($section->availableinfo),
                    'available' => $section->available,
                    'visible' => $section->visible,
                    'availability' => $section->availability,
                    'uservisible' =>  $section->uservisible,
                    'dimmed' => !$section->available or !$section->visible?true:false,
                    'tooltip' => $tooltip,
                ];
        }



        $courselinks =[];

        $admingrade = new moodle_url('/grade/report/grader/index.php', array(
            'id' => $PAGE->course->id));
        $studentgrade = new moodle_url('/grade/report/user/index.php', array(
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
        $header->showcourseheader = $theme->settings->showcourseheader;

        return $this->render_from_template('theme_avadinte/full_header', $header); 
    }


    public function banner() {
        $theme = theme_config::load('avadinte');
        $bannerenable = $theme->settings->bannerenable;
        $bannertitle = $theme->settings->bannertitle;
        $bannercontent = $theme->settings->bannercontent;
        $bannerdismiss = $theme->settings->bannerdismiss;
        $bannershowonpages = $theme->settings->bannershowonpages;
        $bannerconfirm = $theme->settings->bannerconfirm;
        $banneruserprefdismissed =  get_user_preferences('theme_avadinte_infobanner_dismissed');

        $templatecontext = [
            'bannercontent' => $bannercontent,
            'bannertitle' => $bannertitle
        ];

        if($bannerenable){
            if($bannerdismiss && $banneruserprefdismissed){
                return '';
                 
            } else {
                return $this->render_from_template('theme_avadinte/banner', $templatecontext); 
                set_user_preferences('theme_avadinte_infobanner_dismissed', true);
            }
            
        } else {
            return '';
        }
        
    }
    
     /**
     * Render the navbar
     *
     * @return string
     */
    public function navbar() {
        global $PAGE;
        $items = $this->page->navbar->get_items();
        if(empty($items)){
            return '';
        }
        

        $breadcrumbs=[];
        if($PAGE->course->id>1){
            $breadcrumbs[]=[
                "has_action"=> true,
                    "action"=> new moodle_url('/my/'),
                    "get_title"=> "Meus Cursos",
                    "get_content"=> "Meus Cursos",
                    "is_hidden"=> false
            ];
        }
        foreach($items as $item){
            if($item->key == "home" || $item->key =="myhome") continue;
            if($item->get_content()==get_string('mycourses')) continue;
            $breadcrumbs[] = $item;


        }
        return $this->render_from_template('core/navbar', ['get_items' => $breadcrumbs]);
    }




    /*
     public function navbar() {
        $items = $this->page->navbar->get_items();
        $breadcrumbseparator = $this->page->theme->settings->breadcrumbseparator;

        $breadcrumbs = "";

        if (empty($items)) {
            return '';
        }

        $i = 0;

        foreach ($items as $item) {
            $item->hideicon = true;

            // Text / Icon home.
            if ($i++ == 0) {
                $breadcrumbs .= '<li>';

                if (get_config('theme_avadinte', 'enablehome') && get_config('theme_avadinte', 'enablemyhome')) {
                    $breadcrumbs = html_writer::tag('i', '', array(
                            'title' => get_string('home', 'theme_avadinte'),
                            'class' => 'fa fa-folder-open fa-lg'
                    )
                            );
                } else if (get_config('theme_avadinte', 'breadcrumbhome') == 'icon') {
                    $breadcrumbs .= html_writer::link(new moodle_url('/'),
                            // Adds in a title for accessibility purposes.
                            html_writer::tag('i', '', array(
                                    'title' => get_string('home', 'theme_avadinte'),
                                    'class' => 'fa fa-home fa-lg')
                                    )
                            );
                    $breadcrumbs .= '</li>';
                } else {
                    $breadcrumbs .= html_writer::link(new moodle_url('/'), get_string('home', 'theme_avadinte'));
                    $breadcrumbs .= '</li>';
                }
                continue;
            }

            $breadcrumbs .= '<span class="separator"><i class="fa-'.$breadcrumbseparator.' fa"></i>
                             </span><li>'.$this->render($item).'</li>';

        } // End loop.

        $classes = array();

        return '<nav role="navigation" aria-label="'. get_string("breadcrumb", "theme_adaptable") .'">
            <ol  class="breadcrumb ' . $classes . '">'.$breadcrumbs.'</ol>
        </nav>';
    }
    */


    public function body_attributes($additionalclasses = array()) {
        $hasaccessibilitybar = get_user_preferences('themeavadintesettings_enableaccessibilitytoolbar', '');
        if ($hasaccessibilitybar) {
            $additionalclasses[] = 'hasaccessibilitybar';

            $currentfontsizeclass = get_user_preferences('accessibilitystyles_fontsizeclass', '');
            if ($currentfontsizeclass) {
                $additionalclasses[] = $currentfontsizeclass;
            }

            $currentsitecolorclass = get_user_preferences('accessibilitystyles_sitecolorclass', '');
            if ($currentsitecolorclass) {
                $additionalclasses[] = $currentsitecolorclass;
            } 
        }

        $fonttype = get_user_preferences('themeavadintesettings_fonttype', '');
        if ($fonttype) {
            $additionalclasses[] = $fonttype;
        }

        if (!is_array($additionalclasses)) {
            $additionalclasses = explode(' ', $additionalclasses);
        }

        return ' id="'. $this->body_id().'" class="'.$this->body_css_classes($additionalclasses).'"';
    }

    public function contacts_footer() {
        $theme = theme_config::load('avadinte');
        $setting = $theme->settings->contacts;

        return $setting != '' ? $setting : '';
    }
    public function phone1_footer() {
        $theme = theme_config::load('avadinte');
        $setting = $theme->settings->phone1;
        return $setting != '' ? $setting : '';
    }

    public function phone2_footer() {
        $theme = theme_config::load('avadinte');
        $setting = $theme->settings->phone2;
        return $setting != '' ? $setting : '';
    }

    public function phone3_footer() {
        $theme = theme_config::load('avadinte');
        $setting = $theme->settings->phone3;
        return $setting != '' ? $setting : '';
    }

    public function phone4_footer() {
        $theme = theme_config::load('avadinte');
        $setting = $theme->settings->phone4;
        return $setting != '' ? $setting : '';
    }

    public function phone5_footer() {
        $theme = theme_config::load('avadinte');
        $setting = $theme->settings->phone5;
        return $setting != '' ? $setting : '';
    }

    public function phone6_footer() {
        $theme = theme_config::load('avadinte');
        $setting = $theme->settings->phone6;
        return $setting != '' ? $setting : '';
    }

    public function phone7_footer() {
        $theme = theme_config::load('avadinte');
        $setting = $theme->settings->phone7;
        return $setting != '' ? $setting : '';
    }

 
    public function mail_footer() {
        $theme = theme_config::load('avadinte');
        $setting = $theme->settings->brandemail;
        return $setting != '' ? $setting : '';
    }

    public function sticky_top() {
        $theme = theme_config::load('avadinte');
        $setting = $theme->settings->topnavbarsticky;
        return $setting != '' ? $setting : '';
    }




    public function social_icons() {
        global $PAGE;
        $hasfacebook = (empty($PAGE->theme->settings->facebook)) ? false : $PAGE->theme->settings->facebook;
        $hastwitter = (empty($PAGE->theme->settings->twitter)) ? false : $PAGE->theme->settings->twitter;
        $hasyoutube = (empty($PAGE->theme->settings->youtube)) ? false : $PAGE->theme->settings->youtube;
        $hasinstagram = (empty($PAGE->theme->settings->instagram)) ? false : $PAGE->theme->settings->instagram;
        $hasskype = (empty($PAGE->theme->settings->skype)) ? false : $PAGE->theme->settings->skype;
        $haswebsite = (empty($PAGE->theme->settings->website)) ? false : $PAGE->theme->settings->website;
        $hasblog = (empty($PAGE->theme->settings->blog)) ? false : $PAGE->theme->settings->blog;
        $hassocial1 = (empty($PAGE->theme->settings->social1)) ? false : $PAGE->theme->settings->social1;
        $social1icon = (empty($PAGE->theme->settings->socialicon1)) ? 'globe' : $PAGE->theme->settings->socialicon1;
        $hassocial2 = (empty($PAGE->theme->settings->social2)) ? false : $PAGE->theme->settings->social2;
        $social2icon = (empty($PAGE->theme->settings->socialicon2)) ? 'globe' : $PAGE->theme->settings->socialicon2;
        $hassocial3 = (empty($PAGE->theme->settings->social3)) ? false : $PAGE->theme->settings->social3;
        $social3icon = (empty($PAGE->theme->settings->socialicon3)) ? 'globe' : $PAGE->theme->settings->socialicon3;
        $socialcontext = [
        // If any of the above social networks are true, sets this to true.
        'hassocialnetworks' => ($hasfacebook || $hastwitter   || $hasinstagram    || $hasskype  || $haswebsite || $hasyoutube || $hasblog   || $hassocial1 || $hassocial2 || $hassocial3) ? true : false, 'socialicons' => array(
            array(
                'haslink' => $hasfacebook,
                'linkicon' => 'facebook'
            ) ,
            array(
                'haslink' => $hastwitter,
                'linkicon' => 'twitter'
            ) ,
            array(
                'haslink' => $hasyoutube,
                'linkicon' => 'youtube'
            ) ,
            array(
                'haslink' => $hasinstagram,
                'linkicon' => 'instagram'
            ) ,
            array(
                'haslink' => $hasskype,
                'linkicon' => 'skype'
            ) ,
            array(
                'haslink' => $haswebsite,
                'linkicon' => 'globe'
            ) ,
            array(
                'haslink' => $hasblog,
                'linkicon' => 'bookmark'
            ) ,
            array(
                'haslink' => $hassocial1,
                'linkicon' => $social1icon
            ) ,
            array(
                'haslink' => $hassocial2,
                'linkicon' => $social2icon
            ) ,
            array(
                'haslink' => $hassocial3,
                'linkicon' => $social3icon
            ) ,
        ) ];
        return $this->render_from_template('theme_avadinte/socialicons', $socialcontext);
    }
  



}


