<?php

function getPostsByType($post_type = null, $add_custom_meta = FALSE){
	if(empty($post_type))
		return array();

	$all_posts_of_type = new WP_Query(array('post_type' => $post_type, 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1));

	$return_array = array();

	foreach($all_posts_of_type->posts as $this_post){
		$this_post_data = array(	
			'ID'	=> $this_post->ID,
			'title'	=> $this_post->post_title
		);

		if($add_custom_meta)
			$this_post_data = array_merge(
				$this_post_data,
				get_post_custom($this_post->ID)
			);
	
		foreach($this_post_data as $key => $value)
			if(is_array($value) && count($value) == 1) $this_post_data[$key] = $value[0];
	
		array_push($return_array, $this_post_data);
	}

	return $return_array;
}

function echo_select($id, $label, $keys, $custom){
?>	
	<div>
		<label><?php echo $label; ?></label><div class="value-box">
			<select id="<?php echo $id; ?>"	name="<?php echo $id; ?>">
				<option value="">wählen</option>
				<?php foreach ($keys as $key) { ?>
					<option value="<?php echo $key; ?>"	<?php if(isset($custom[$id]) && $custom[$id] == $key) echo "selected"; ?>><?php echo $key; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
<?php 
}

function echo_select_for_ids($id, $label, $items, $custom){
?>	
	<div>
		<label><?php echo $label; ?></label><div class="value-box">
			<select id="<?php echo $id; ?>"	name="<?php echo $id; ?>">
				<option value="">wählen</option>
				<?php foreach ($items as $item) { ?>
					<option value="<?php echo $item['ID']; ?>"	<?php if(isset($custom[$id]) && $custom[$id] == $item['ID']) echo "selected"; ?>><?php echo $item['title']; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
<?php 
}

function echo_textarea($id, $label, $custom){
?>
	<div>
		<label><?php echo $label; ?></label>
		<div class="value-box">
			<textarea id="<?php echo $id; ?>"		type="text"	name="<?php echo $id; ?>"><?php if(isset($custom[$id])) echo $custom[$id]; ?></textarea>
		</div>
	</div>
<?php 
}

function echo_input_text($id, $label, $custom, $label_behind = ""){
?>
	<div>
		<label><?php echo $label; ?></label>
		<div class="value-box">
			<input id="<?php echo $id; ?>"		type="text"	name="<?php echo $id; ?>"		value="<?php if(isset($custom[$id])) echo $custom[$id]; ?>" /> <?php echo $label_behind; ?>
		</div>
	</div>
<?php 
}
function echo_input_hidden($id, $custom){
?>
	<input id="<?php echo $id; ?>"		type="hidden"	name="<?php echo $id; ?>"		value="<?php if(isset($custom[$id])) echo $custom[$id]; ?>" />
<?php 
}

function postmeta_with_label($id, $label, $custom, $label_behind = ""){
	if(isset($custom[$id]))
	{
		return "<div><span class='_983D25'>$label</span>: ".$custom[$id]." $label_behind</div>";
	} 
	else return "";
}

function postmeta_with_label_class( $label, $Text, $class, $label_behind = ""){
	
		return "<div><span class='_983D25'>$label</span>: <span class='".$class."'>".$Text."</span> $label_behind</div>";
	
}

function postmeta_without_label($id, $custom, $label_behind = ""){
	if(isset($custom[$id])){
		return $custom[$id]." $label_behind";
	} else return "";
}

?>