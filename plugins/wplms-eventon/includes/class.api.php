<?php
/**
 * API\
 *
 * @class       Vibe_Projects_API
 * @author      VibeThemes
 * @category    Admin
 * @package     vibemeeting
 * @version     1.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Vibe_Eventon_API{


	public static $instance;
	public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new Vibe_Eventon_API();
        return self::$instance;
    }

    public $start_key = 'evcal_srow';
    public $end_key = 'evcal_erow';
    

	private function __construct(){
		add_action('rest_api_init',array($this,'register_api_endpoints'));
	}


	function register_api_endpoints(){
        register_rest_route( VIBE_EVENTON_API_NAMESPACE, '/user/meetings/eventonmeetings', array(
            'methods'                   =>   'POST',
            'callback'                  =>  array( $this, 'get_events_vibeeventon' ),
            'permission_callback' => array( $this, 'user_permissions_check' ),
        ) );
	
    }



    function user_permissions_check($request){
        
        $body = json_decode($request->get_body(),true);
        if (empty($body['token'])){
            $client_id = $request->get_param('client_id');
            if($client_id == vibebp_get_setting('client_id')){
                return true;
            }
        }else{
            $token = $body['token'];
        }

        if(!empty($body['token'])){
            global $wpdb;

            $this->user = apply_filters('vibebp_api_get_user_from_token','',$body['token']);
            if(!empty($this->user)){
                return true;
            }
        }

        return false;
    }


    function get_events_vibeeventon($request){
        $body = json_decode($request->get_body(),true);
        $filter = $body['filter'];
        $results = array();
        if(class_exists( 'EventON' )){
            if(isset($filter) && $filter['start'] && $filter['end']){
                // Query build
                $args = array(
                    'post_type'=>'ajde_events',
                    's'=>!empty($body['s'])?$body['s']:'',
                    'meta_query'=>array(
                        'meta_query'=>array(
                        'relation'=>'AND', 
                            array(
                                'key'=>$this->end_key,
                                'value'=>$filter['end']/1000,
                                'compare'=>'<='
                            ),
                            array(
                                'key'=>$this->start_key,
                                'value'=>$filter['start']/1000,
                                'compare'=>'>='
                            ),
                        )
                    )
                );

                $query = new WP_Query(apply_filters('vibe_calendar_myevents_args',$args,$this->user,$body));
                $results = [];
                if($query->have_posts()){
                    while($query->have_posts()){
                        $query->the_post();
                        global $post;
                        $results[]=array(
                            'id'=>$post->ID,
                            'post_title'=>$post->post_title,
                            'post_content'=>$post->post_content,
                            'author'=>$post->post_author,
                            'meta' => $this->get_eventon_meta($post->ID),
                            'extra' => $this->get_eventon_extra($post->ID)
                        );
                    }
                    $data = array(
                        'status' => 1,
                        'data' => $results,
                        'total'=>$query->found_posts,
                        'message' => _x('Events found','Events found','wplms-eventon'),
                    );                
                }else{
                    $data = array(
                        'status' => 0,
                        'message' => _x('No events found!','No events found!','wplms-eventon')
                    );
                }
            }else{
                $data = array(
                    'status' => 0,
                    'message' => _x('Data missing!','Data missing!','wplms-eventon')
                );
            }
        }else{
            $data = array(
                'status' => 0,
                'message' => _x('EventOn Plugin not active!','EventOn Plugin not active!','wplms-eventon')
            );
        }
        return new WP_REST_Response(apply_filters('vibe_get_events_eventon',$data,$request), 200);
    }

    function get_eventon_meta($id){
        $color = get_post_meta($id,'evcal_event_color',true);
        if(!empty($color)){ $color = '#'.$color;}
        return array(
            array('meta_key'=>'start','meta_value'=>(int)get_post_meta($id,$this->start_key,true)*1000),
            array('meta_key'=>'end','meta_value'=>(int)get_post_meta($id,$this->end_key,true)*1000),
            array('meta_key'=>'color','meta_value'=>$color)
        );
    }

    function get_eventon_extra($id){
        $r = array(
            'url' => get_permalink($id)
        );
        return $r;
    }


}

Vibe_Eventon_API::init();