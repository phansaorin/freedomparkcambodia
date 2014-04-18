jQuery(document).ready(function() {

	/* check all */
    if (jQuery('input#check_all')) {
        jQuery('input#check_all').click(function() {
            if (this.checked === false) {
                jQuery('.check_value:checked').attr('checked', false);
            } else {
                jQuery('.check_value:not(:checked)').attr('checked', true);
            }
        });
    }

    jQuery("button#btnSubmit").click(function(){
		var url = jQuery('form#new').attr('action');
		var categoryName = jQuery("input[name='categoryName']").val();
		if (categoryName == "") {
			alert("Please fill the input form");
			return false;
		};

		jQuery.ajax({
		type: "POST",
		url: url,
		data: {
			"categoryName" : categoryName
		},
		success : function (msg) {
			if(msg = 'saved'){
				alert("Create successfully!");
				jQuery("#new").modal('hide');
				window.location.reload(true);
			} else {
				alert('Sending email is failed!'); return false;
			}
		}
	});
	});

	//Button for remove data as permanent
	jQuery('a#removePermanent').on('click', function(event){
		if(jQuery('input[type="checkbox"]').is(':checked')){
			var url = jQuery(this).attr('href');
			event.preventDefault();
			var rcdsChecked = jQuery('input:checkbox:checked.check_value').map(function () {
			  	return jQuery(this).val();
			}).get();
			alert("Do you want to delete as permanent");

			jQuery.ajax({
				type: "POST",
				url: url,
				data: { "checkedID" : rcdsChecked },
				success: function(event){
					jQuery('input:checkbox:checked').each(function(){
				        jQuery('input:checkbox:checked').parents("tr").remove();
				    });
				    jQuery('input:checkbox:checked').removeAttr('checked');
				}
			});	
			return false;
		} else {
			alert('Please select checkbox to delete!'); return false;
		}
	});

	/* Click edit link and retrieve data into form for edit */
    jQuery("a.edit").click(function(){
        var url = jQuery(this).attr("href").replace("#", "");
        alert(url);
        $.ajax({
            url: url,
            dataType: "json",
            success: function(data){
            	alert(data);
                // var action = jQuery("form#customer_frm").attr("action");
                // jQuery("form#customer_frm").attr("action", action+"/"+data.customer_id);

                jQuery("input[name='categoryName']").val(data);
            }
        }); 
    });

	/*show and hide message error or success*/
	// jQuery("dl#system-message").fadeIn('slow').animate({opacity: 1.0}, 1500).effect("pulsate", { times: 5 }, 800).fadeOut('slow');

});