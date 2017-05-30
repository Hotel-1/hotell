(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		"ajax": "php/table.reports.php",
		"table": "#reports",
		"fields": [
			{
				"label": "Title",
				"name": "Title",
				"type": "text"
			},
			{
				"label": "Description",
				"name": "Description",
				"type": "textarea"
			},
			{
				"label": "Date",
				"name": "Date",
				"type": "date",
				"dateFormat": "dd\/mm\/y",
				"dateImage": "images\/calender.png"
			},
			{
				"label": "Type",
				"name": "Type",
				"type": "select",
				"ipOpts": [
                                         
					{
						"label": "ACM Annual Report ",
						"value": "ACM Annual Report "
					},
					{
						"label": " Faculty Report ",
						"value": " Faculty Report "
					},
					{
						"label": " Sponsorship Document ",
						"value": " Sponsorship Document "
					},
					{
						"label": " Information Document ",
						"value": " Information Document "
					},
					{
						"label": " Presentation File",
						"value": " Presentation File"
					}
				]
			}
			
		]
	} );

	$('#reports').dataTable( {
		"dom": "Tfrtip",
		"ajax": "php/table.reports.php",
		"columns": [
			{
				"data": "Title"
			},
			{
				"data": "Description"
			},
			{
				"data": "Date"
			},
			{
				"data": "Type"
			},
			{
				"data": "Document"
				
				
           		 },
           		 
		],
		"tableTools": {
			"sRowSelect": "os",
			"aButtons": [
				
				{ "sExtends": "editor_edit",   "editor": editor },
				{ "sExtends": "editor_remove", "editor": editor }
			]
		}
	} );
} );

}(jQuery));