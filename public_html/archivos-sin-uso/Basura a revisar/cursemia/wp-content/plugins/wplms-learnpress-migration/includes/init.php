<?php
/**
 * Initialization functions for WPLMS LEARNPRESS MIGRATION
 * @author      VibeThemes
 * @category    Admin
 * @package     Initialization
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class WPLMS_LEARNPRESS_INIT{

    public static $instance;
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new WPLMS_LEARNPRESS_INIT();

        return self::$instance;
    }

    private function __construct(){
    	if ( in_array( 'learnpress/learnpress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || (function_exists('is_plugin_active') && is_plugin_active( 'learnpress/learnpress.php'))) {

    		//Notice for migration
			add_action( 'admin_notices',array($this,'migration_notice' ));
			//Migrate courses
			add_action('wp_ajax_migration_wp_lp_courses',array($this,'migration_wp_lp_courses'));
			add_action('wp_ajax_migration_wp_lp_course_to_wplms',array($this,'migration_wp_lp_course_to_wplms'));
			//Revert Changes
            add_action('wp_ajax_revert_migrated_courses',array($this,'revert_migrated_courses'));
            //Dismiss Revert Notice
            add_action('wp_ajax_dismiss_message',array($this,'dismiss_message'));

            add_filter('the_content',array($this,'add_quesiton_title_in_content'));
		}
    }// End of construct function


    //Add question title on content.
    function add_quesiton_title_in_content($content){
        global $post;

        if($post->post_type == 'question'){
            $content = '<strong>'.$post->post_title.'</strong><br>'.$content;
        }

        return $content;
    }

    function migration_notice(){
    	$this->migration_status = get_option('wplms_wp_lp_migration');
        $this->revert_status = get_option('wplms_wp_lp_migration_reverted');

        $check = 1;
        if(!function_exists('woocommerce')){
            $check = 0;
            ?>
            <div class="welcome-panel" id="welcome_lpm_panel" style="padding-bottom:20px;width:96%">
                <h1><?php echo __('Please note that the Woocommerce plugin must be activated if using paid courses.','wplms-lp'); ?></h1>
	            <p><?php echo __('If its already activated then please click on the button below to proceed to migration proccess','wplms-lp'); ?></p>
	            <form method="POST">
	                <input name="click" type="submit" value="<?php echo __('Click Here','wplms-lp'); ?>" class="button">
	            </form>
            </div>
            <?php
        }
        if(isset($_POST['click'])){
            $check = 1;
            ?> <style> #welcome_lpm_panel{display:none;} </style> <?php
        }

        //Migration process
        if(empty($this->migration_status) && $check){
        	?>
    		<div id="migration_learnpress_courses" class="error notice ">
    			<p id="lpm_message"><?php printf( __('Migrate Learnpress coruses to WPLMS %s Begin Migration Now %s', 'wplms-lp' ),'<a id="begin_wplms_learnpress_migration" class="button primary">','</a>'); ?>
		       	
		       </p>
		       <?php wp_nonce_field('security','security'); ?>
		       <style>.wplms_lp_progress .bar{-webkit-transition: width 0.5s ease-in-out;
    -moz-transition: width 1s ease-in-out;-o-transition: width 1s ease-in-out;transition: width 1s ease-in-out;}</style>
    			<script>
		        	jQuery(document).ready(function($){
		        		$('#begin_wplms_learnpress_migration').on('click',function(){
			        		$.ajax({
			                    type: "POST",
			                    dataType: 'json',
			                    url: ajaxurl,
			                    data: { action: 'migration_wp_lp_courses', 
			                              security: $('#security').val(),
			                            },
			                    cache: false,
			                    success: function (json) {

			                    	$('#migration_learnpress_courses').append('<div class="wplms_lp_progress" style="width:100%;margin-bottom:20px;height:10px;background:#fafafa;border-radius:10px;overflow:hidden;"><div class="bar" style="padding:0 1px;background:#37cc0f;height:100%;width:0;"></div></div>');

			                    	var x = 0;
			                    	var width = 100*1/json.length;
			                    	var number = 0;
									var loopArray = function(arr) {
									    wplp_ajaxcall(arr[x],function(){
									        x++;
									        if(x < arr.length) {
									         	loopArray(arr);   
									        }
									    }); 
									}
									
									// start 'loop'
									loopArray(json);

									function wplp_ajaxcall(obj,callback) {
										
				                    	$.ajax({
				                    		type: "POST",
						                    dataType: 'json',
						                    url: ajaxurl,
						                    data: {
						                    	action:'migration_wp_lp_course_to_wplms', 
						                        security: $('#security').val(),
						                        id:obj.id,
						                    },
						                    cache: false,
						                    success: function (html) {
						                    	number = number + width;
						                    	$('.wplms_lp_progress .bar').css('width',number+'%');
						                    	if(number >= 100){
                                                    $('#migration_learnpress_courses').removeClass('error');
                                                    $('#migration_learnpress_courses').addClass('updated');
                                                    $('#lpm_message').html('<strong>'+x+' '+'<?php _e('Courses successfully migrated from Learnpress to WPLMS','wplms-lp'); ?>'+'</strong>');
										        }
						                    }
				                    	});
									    // do callback when ready
									    callback();
									}
			                    }
			                });
		        		});
		        	});
		        </script>
    		</div>
    		<?php
        }

        //Revert Process
        if(!empty($this->migration_status && empty($this->revert_status))){
        	?>
        	<div id="migration_learnpress_courses_revert" class="update-nag notice ">
               <p id="revert_message"><?php printf( __('LEARNPRESS Courses migrated to WPLMS: Want to revert changes %s Revert Changes Now %s Otherwise dismiss this notice.', 'wplms-lp' ),'<a id="begin_revert_migration" class="button primary">','</a><a id="dismiss_message" href=""><i class="fa fa-times-circle-o"></i>Dismiss</a>'); ?>
               </p>
               	<?php wp_nonce_field('security','security'); ?>
	            <style>
	                #migration_learnpress_courses_revert{width:97%;} 
	                #dismiss_message {float:right;padding:5px 10px 10px 10px;color:#e00000;}
	                #dismiss_message i {padding-right:3px;}
	            </style>
            </div>
            <script>
                jQuery(document).ready(function($){
                    $('#begin_revert_migration').on('click',function(){
                        $.ajax({
                            type: "POST",
                            url: ajaxurl,
                            data: { action: 'revert_migrated_courses', 
                                      security: $('#security').val(),
                                    },
                            cache: false,
                            success: function () {
                                $('#migration_learnpress_courses_revert').removeClass('update-nag');
                                $('#migration_learnpress_courses_revert').addClass('updated');
                                $('#migration_learnpress_courses_revert').html('<p id="revert_message">'+'<?php _e('WPLMS - LEARNPRESS MIGRATION : Migrated courses Reverted !', 'wplms-lp' ); ?>'+'</p>');
                            }
                        });
                    });
                    $('#dismiss_message').on('click',function(){
                        $.ajax({
                            type: "POST",
                            url: ajaxurl,
                            data: { action: 'dismiss_message', 
                                      security: $('#security').val(),
                                    },
                            cache: false,
                            success: function () {
                                
                            }
                        });
                    });
                });
            </script>
        	<?php
        }
    }

    function migration_wp_lp_courses(){
    	if ( !isset($_POST['security']) || !wp_verify_nonce($_POST['security'],'security') || !is_user_logged_in()){
         	_e('Security check Failed. Contact Administrator.','wplms-lp');
         	die();
      	}

      	global $wpdb;
		$courses = $wpdb->get_results("SELECT id,post_title FROM {$wpdb->posts} where post_type='lp_course'");

		$json = array();
		foreach($courses as $course){
			$json[] = array('id'=>$course->id, 'title'=>$course->post_title);
		}
		update_option('wplms_wp_lp_migration',1);
		
		$this->migrate_posts();

		print_r(json_encode($json));
		die();
    }

    function migration_wp_lp_course_to_wplms(){
    	if ( !isset($_POST['security']) || !wp_verify_nonce($_POST['security'],'security') || !is_user_logged_in()){
         	_e('Security check Failed. Contact Administrator.','wplms-lp');
         	die();
      	}

    	global $wpdb;
		$this->migrate_course_settings($_POST['id']);
    }

    function revert_migrated_courses(){
    	if ( !isset($_POST['security']) || !wp_verify_nonce($_POST['security'],'security') || !is_user_logged_in()){
            _e('Security check Failed. Contact Administrator.','wplms-lp');
            die();
        }
        update_option('wplms_wp_lp_migration_reverted',1);
        $this->revert_migrated_posts();
        die();
    }

    function dismiss_message(){
    	if ( !isset($_POST['security']) || !wp_verify_nonce($_POST['security'],'security') || !is_user_logged_in()){
            _e('Security check Failed. Contact Administrator.','wplms-lp');
            die();
        }
        update_option('wplms_wp_lp_migration_reverted',1);
        die();
    }

    function migrate_posts(){
    	global $wpdb;
/* Update Post Content should run only one time. After that comment it */
        //$wpdb->query("UPDATE {$wpdb->posts} SET post_content = CONCAT(post_title, ' ', post_content) WHERE post_type = 'lp_question'");

    	$wpdb->query("UPDATE {$wpdb->posts} SET post_type = 'course' WHERE post_type = 'lp_course'");
    	$wpdb->query("UPDATE {$wpdb->posts} SET post_type = 'unit' WHERE post_type = 'lp_lesson'");
    	$wpdb->query("UPDATE {$wpdb->posts} SET post_type = 'quiz' WHERE post_type = 'lp_quiz'");
    	$wpdb->query("UPDATE {$wpdb->posts} SET post_type = 'question' WHERE post_type = 'lp_question'");
        //Migrate Taxonomies
        $wpdb->query("UPDATE {$wpdb->term_taxonomy} SET taxonomy = 'course-cat' WHERE taxonomy = 'course_category'");
        $wpdb->query("UPDATE {$wpdb->term_taxonomy} SET taxonomy = 'question-tag' WHERE taxonomy = 'question_tag'");
    }

    function revert_migrated_posts(){
    	global $wpdb;
    	$wpdb->query("UPDATE {$wpdb->posts} SET post_type = 'lp_course' WHERE post_type = 'course'");
    	$wpdb->query("UPDATE {$wpdb->posts} SET post_type = 'lp_lesson' WHERE post_type = 'unit'");
    	$wpdb->query("UPDATE {$wpdb->posts} SET post_type = 'lp_quiz' WHERE post_type = 'quiz'");
    	$wpdb->query("UPDATE {$wpdb->posts} SET post_type = 'lp_question' WHERE post_type = 'question'");
        //Revert Taxonomies
        $wpdb->query("UPDATE {$wpdb->term_taxonomy} SET taxonomy = 'course_category' WHERE taxonomy = 'course-cat'");
        $wpdb->query("UPDATE {$wpdb->term_taxonomy} SET taxonomy = 'question_tag' WHERE taxonomy = 'question-tag'");
    }

    function migrate_course_settings($course_id){
    	$lp_duration = get_post_meta($course_id,'_lp_duration',true);
    	if(!empty($lp_duration)){
    		preg_match("/[0-9]+/", $lp_duration, $duration);
    		preg_match("/[a-z]+/", $lp_duration, $duration_parameter);

    		if(!empty($duration[0])){
    			update_post_meta($course_id,'vibe_duration',$duration[0]);
    		}
    		if(!empty($duration_parameter[0])){
    			switch ($duration_parameter[0]) {
    				case 'minute':
    					$course_duration_parameter = 60;
    					break;
    				case 'hour':
    					$course_duration_parameter = 3600;
    					break;
    				case 'day':
    					$course_duration_parameter = 86400;
    					break;
    				case 'week':
    					$course_duration_parameter = 604800;
    					break;
    				default:
		    			$course_duration_parameter = 86400;
		    			break;
    			}
    			update_post_meta($course_id,'vibe_course_duration_parameter',$course_duration_parameter);
    		}
    	}

    	$prerequisite_course = get_post_meta($course_id,'_lp_course_prerequisite',true);
    	if(!empty($prerequisite_course)){
    		update_post_meta($course_id,'vibe_pre_course',$prerequisite_course);
    	}

    	$max_seats = get_post_meta($course_id,'_lp_max_students',true);
    	if(!empty($max_seats)){
    		update_post_meta($course_id,'vibe_max_students',$max_seats);
    	}

    	$students_enrolled = get_post_meta($course_id,'_lp_students',true);
    	if(!empty($students_enrolled)){
    		update_post_meta($course_id,'vibe_students',$students_enrolled);
    	}

    	$course_retake = get_post_meta($course_id,'_lp_retake_count',true);
    	if(!empty($course_retake)){
    		update_post_meta($course_id,'vibe_course_retakes',$course_retake);
    	}

    	$course_external_link = get_post_meta($course_id,'_lp_external_link_buy_course',true);
    	if(!empty($course_external_link)){
    		update_post_meta($course_id,'vibe_course_external_link',$course_external_link);
    	}

//ADDED BY MANISH STARTS HERE: 
        
/* Changed fuction exist test -> woocomerce to WC
    Added post meta data for _regular_price and _sale_price
    also changed _price data value to sell price
*/ 

        $course_payment = get_post_meta($course_id,'_lp_payment',true);
        if(!empty($course_payment) && $course_payment == 'yes'){
            //Create product and connect for price.
            if ( function_exists('WC') ) {
                $this->course_pricing($course_id);
            }
            update_post_meta($course_id,'vibe_course_free','H');
        }else{
            update_post_meta($course_id,'vibe_course_free','S');
        }
        
        $this->course_id = $course_id;
        $this->build_curriculum($course_id);
    }

    function course_pricing($course_id){
        $course_price = get_post_meta($course_id,'_lp_price',true);
        $course_sale_price = get_post_meta($course_id,'_lp_sale_price',true);
        if(!empty($course_price)){

            $post_args = array(
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'post_title' => get_the_title($course_id)
                        );
            $product_id = wp_insert_post($post_args);
            update_post_meta($product_id,'vibe_subscription','H');
            update_post_meta($product_id,'_regular_price',$course_price);
            update_post_meta($product_id,'_sale_price',$course_sale_price);
            update_post_meta($product_id,'_price',$course_sale_price);
            wp_set_object_terms($product_id, 'simple', 'product_type');
            update_post_meta($product_id,'_visibility','visible');
            update_post_meta($product_id,'_virtual','yes');
            update_post_meta($product_id,'_downloadable','yes');
            update_post_meta($product_id,'_sold_individually','yes');    

//ADDED BY MANISH ENDS HERE        

            $max_seats = get_post_meta($course_id,'vibe_max_students',true);
            if(!empty($max_seats) && $max_seats < 9999){
                update_post_meta($product_id,'_manage_stock','yes');
                update_post_meta($product_id,'_stock',$max_seats);
            }
            
            $courses = array($course_id);
            update_post_meta($product_id,'vibe_courses',$courses);
            update_post_meta($course_id,'vibe_product',$product_id);

            $thumbnail_id = get_post_thumbnail_id($course_id);
            if(!empty($thumbnail_id)){
                set_post_thumbnail($product_id,$thumbnail_id);
            }
        }
    }
/* ADDED BY MANISH STARTS HERE: 

Changed build_curriculum function  */ 
    function build_curriculum($course_id){
    	global $wpdb;

        $curriculum = array();
    	$sections_orderd = $wpdb->get_results("
                        SELECT section_id, section_name as id, section_order
                        FROM {$wpdb->prefix}learnpress_sections
                        WHERE section_course_id = $course_id 
                        ORDER BY section_order ASC",ARRAY_A);

        foreach ($sections_orderd as $section) {
            $curriculum[] = $section['id'];
            $sections_units_quizzes = $wpdb->get_results("SELECT item_id, item_order FROM {$wpdb->prefix}learnpress_section_items WHERE section_id = ".$section['section_id']." ORDER BY item_order",ARRAY_A);
            foreach ($sections_units_quizzes as $section_unit_quiz) {
                $curriculum[] = $section_unit_quiz['item_id'];

                if(is_numeric($section_unit_quiz['item_id'])){
                    $check_post_type = get_post_type($section_unit_quiz['item_id']);
                    if($check_post_type  == 'unit'){
                        $this->migrate_unit_settings($section_unit_quiz['item_id']);
                    }
                    if($check_post_type  == 'quiz'){
                        $this->migrate_quiz_settings($section_unit_quiz['item_id']);
                    }
                }
            }
        }
        update_post_meta($course_id,'vibe_course_curriculum',$curriculum);
    }
//ADDED BY MANISH ENDS HERE 

    function migrate_unit_settings($unit_id){
		$lp_duration = get_post_meta($unit_id,'_lp_duration',true);

    	if(!empty($lp_duration)){
    		preg_match("/[0-9]+/", $lp_duration, $duration);
    		preg_match("/[a-z]+/", $lp_duration, $duration_parameter);

    		if(!empty($duration[0])){
    			update_post_meta($unit_id,'vibe_duration',$duration[0]);
    		}
    		if(!empty($duration_parameter[0])){
    			switch ($duration_parameter[0]) {
    				case 'minute':
    					$unit_duration_parameter = 60;
    					break;
    				case 'hour':
    					$unit_duration_parameter = 3600;
    					break;
    				case 'day':
    					$unit_duration_parameter = 86400;
    					break;
    				case 'week':
    					$unit_duration_parameter = 604800;
    					break;
    				default:
		    			$unit_duration_parameter = 86400;
		    			break;
    			}
    			update_post_meta($unit_id,'vibe_unit_duration_parameter',$unit_duration_parameter);
    		}
    	}

    	$free_unit = get_post_meta($unit_id,'_lp_preview',true);
    	if(!empty($free_unit) && $free_unit == 'yes'){
    		update_post_meta($unit_id,'vibe_free','S');
    	}
    }

    function migrate_quiz_settings($quiz_id){
    	$lp_duration = get_post_meta($quiz_id,'_lp_duration',true);

    	if(!empty($lp_duration)){
    		preg_match("/[0-9]+/", $lp_duration, $duration);
    		preg_match("/[a-z]+/", $lp_duration, $duration_parameter);

    		if(!empty($duration[0])){
    			update_post_meta($quiz_id,'vibe_duration',$duration[0]);
    		}
    		if(!empty($duration_parameter[0])){
    			switch ($duration_parameter[0]) {
    				case 'minute':
    					$quiz_duration_parameter = 60;
    					break;
    				case 'hour':
    					$quiz_duration_parameter = 3600;
    					break;
    				case 'day':
    					$quiz_duration_parameter = 86400;
    					break;
    				case 'week':
    					$quiz_duration_parameter = 604800;
    					break;
    				default:
		    			$quiz_duration_parameter = 86400;
		    			break;
    			}
    			update_post_meta($quiz_id,'vibe_quiz_duration_parameter',$quiz_duration_parameter);
    		}
    	}

        update_post_meta($quiz_id,'vibe_quiz_course',$this->course_id);

        $quiz_retakes = get_post_meta($quiz_id,'_lp_retake_count',true);
        if(!empty($quiz_retakes)){
            update_post_meta($quiz_id,'vibe_quiz_retakes',$quiz_retakes);
        }

        $quiz_check_answer = get_post_meta($quiz_id,'_lp_show_check_answer',true);
        if(!empty($quiz_check_answer) && $quiz_check_answer == 'yes'){
            update_post_meta($quiz_id,'vibe_quiz_check_answer','S');
        }

        $quiz_passing_score = get_post_meta($quiz_id,'_lp_passing_grade',true);
        if(!empty($quiz_passing_score)){
            update_post_meta($quiz_id,'vibe_quiz_passing_score',$quiz_passing_score);
        }

        $this->connect_questions_with_quiz($quiz_id);
    }

    function connect_questions_with_quiz($quiz_id){
        global $wpdb;
        $questions = $wpdb->get_results("
                        SELECT question_id
                        FROM {$wpdb->prefix}learnpress_quiz_questions
                        WHERE quiz_id = $quiz_id
                    ");
        if(!empty($questions)){
            $quiz_questions = array('ques'=>array(),'marks'=>array());
            foreach ($questions as $question) {
                $quiz_questions['ques'][] = $question->question_id;
                $marks = get_post_meta($question->question_id,'_lp_mark',true);
                if(!empty($marks)){
                    $quiz_questions['marks'][] = $marks;
                }
                $this->migrate_question_settings($question->question_id);
            }
            update_post_meta($quiz_id,'vibe_quiz_questions',$quiz_questions);
        }
    }

    function migrate_question_settings($question_id){
        global $wpdb;

        $questions_options = $wpdb->get_results("
                        SELECT answer_data
                        FROM {$wpdb->prefix}learnpress_question_answers
                        WHERE question_id = $question_id
                    ");
        if(!empty($questions_options)){
            $question_type = get_post_meta($question_id,'_lp_type',true);
            if(!empty($question_type)){
                $options = array();
                switch ($question_type) {
                    case 'true_or_false':
                        $question_type = 'truefalse';
                        foreach ($questions_options as $option) {
                            $opt = unserialize($option->answer_data);
                            $answer = $opt['is_true'];
                            if($answer == 'yes'){
                                $correct_answer = 1;
                            }else{
                                $correct_answer = 0;
                            }
                        }
                        break;

                    case 'multi_choice':
                        $question_type = 'multiple';
                        $correct_answers = array();
                        foreach ($questions_options as $option) {
                            $opt = unserialize($option->answer_data);
                            $options[] = $opt['text'];
                            $answer = $opt['is_true'];
                            if($answer == 'yes'){
                                end($options);
                                $key = key($options);
                                $correct_answers[] = $key+1;
                            }
                        }
                        if(!empty($correct_answers)){
                            $correct_answer = implode(',', $correct_answers);
                        }
                        break;

                    case 'single_choice':
                        $question_type = 'single';
                        foreach ($questions_options as $option) {
                            $opt = unserialize($option->answer_data);
                            $options[] = $opt['text'];
                            $answer = $opt['is_true'];
                            if($answer == 'yes'){
                                end($options);
                                $key = key($options);
                                $correct_answer = $key+1;
                            }
                        }
                        break;

                    case 'fill_in_blank':
                        $question_type = 'fillblank';
                        foreach ($questions_options as $option) {
                            $opt = unserialize($option->answer_data);
                            $question = $opt[0];
                            preg_match("/\"(.*?)\"/", $question, $answer);
                            $correct_answer = stripslashes($answer[1]);
                        }
                        break;
                }
                update_post_meta($question_id,'vibe_question_type',$question_type);
                if(!empty($options)){
                    update_post_meta($question_id,'vibe_question_options',$options);
                }
                update_post_meta($question_id,'vibe_question_answer',$correct_answer);
            }
        }

        $question_hint = get_post_meta($question_id,'_lp_hint',true);
        if(!empty($question_hint)){
            update_post_meta($question_id,'vibe_question_hint',$question_hint);
        }

        $question_explanation = get_post_meta($question_id,'_lp_explanation',true);
        if(!empty($question_explanation)){
            update_post_meta($question_id,'vibe_question_explaination',$question_explanation);
        }
    }

}// End of class WPLMS_LEARNPRESS_INIT

WPLMS_LEARNPRESS_INIT::init();
