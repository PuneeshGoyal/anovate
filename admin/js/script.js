$(document).ready(function(){
	
	$('.item .delete').click(function(){
		
		var elem = $(this).closest('.item');
		
		$.confirm({
			'title'		: 'Catagories',
			'message'	: 'Are You Sure You Want To Disable This Category.',
			'buttons'	: {
				'continue'	: {
					'class'	: 'continue',
					'action': function(){
						elem.slideUp();
					}
				},
				'cancel'	: {
					'class'	: 'cancel',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		
	});
	
});
$(document).ready(function(){
	
	$('.item .delete1').click(function(){
		
		var elem = $(this).closest('.item');
		
		$.confirm({
			'title'		: 'Catagories',
			'message'	: 'Are You Sure You Want To Delete This Category.',
			'buttons'	: {
				'continue'	: {
					'class'	: 'continue',
					'action': function(){
						elem.slideUp();
					}
				},
				'cancel'	: {
					'class'	: 'cancel',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		
	});
	
});