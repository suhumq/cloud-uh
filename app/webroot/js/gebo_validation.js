$(document).ready(function()
{
	var myForm = $('form:first');
    myForm.validate({
            errorClass: "errormessage",
            onkeyup: false,
            errorClass: 'error',
            validClass: 'valid',
            rules: {
                field1: { required: true, minlength: 3 },
                field2: { required: true, minlength: 3 },
                field3: { required: true, minlength: 3 },
                field4: { required: true, minlength: 3 },
                field5: { required: true, minlength: 3 },
                field6: { required: true, minlength: 3 },
                field7: { required: true, minlength: 3 },
                field8: { required: true, minlength: 3 },
              	field9: { required: true, minlength: 3 }
                  
            },
            errorPlacement: function(error, element)
            {
                // Set positioning based on the elements position in the form
                var elem = $(element),
                    corners = ['left center', 'right center'],
                    flipIt = elem.parents('span.right').length > 0;
 
                // Check we have a valid error message
                if(!error.is(':empty')) {
                    // Apply the tooltip only if it isn't valid
                    elem.filter(':not(.valid)').qtip({
                        overwrite: false,
                        content: error,
                        position: {
                            my: corners[ flipIt ? 0 : 1 ],
                            at: corners[ flipIt ? 1 : 0 ],
                            viewport: $(window)
                        },
                        show: {
                            event: false,
                            ready: true
                        },
                        hide: false,
                        style: {
                            classes: 'qtip-red' // Make it red... the classic error colour!
                        }
                    })
 
                    // If we have a tooltip on this element already, just update its content
                    .qtip('option', 'content.text', error);
                }
 
                // If the error is empty, remove the qTip
                else { elem.qtip('destroy'); }
            },
            success: $.noop, // Odd workaround for errorPlacement not firing!
    })
});