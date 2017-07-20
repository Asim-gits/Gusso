
jQuery(document).ready(function() {
	function set_checkbox_markers () {
		var cookie_val = jQuery.cookie('comparelist', { expires: 7, path: '/' });
		var id_list = cookie_val ? cookie_val.split(",") : [];
		
		jQuery(".comparecheckbox").each(function(index) {
			var cb = jQuery(this);
			var id = cb.val();
			
			if (jQuery.inArray(id, id_list) != -1) {
				cb.prop("checked", true);
			
				cb.parent().children(".comparecheckbox_text").text("gemerkt!").addClass("_983D25");
			} else {
				cb.prop("checked", false);	
			
				cb.parent().children(".comparecheckbox_text").text("Ofen merken?").removeClass("_983D25");
							
			}
		});
	}
	
	function add_to_comparelist (id) {
		var cookie_val = jQuery.cookie('comparelist', { expires: 7, path: '/' });
		var id_list = cookie_val ? cookie_val.split(",") : [];
		
		if ( jQuery.inArray(id, id_list) == -1) {
			id_list.push(id);
		}
		
		cookie_val = id_list.join(',');
		
		jQuery.cookie('comparelist', cookie_val, { expires: 7, path: '/' });
		
		update_list_counter();
			
		jQuery(".comparecheckbox_text_"+id).text("gemerkt!").addClass("_983D25");
		
	}
	
	function remove_from_comparelist (id) {
		var cookie_val = jQuery.cookie('comparelist', { expires: 7, path: '/' });
		var id_list = cookie_val ? cookie_val.split(",") : [];
		
		while ( (id_index = jQuery.inArray(id, id_list) ) != -1) {
			id_list.splice(id_index, 1);
		}
		
		cookie_val = id_list.join(',');
		
		jQuery.cookie('comparelist', cookie_val, { expires: 7, path: '/' });
		
		update_list_counter();
			
		jQuery(".comparecheckbox_text_"+id).text("Ofen merken?").removeClass("_983D25");
		
	}
	
	function is_in_comparelist (id) {
		var cookie_val = jQuery.cookie('comparelist', { expires: 7, path: '/' });
		var id_list = cookie_val ? cookie_val.split(",") : [];
		
		return jQuery.inArray(id, id_list) != -1;
	}
	
	function toogle_in_comparelist (id) {
		if ( !is_in_comparelist (id) ) {
			add_to_comparelist(id);
			
			var heading 			= jQuery("span.header_" + id);
			var compare_list_link 	= jQuery("#compare_list_link");
			
			if (!heading || !compare_list_link || heading.length == 0 || compare_list_link.length == 0) {
				return ;
			}
			
			var clone = heading.clone();
			
			var src_pos = heading.offset();
			var dst_pos = compare_list_link.position();
			
			clone.css("position", 	"absolute");
			clone.css("left",	 	src_pos.left);
			clone.css("top", 		src_pos.top);
			clone.css("border-radius", 		15);
			clone.css("padding", 		5);
			clone.css("text-shadow", "0 0 5px rgba(255, 255, 255, 0.3)");
			
			clone.css("background", "rgba(255, 255, 255, 0.5)");
			
			
			jQuery("body").append(clone);
			
			clone.animate({
				"left" : dst_pos.left
			}, { duration: 700, queue: false, easing:'easeOutCirc' });
			
			clone.animate({
				"top"  : dst_pos.top
			}, { duration: 800, queue: true, easing:'swing'} );
			
			clone.animate({
				"opacity" : 0,
			}, { duration: 900, queue: true, easing:'swing', complete:function () { clone.remove(); } } );
			
		} else {
			remove_from_comparelist(id);
		}
	}
	
	function comparelist_length (id) {
		var cookie_val = jQuery.cookie('comparelist', { expires: 7, path: '/' });
		var id_list = cookie_val ? cookie_val.split(",") : [];
		
		return id_list.length;
	}
	
	function update_list_counter () {
		jQuery("#compare_list_link_counter").text( comparelist_length() );
		
		a = jQuery("#angebots-link");
		
		if (a && a.length > 0) {
			var ovens_arr = [];
			
			jQuery("td.myovens_table_title > a > span").each(function() {
				t = jQuery(this);
				o = t.text().trim();
				
				if (o.length > 0) {
					ovens_arr.push(o);
				}; 
			});
			
			a.prop("href", a.prop("href").replace(/\?.+/, "") + "?o=" + ovens_arr.join(",") );
			
			if (comparelist_length() == 0) {
				a.hide();
			};
		}
	}
	
	jQuery('.comparecheckbox').change(
		function (event) {
			var id = jQuery(this).val();
			
			toogle_in_comparelist(id);
		}
	);
	
	jQuery("#meine_tabelle tr.hoverable").hover(
		function() {
			jQuery(this).addClass("highlight");
			
			var id = jQuery(this).attr("class").replace(/ .+/, "");
			
			jQuery("div#oven_thumb div").hide();
			jQuery("div." + id).show();
		},
		function() {
			jQuery(this).removeClass("highlight");
		}
	)
	
	jQuery("#add_all_to_list").click(
		function(event) {
			event.preventDefault();
			
			jQuery(".div_product_thumb_overview:visible input").each (
				function () {
					id = jQuery(this).attr("value");
					
					add_to_comparelist(id);
					
					jQuery(this).attr("checked", "checked");
				}
			);
		}
	);
	
	jQuery(".myovens_table_rempve_link").click(
		function(event) {
			event.preventDefault();
			
			t = jQuery(this);
			p = t.parent().parent();
			
			id = p.attr("class").replace(/tr_([^ ]+) .+/, "$1");
			remove_from_comparelist(id);
			
			p.css("height", p.height());
			
						
			if (comparelist_length() == 0) {
				jQuery("#oven_thumb").animate({"opacity":"0.0"});
				jQuery("#meine_tabelle_container").animate({"opacity":"0.0"});
			} 
			
			
			p.animate({"opacity":"0.0"} , { duration: 200, complete:function () { 
				p.children().remove(); 
				
				p.animate({"height":"0"} , { 
					duration: 200, complete:function () { 
						p.remove();
						
						if (comparelist_length() == 0) {
							jQuery("#oven_thumb").hide();
							jQuery("#meine_tabelle_container").hide();
							jQuery("#no_ovens_in_my_ovens").show();
						} 
						
						update_list_counter();
				} } );
		
			} } );
			
		}
	)
	
	
	set_checkbox_markers();
	update_list_counter();
	
});