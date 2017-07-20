
jQuery(document).ready(function() {
	if(jQuery('#serie_id').val() == '')
		 jQuery('#box_eigenschaften').hide();
	else jQuery('#box_eigenschaften').show();
	
	jQuery('#serie_id').change(function() {
		for(var i = 0; i < series_data.length; i++){
			if(jQuery('#serie_id').val() == series_data[i].ID){
				for (var member in series_data[i]) {
					if(member != 'ID' && member != 'title' && member.substr(0,1) != '_')
						jQuery('#'+member).val(series_data[i][member]);
				}
			}
		}
		
		if(jQuery('#serie_id').val() == '')
			 jQuery('#box_eigenschaften').hide();
		else jQuery('#box_eigenschaften').show();
		
		jQuery('#serie_name').val(jQuery("#serie_id option:selected").text());
	});
	
	jQuery('#ofen_id').change(function() {
		for(var i = 0; i < ofen_data.length; i++){
			if(jQuery('#ofen_id').val() == ofen_data[i].ID){
				for (var member in ofen_data[i]) {
					if(member != 'ID' && member != 'title' && member.substr(0,1) != '_'){
						jQuery('#'+member).val(ofen_data[i][member]);
					}
				}
			}
		}
	});
});