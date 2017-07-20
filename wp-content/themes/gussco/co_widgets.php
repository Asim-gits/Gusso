<?php

class WidgetCo_Image extends WP_Widget {
	function WidgetCo_Image() {
		$this->WP_Widget('WidgetCo_Image', 'Image Widget', array(
			'classname' => 'WidgetCo_Image', 
			'description' => 'Image Widget für Guss & Co.'
		));
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		
		$upload_dir 	= wp_upload_dir();
		
		$image_url			= strip_tags($instance['image_url']);
		$dest_url			= strip_tags($instance['dest_url']);
		$include_in			= strip_tags($instance['include_in']);
		$exclude_from		= strip_tags($instance['exclude_from']);
		
		$image_url			= str_replace($upload_dir['baseurl'], "", $image_url);
		$dest_url			= str_replace(home_url(), "", $dest_url);
		
		$include_in_arr		= preg_split('/[\r\n]+/', $include_in, -1, PREG_SPLIT_NO_EMPTY);
		$exclude_from_arr	= preg_split('/[\r\n]+/', $exclude_from, -1, PREG_SPLIT_NO_EMPTY);
		
		$html	= "";
		
		if(!empty($image_url)) {
			$html = "<img src=\"".$upload_dir['baseurl']."/".$image_url."\" alt=\"".$instance['title']."\" />";
			
			if(!empty($dest_url)) {
				$html = "<a href=".home_url($dest_url).">".$html."</a>";
			}
		}
		
		$html	= $before_widget.$html.$after_widget;
		
		global $post;

		$full_url		= get_permalink( $post->ID );
		$url_fragment	= str_replace(home_url("/"), "", $full_url);
		$url_fragment	= preg_replace('/\/$/', "", $url_fragment);
		
		if(!empty($include_in_arr) && in_array($url_fragment, $include_in_arr)) {
			echo $html;
		} elseif(!empty($exclude_from_arr) && !in_array($url_fragment, $exclude_from_arr)) {
			echo $html;
		} elseif(empty($include_in_arr) && empty($exclude_from_arr)) {
			echo $html;
		}
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title']			= strip_tags($new_instance['title']);
		$instance['image_url']		= strip_tags($new_instance['image_url']);
		$instance['dest_url']		= strip_tags($new_instance['dest_url']);
		$instance['include_in']		= strip_tags($new_instance['include_in']);
		$instance['exclude_from']	= strip_tags($new_instance['exclude_from']);
		
		return $instance;
	}

	function form($instance) {
		$instance		= wp_parse_args( (array) $instance, array( 'title' => '', 'image_url' => '', 'dest_url' => '', 'condition' => '', 
			'include_in' => '', 'exclude_from' => ''));
		
		$title			= strip_tags($instance['title']);
		$image_url		= strip_tags($instance['image_url']);
		$dest_url		= strip_tags($instance['dest_url']);
		$include_in		= strip_tags($instance['include_in']);
		$exclude_from	= strip_tags($instance['exclude_from']);
?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('image_url'); ?>">Bild Url:</label><br/>
				
				<script language="JavaScript">
					jQuery(document).ready(function() {
						jQuery('#<?php echo $this->get_field_id('image_url'); ?>_button').click(function() {
							formfield = jQuery('#upload_image').attr('name');

							window.send_to_editor = function(html) {
								var prefix = "<?php echo home_url("wp-content/uploads"); ?>";
								var imgurl = jQuery(html).attr('src');

								imgurl = imgurl.replace(prefix, ".");
								
								jQuery('#<?php echo $this->get_field_id('image_url'); ?>').val(imgurl);
								tb_remove();
							}
							
							tb_show('', 'media-upload.php?type=image&tab=library&TB_iframe=true');
							
							return false;
						});
						
						jQuery('#<?php echo $this->get_field_id('conditions'); ?>_button').click(function() {
							jQuery('#<?php echo $this->get_field_id('conditions'); ?>').toggle();
							
							return false;
						});
					});
				</script>

				<input class="widefat" id="<?php echo $this->get_field_id('image_url'); ?>" type="text" size="36" name="<?php echo $this->get_field_name('image_url'); ?>" value="<?php echo $image_url; ?>" />
				<input id="<?php echo $this->get_field_id('image_url'); ?>_button" type="button" value="Bild Wählen" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('dest_url'); ?>">Link Url:</label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('dest_url'); ?>" name="<?php echo $this->get_field_name('dest_url'); ?>" type="text" value="<?php echo esc_attr($dest_url); ?>" />
			</p>
			<p>
				<h3 id="<?php echo $this->get_field_id('conditions'); ?>_button"style="cursor: pointer; cursor: hand;">Bedingung anzeigen</h3>
				
				<div id="<?php echo $this->get_field_id('conditions'); ?>" style='display:none'>
					<label for="<?php echo $this->get_field_id('include_in'); ?>">Anzeigen in:</label><br/>
					<textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('include_in'); ?>" name="<?php echo $this->get_field_name('include_in'); ?>"><?php echo esc_attr($include_in); ?></textarea><br/><br/>
	
					<label for="<?php echo $this->get_field_id('exclude_from'); ?>">Nicht anzeigen in:</label><br/>
					<textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('exclude_from'); ?>" name="<?php echo $this->get_field_name('exclude_from'); ?>"><?php echo esc_attr($exclude_from); ?></textarea><br/>
				</div>
			</p>
			
<?php
	}
}


?>