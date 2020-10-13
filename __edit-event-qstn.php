<?php 
if ( !defined( 'ABSPATH' ) ) exit();

$post_id = isset( $_REQUEST['id'] ) ? $_REQUEST['id'] : '';

$_prefix = OVA_METABOX_EVENT;

$EL_Setting = EL()->options->general;
$EL_Setting->get('calendar_time_format') == '' ? $time = '12' : $time = $EL_Setting->get('calendar_time_format');
$format = el_date_time_format_js();
$placeholder = date(el_date_time_format_js_reverse($format), '1577664000' );

$question = get_post_meta( $post_id, $_prefix.'question', true) ? get_post_meta( $post_id, $_prefix.'question', true) : array();
$custom_question = get_post_meta( $post_id, $_prefix.'custom_question', true) ? get_post_meta( $post_id, $_prefix.'custom_question', true) : array();

?>
<div class="edit_qstn_heading">
<h4>Choose questions for Attendees</h4>
</div>

<br>
<div class="wrap_qstn">
	<label> <input type="checkbox" name="<?php echo esc_attr( $_prefix.'box_qstn1' ) ?>" class="box_qstn" value="<?php echo esc_attr('gender'); ?>" <?php if (($question[0]['check']) == 'true') echo esc_attr('checked') ; ?> ><span><strong> Gender </strong>[Male][Female][Other] </span></label><br>
	<label> <input type="checkbox" name="<?php echo esc_attr( $_prefix.'box_qstn2' ) ?>" class="box_qstn" value="<?php echo esc_attr('size'); ?>" <?php if (($question[1]['check']) == 'true') echo esc_attr('checked') ; ?> ><span><strong> Shirt/T-Shirt Size </strong>[Small][Medium][Large] </span></label><br>
	<label> <input type="checkbox" name="<?php echo esc_attr( $_prefix.'box_qstn3' ) ?>" class="box_qstn" value="<?php echo esc_attr('food'); ?>" <?php if (($question[2]['check']) == 'true') echo esc_attr('checked') ; ?> ><span><strong> Food Preference </strong>[Veg][Non-Veg] </span></span></label>
</div>
<div class="new">
	<?php if ($custom_question) {
		foreach($custom_question as $key => $value) {
			if($value['question'] != '') {?>
				<div class="cstm_qstn" data-type="<?php echo esc_attr($value['qstn_type'])?>" data-question="<?php echo esc_attr($value['question'])?>" data-opt_count="<?php echo esc_attr($value['opt_count'])?>" <?php $i=1; while($i <= $value['opt_count']){ echo esc_attr('data-opt'.$i.'='.$value[$i].' ');$i++;}?> ><strong><?php echo esc_attr($value['question'])?></strong><?php $i=1;while($i <= $value['opt_count']){echo esc_attr('['.$value[$i].']');$i++;}?><button href="javascript:void(0);" class="x" id="x0">-</button><br></div>
			<?php } 
		}
	}?>
</div>
<button id="btn">Add Question</button>
<div class="apd"></div>
<br><br>


