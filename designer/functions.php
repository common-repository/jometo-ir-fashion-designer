<?php
namespace Jometo_ir;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

if (!function_exists('jometo_ir_jafar_make_fashion_form')) {
    function jometo_ir_jafar_make_fashion_form( $atts, $module ){
        
		if( wp_is_json_request() ){ //&& is_user_admin()
			return 'this is JSON response only for the admin panel\'s editor!';
		}
		
		@$lang = strtolower( esc_html( $atts[1] ));
		$myLang = jometo_ir_jafar_langs( $lang );
		
		$css_direction = 'style="direction:'. esc_html( $myLang['dir'] ) .'"';
		
		return '
		 <form id="jometo_ir_fashion_desginer_f1" '. $css_direction .'>
			<div class="jometo_ir_fashion_desginer_form1">
				<div id="can_close">
					<div id="dresses">
						'. esc_html( $myLang[0] ) .': 
						<label>
							<input type="radio" name="d1" value="2" data-ratio="3/2" checked>
							'. esc_html( $myLang[1] ) .'
							<img src="'. esc_url( plugins_url( "img/2.png", __FILE__ ) ) .'">
						</label>
						<label>
							<input type="radio" name="d1" value="1" data-ratio="2/3">
							'. esc_html( $myLang[2] ) .'
							<img src="'. esc_url( plugins_url( "img/1.png", __FILE__ ) ) .'">
						</label>
						<label>
							<input type="radio" name="d1" value="3" data-ratio="2/3">
							'. esc_html( $myLang[3] ) .'
							<img src="'. esc_url( plugins_url( "img/3.png", __FILE__ ) ) .'">
						</label>
					</div>

					<div id="patterns">
						'. esc_html( $myLang[4] ) .': 
							<label>
								<input type="radio" name="p1" value="1" checked>
								<img src="'. esc_url( plugins_url( "img/p1.jpg", __FILE__ ) ) .'">
							</label>
							<label>
								<input type="radio" name="p1" value="2">
								<img src="'. esc_url( plugins_url( "img/p2.jpg", __FILE__ ) ) .'">
							</label>
							<label>
								<input type="radio" name="p1" value="3">
								<img src="'. esc_url( plugins_url( "img/p3.jpg", __FILE__ ) ) .'">
							</label>
							<label>
								<input type="radio" name="p1" value="4">
								<img src="'. esc_url( plugins_url( "img/p4.jpg", __FILE__ ) ) .'">
							</label>
							<label>
								<input type="radio" name="p1" value="5">
								<img src="'. esc_url( plugins_url( "img/p5.jpg", __FILE__ ) ) .'">
							</label>
						</div>

					<div>
						'. esc_html( $myLang[5] ) .':
						<input type="file" id="a1" accept="image/*">
					</div>

					<div>
						'. esc_html( $myLang[6] ) .': 
						<input type="range" id="a2" name="vol" value="50" min="1" max="100">
					</div>
				</div>
				<div>
					<input type="button" value="'. esc_html( $myLang[7] ) .'" id="save">
					<input type="button" value="'. esc_html( $myLang[8] ) .'" data-title="'. esc_html( $myLang[9] ) .'" id="close">
				</div>

			</div>
		</form>


		<div id="jometo_ir_fashion_desginer_main_bg1" '. $css_direction .'>
			<div id="jometo_ir_fashion_desginer_main_bg2" style="background: url(\''. esc_url( plugins_url( "img/2.png", __FILE__ ) ) .'\') no-repeat center center;">
			<div id="jometo_ir_fashion_desginer_main_fullSize"><img src=\''. esc_url( plugins_url( "img/magnifier.png", __FILE__ ) ) .'\'></div>
			<div id="jometo_ir_fashion_desginer_main_powered">'. esc_html( $myLang['copyright'] ) .'</div>
			</div>
		</div>';
	
    }
}

