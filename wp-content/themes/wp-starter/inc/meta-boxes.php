<?php
/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_event-details2',
		'title' => 'Event Details',
		'fields' => array (
			array (
				'key' => 'field_52673ed81d412',
				'label' => 'Start Date',
				'name' => 'start_date',
				'type' => 'date_picker',
				'required' => 1,
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_52673eff1d413',
				'label' => 'End Date',
				'name' => 'end_date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_52673eff1d414',
				'label' => 'Start Time',
				'name' => 'start_time',
				'type' => 'date_time_picker',
				'show_date' => 'false',
				'date_format' => 'm/d/y',
				'time_format' => 'h:mm tt',
				'show_week_number' => 'false',
				'picker' => 'slider',
				'save_as_timestamp' => 'true',
				'get_as_timestamp' => 'false',
			),
			array (
				'key' => 'field_52673eff1d416',
				'label' => 'End Time',
				'name' => 'end_time',
				'type' => 'date_time_picker',
				'show_date' => 'false',
				'date_format' => 'm/d/y',
				'time_format' => 'h:mm tt',
				'show_week_number' => 'false',
				'picker' => 'slider',
				'save_as_timestamp' => 'true',
				'get_as_timestamp' => 'false',
			),
			array (
				'key' => 'field_52673f171d415',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5267881db1b9b',
				'label' => 'More Info',
				'name' => 'more_info',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52673f2a1d450',
				'label' => 'Sticky?',
				'name' => 'sticky',
				'type' => 'true_false',
				'message' => 'Yes',
				'default_value' => 0,
			),
			array (
				'key' => 'field_52673f2a1d415',
				'label' => 'Featured?',
				'name' => 'featured',
				'type' => 'true_false',
				'message' => 'Yes',
				'default_value' => 0,
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'event',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_venue-details',
		'title' => 'Venue Details',
		'fields' => array (
			array (
				'key' => 'field_52678fc336d22',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5267900f36d24',
				'label' => 'Capacity',
				'name' => 'capacity',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5267904836d25',
				'label' => 'Bookings',
				'name' => 'bookings',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52678fd936d23',
				'label' => 'Featured?',
				'name' => 'featured',
				'type' => 'true_false',
				'message' => 'Yes',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'venue',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_work-details',
		'title' => 'Work Details',
		'fields' => array (
			array (
				'key' => 'field_52679150c48d8',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_52679160c48d9',
				'label' => 'Featured?',
				'name' => 'featured',
				'type' => 'true_false',
				'message' => 'Yes',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'work',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

/* On Event Save */
function on_event_save( $post_id ) {
	if ( 'event' != $_POST['post_type'] )
		return;

	$start_date = get_field('start_date', $post_id);
	$end_date = get_field('end_date', $post_id);
	$start_time = get_field('start_time', $post_id);
	$end_time = get_field('end_time', $post_id);

	if ( empty($end_date) || strtotime($end_date) < strtotime($start_date) )
		update_field('end_date', $start_date, $post_id);

	if ( empty($start_time) )
		update_field('end_time', $start_time, $post_id);

}
add_action( 'save_post', 'on_event_save');

?>