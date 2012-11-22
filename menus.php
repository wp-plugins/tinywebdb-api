<?php


//***** Options Menu *****
function wp_tinywebdb_api_optionsmenu() {
	echo '<div class="wrap">';
	if (function_exists('screen_icon')) {
		screen_icon();
	}
	echo "<h2>TinyWebDB Settings</h2>";

	if ($_POST['issubmitted'] == 'yes') {
		$post_urltrigger = $_POST['urltrigger'];
		$post_tagtype = $_POST['tagtype'];
		update_option("wp_tinywebdb_api_url_trigger", $post_urltrigger);
		update_option("wp_tinywebdb_api_tag_type", $post_tagtype);
	}
	$setting_url_trigger = get_option("wp_tinywebdb_api_url_trigger") or $setting_url_trigger = 'api';
	$setting_tagtype = get_option("wp_tinywebdb_api_tag_type") or $setting_tagtype = 'id';

	echo '<form method="post" action="http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . '">';
	echo '<table class="form-table">';
	?>

	<h3>Controllers</h3>

        <table id="all-plugins-table" class="widefat">
      <thead>
        <tr>
          <th class="manage-column check-column" scope="col"></th>
          <th class="manage-column" scope="col">Controller</th>
          <th class="manage-column" scope="col">Description</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th class="manage-column check-column" scope="col"></th>
          <th class="manage-column" scope="col">Controller</th>
          <th class="manage-column" scope="col">Description</th>
        </tr>
      </tfoot>
      <tbody class="plugins">
                  <tr class="active">
            <th class="check-column" scope="row">
              <input type="checkbox" name="controllers[]" value="core" />
            </th>
            <td class="plugin-title">
              <strong>Core</strong>
              <div class="row-actions-visible">
                <a href="options-general.php?page=json-api&amp;action=deactivate&amp;controller=core&amp;_wpnonce=0e3d72a68d" title="Deactivate this controller" class="edit">í‚é~</a>            </td>
            <td class="desc">
              <p>Basic introspection methods</p>

            </td>
          </tr>
     </tbody>
			  
	<h3>Address</h3>

	<tr valign="top">
		<th scope="row">URL Trigger</th>
		<td><input name="urltrigger" type="text" id="urltrigger" value="<?php echo $setting_url_trigger; ?>" size="50" /><br/>Change the <em>api</em> part of your TinyWebDB APIs to something else. Enter without slashes.</td>
	</tr>

	<tr valign="top">
		<th scope="row">Tag type</th>
		<td>
			<input type="radio" name="tagtype" value="id" <?php if ($setting_tagtype == 'id') {	echo 'checked="checked"';} ?> /> Post ID 
			<input type="radio" name="tagtype" value="slug"  <?php if ($setting_tagtype == 'slug') { echo 'checked="checked"';	} ?> /> Slug
			<br/>Select Tag mach to type <em>post_id</em> or <em>slug</em>.</td>
	</tr>

	<?php
	echo '</table>';
	echo '<input name="issubmitted" type="hidden" value="yes" />';
	echo '<p class="submit"><input type="submit" name="Submit" value="Save settings" /></p>';
	echo '</form>';
	wp_tinywebdb_api_footer();
	echo '</div>';
}

//***** Common Elements *****
function wp_tinywebdb_api_admin_script() {
	if (function_exists('wp_enqueue_style')) {
		wp_enqueue_script('thickbox');
	}
}

function wp_tinywebdb_api_admin_style() {
	if (function_exists('wp_enqueue_style')) {
		wp_enqueue_style('thickbox');
	}
}

add_action('init', 'wp_tinywebdb_api_admin_script');
add_action('wp_head', 'wp_tinywebdb_api_admin_style');

function wp_tinywebdb_api_footer() {
	echo '<div style="margin-top:45px; font-size:0.87em;">';
	echo '<div><a href="' . wp_tinywebdb_api_get_plugin_dir('url') . '/readme.txt">Documentation</a> | <a href="http://appinventor.in/side/tinywebdb-api/">TinyWebDB Homepage</a></div>';
	echo '</div>';
}
?>
