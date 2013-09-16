var FormEditable = function () {

    $.mockjaxSettings.responseTime = 500;

    var log = function (settings, response) {
        var s = [],
            str;
        s.push(settings.type.toUpperCase() + ' url = "' + settings.url + '"');
        for (var a in settings.data) {
            if (settings.data[a] && typeof settings.data[a] === 'object') {
                str = [];
                for (var j in settings.data[a]) {
                    str.push(j + ': "' + settings.data[a][j] + '"');
                }
                str = '{ ' + str.join(', ') + ' }';
            } else {
                str = '"' + settings.data[a] + '"';
            }
            s.push(a + ' = ' + str);
        }
        s.push('RESPONSE: status = ' + response.status);

        if (response.responseText) {
            if ($.isArray(response.responseText)) {
                s.push('[');
                $.each(response.responseText, function (i, v) {
                    s.push('{value: ' + v.value + ', text: "' + v.text + '"}');
                });
                s.push(']');
            } else {
                s.push($.trim(response.responseText));
            }
        }
        s.push('--------------------------------------\n');
        $('#console').val(s.join('\n') + $('#console').val());
    }

    var initAjaxMock = function () {
        //ajax mocks

        $.mockjax({
            url: '/post',
            response: function (settings) {
                log(settings, this);
            }
        });

        $.mockjax({
            url: '/error',
            status: 400,
            statusText: 'Bad Request',
            response: function (settings) {
                this.responseText = 'Please input correct value';
                log(settings, this);
            }
        });

        $.mockjax({
            url: '/status',
            status: 500,
            response: function (settings) {
                this.responseText = 'Internal Server Error';
                log(settings, this);
            }
        });

        

    }

    var initEditables = function () {

        //set editable mode based on URL parameter
        if (App.getURLParameter('mode') == 'inline') {
            $.fn.editable.defaults.mode = 'inline';
            $('#inline').attr("checked", true);
            jQuery.uniform.update('#inline');
        } else {
            $('#inline').attr("checked", false);
            jQuery.uniform.update('#inline');
        }

        //global settings 
        $.fn.editable.defaults.inputclass = 'm-wrap';
        $.fn.editable.defaults.url = '/post';
        $.fn.editableform.buttons = '<button type="submit" class="btn blue editable-submit"><i class="icon-ok"></i></button>';
        $.fn.editableform.buttons += '<button type="button" class="btn editable-cancel"><i class="icon-remove"></i></button>';

		// Fluorish Specific Data Sets    
    
        $('#dob').editable({
            inputclass: 'm-wrap',
        });

        $('#address').editable({
            url: '/post',
            value: {
                city: "San Francisco",
                street: "Valencia",
                building: "#24"
            },
            validate: function (value) {
                if (value.city == '') return 'city is required!';
            },
            display: function (value) {
                if (!value) {
                    $(this).empty();
                    return;
                }
                var html = '<b>' + $('<div>').text(value.city).html() + '</b>, ' + $('<div>').text(value.street).html() + ' st., bld. ' + $('<div>').text(value.building).html();
                $(this).html(html);
            }
        });

		// Target
        var targets = [];
        $.each({
            "0": "CD4",
			"1": "CD3",
            "2": "CD5"
        }, function (k, v) {
            targets.push({
                id: k,
                text: v
            });
        });

        $('#target').editable({
            inputclass: 'input-large',
            source: targets
        });
		
		// Format
		var formats = [];
        $.each({
            "0": "BIOTIN",
			"1": "PE",
            "2": "eFluor 450"
        }, function (k, v) {
            formats.push({
                id: k,
                text: v
            });
        });

        $('#format').editable({
            inputclass: 'input-large',
            source: formats
        });
		
		// Clone
		var clones = [];
        $.each({
            "0": "RP-1",
			"1": "RF8B2",
            "2": "EBA1"
        }, function (k, v) {
            clones.push({
                id: k,
                text: v
            });
        });

        $('#clone').editable({
            inputclass: 'input-large',
            source: clones
        });	
		
		
		// Target_Species
		var target_species = [];
        $.each({
            "0": "Rat",
			"1": "Human",
            "2": "Bovine"
        }, function (k, v) {
            target_species.push({
                id: k,
                text: v
            });
        });

        $('#target_specie').editable({
            inputclass: 'input-large',
            source: target_species
        });
		
		// Manufacture
		var manufactures = [];
        $.each({
            "0": "BD",
			"1": "eBioscience",
            "2": "Tombo"
        }, function (k, v) {
            manufactures.push({
                id: k,
                text: v
            });
        });

        $('#manufacture').editable({
            inputclass: 'input-large',
            source: manufactures
        });	
		
		// Product_ID
		var product_ids = [];
        $.each({
            "0": "0251",
			"1": "45621",
            "2": "8156123"
        }, function (k, v) {
            product_ids.push({
                id: k,
                text: v
            });
        });

        $('#product_id').editable({
            inputclass: 'input-large',
            source: product_ids
        });
		
		// Amount
		$('#amount').editable({
            url: '/post',
            type: 'text',
            pk: 1,
            name: 'amount',
            title: 'Enter Amount'
        });	
		
		// Product_ID
		var categories = [];
        $.each({
            "0": "AB",
			"1": "SA",
            "2": "Dye"
        }, function (k, v) {
            categories.push({
                id: k,
                text: v
            });
        });

        $('#category').editable({
            inputclass: 'input-large',
            source: categories
        });	
		
		// Location
		$('#location').editable({
            url: '/post',
            type: 'text',
            pk: 1,
            name: 'location',
            title: 'Enter Location'
        });	
		
        $('#comments').editable({
            showbuttons: 'bottom'
        });

        $('#note').editable({
            showbuttons : (App.isRTL() ? 'left' : 'right')
        });

        $('#pencil').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            $('#note').editable('toggle');
        });

		
    }

    return {
        //main function to initiate the module
        init: function () {

            // inii ajax simulation
            initAjaxMock();

            // init editable elements
            initEditables();


            // init editable toggler
            $('#enable').click(function () {
                $('#user .editable').editable('toggleDisabled');
            });

            // init 
            $('#inline').on('change', function (e) {
                if ($(this).is(':checked')) {
                    window.location.href = 'inventory.php?mode=inline';
                } else {
                    window.location.href = 'inventory.php';
                }
            });

            // handle editable elements on hidden event fired
            $('#user .editable').on('hidden', function (e, reason) {
                if (reason === 'save' || reason === 'nochange') {
                    var $next = $(this).closest('tr').next().find('.editable');
                    if ($('#autoopen').is(':checked')) {
                        setTimeout(function () {
                            $next.editable('show');
                        }, 300);
                    } else {
                        $next.focus();
                    }
                }
            });


        }

    };

}();