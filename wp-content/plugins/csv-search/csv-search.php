<?php

/**
 * Plugin Name:       CSV Search
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Search and display content of a CSV file. 
 * Version:           1.0
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            Prasad Tharanga
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

add_action('wp_enqueue_scripts', 'enqueue_csv_search_styles');

function enqueue_csv_search_styles()
{
	// Enqueue custom CSS file
	wp_enqueue_style(
		'csv-search-custom-style', // Handle name
		plugin_dir_url(__FILE__) . 'style.css', // Path to the style.css file
		array(), // Dependencies
		'1.0', // Version
		'all' // Media type
	);

	// Enqueue jQuery form script
	wp_enqueue_script('jquery-form');
}

add_shortcode('displaysearch', 'display_search_function');

function display_search_function($atts, $content)
{

	$output  = '
		<form id="myForm" action="' . admin_url('admin-ajax.php') . '" method="post" encript="multipart/form-data"> 
			<input class="csv-search-input" name="searchtext" type="search" placeholder="Masukkan nomor seri produk QBN Anda..." />
			<input type="hidden" name="action" value="submitdata">
			<input type="hidden" name="scid" value="' . $atts['id'] . '">
			<button id="submitButton" class="csv-search-button" type="submit" >Cek</button> 
		</form>

		<div id="searchresult"></div>

		<script type="text/javascript">
			jQuery(document).ready(function($){
				$("#myForm").ajaxForm({
				beforeSubmit: function(){
						$("#searchresult").text("Loading...");
						$("#submitButton").attr("disabled", true);
					},
					success: function(response){
						// 
							console.log(response);
							if(response.success){
								//console.log(response.data.csvline["Student RegNo"]);
								// $("#searchresult").text(response.data.rowwithheaders);
								// $("#searchresult").html(makeTable(response.data.headingLine, response.data.row));
								$("#searchresult").html("<span>" + response.data.row[0] + " (Verified)" + "<span>");
							}else{
								$("#searchresult").html("<span>Nomor seri tidak ditemukan (Unverified)<span>");
							}
						// 
					},
					error : function(response){
						console.log(response);
					},
					uploadProgress(event, position, total, persentComplete){
						console.log(persentComplete);
					},
					complete: function(){
						$("#submitButton").text("Cek");
						$("#submitButton").attr("disabled", false);
					},
					resetForm : false
				});
			});

			function makeTable(headingLine, row){
				output = "<table class=\"table\"><tr>";
				headingLine.forEach(function(value, key, arr){
					output = output + "<th></th>";
				});
				output = output + "</tr><tr>";
				row.forEach(function(value, key, arr){
					output = output + "<td>"+ value  + "</td>";
				});
				output = output + "</tr></table>";
				return output;
			}
 		</script>
 

	 ';

	return $output;
}



//  add_action('wp_ajax_submitdata', 'send_ajax_response_function');

add_action('wp_ajax_nopriv_submitdata', 'send_ajax_response_function');
add_action('wp_ajax_submitdata', 'send_ajax_response_function');



//  function send_ajax_response_function(){
// 	// wp_send_json_success($_POST);
// 	wp_send_json_success(['POST' => $_POST, 'FILES' => $_FILES]);
//  }

//  http://wp6.test/csv/wp-content/uploads/2022/07/sample1.csv

function send_ajax_response_function()
{
	$searchtext = $_POST['searchtext'];
	$scid = $_POST['scid'];

	require_once('shortcodelist.php');
	$shortCodeDetails = $scl[$scid];

	// Retrieve the CSV file URL from the settings
	$fileURL = get_option('csv_file_url', '');

	if (empty($fileURL)) {
		wp_send_json_error(['error_message' => 'No CSV URL provided in settings']);
		return;
	}

	$file = fopen($fileURL, "r");

	if ($file === false) {
		wp_send_json_error(['error_message' => 'Could not open CSV file']);
		return;
	}

	$headingLine = fgetcsv($file);
	while (!feof($file)) {
		$line = fgetcsv($file);
		$checkColVal = $line[$shortCodeDetails['searchColNo']];
		if ($searchtext == $checkColVal) {
			wp_send_json_success([
				'POST' => $_POST,
				'headingLine' => $headingLine,
				'row' => $line,
				'rowwithheaders' => mergeTwoArray($headingLine, $line)
			]);
			fclose($file);
			return;
		}
	}
	fclose($file);

	wp_send_json_error(['error_message' => 'No data found']);
}

function mergeTwoArray($headingLine, $line)
{
	$newArray = [];
	foreach ($headingLine as $k => $v) {
		$newArray[$v] = $line[$k];
	}
	return $newArray;
}


add_action('admin_menu', 'csv_search_admin_page');
add_action('admin_init', 'csv_search_settings_init');

// Add the admin page
function csv_search_admin_page()
{
	add_menu_page(
		'CSV Search',
		'CSV Search',
		'manage_options',
		'csv-search',
		'csv_search_adminpage_init'
	);
}

// Display the input form on the admin page
function csv_search_adminpage_init()
{
?>
	<div class="wrap">
		<h1>CSV Search - Settings</h1>
		<form method="post" action="options.php">
			<?php
			settings_fields('csv_search_settings_group');
			do_settings_sections('csv-search');
			submit_button();
			?>
		</form>
	</div>
<?php
}

// Initialize settings
function csv_search_settings_init()
{
	register_setting('csv_search_settings_group', 'csv_file_url');

	add_settings_section(
		'csv_search_section',
		'CSV File Settings',
		null,
		'csv-search'
	);

	add_settings_field(
		'csv_file_url',
		'CSV File URL',
		'csv_file_url_callback',
		'csv-search',
		'csv_search_section'
	);
}

// Callback function to display the input field
function csv_file_url_callback()
{
	$csv_file_url = get_option('csv_file_url', '');
	echo '<input type="text" name="csv_file_url" value="' . esc_attr($csv_file_url) . '" style="width: 100%;">';
}
