(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		"ajax": "php/table.events.php",
		"table": "#events",
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
				"label": "Start Date",
				"name": "StartDate",
				"type": "date",
				"dateFormat": "dd\/mm\/y",
				"dateImage": "images\/calender.png"
			},
			{
				"label": "End Date",
				"name": "EndDate",
				"type": "date",
				"dateFormat": "dd\/mm\/y",
				"dateImage": "images\/calender.png"
			},{
				"label": "Start Time",
				"name": "StartTime",
				"type": "text"
			},{
				"label": "End Time",
				"name": "EndTime",
				"type": "text"
			},{
				"label": "Location",
				"name": "Location",
				"type": "text"
			},{
				"label": "Type",
				"name": "Type",
				"type": "select",
				"ipOpts": [
					{
						"label": "Seminar ",
						"value": "Seminar "
					},
					{
						"label": " Training ",
						"value": " Training "
					},
					{
						"label": " Technical Excursion ",
						"value": " Technical Excursion "
					},
					{
						"label": " Competition ",
						"value": " Competition "
					},
					{
						"label": " Programming Course ",
						"value": " Programming Course "
					},
					{
						"label": " Exhibition ",
						"value": " Exhibition "
					},
					{
						"label": " Career Event ",
						"value": " Career Event "
					},
					{
						"label": " Socail Event",
						"value": " Socail Event"
					}
				]
                                
			},
			
		]
	} );

	$('#events').dataTable( {
		"dom": "Tfrtip",
		"ajax": "php/table.events.php",
		"columns": [
			{
				"data": "Title"
			},
			{
				data: "Description",
				render:function(data,type,row){
					return data.length>200 ? data.substr(0,200) +" ..." : data
				}
			},
			{
				"data": "StartDate"
			},
			{
				"data": "EndDate"
			},
                        {
				"data": "StartTime"
			},
			{
				"data": "EndTime"
			},
			{
				"data": "Location"
			},
			{
				"data": "Type"
			},
                        
                        
			{
		                data: "Photopath",
		                render: function (data, type, row) {
		                    if (!!data) {
		                        var photoPath=row.Photopath;
		                        return '<img src="'+data+'" width="100" height="100" />'+'<br>'+'<form method="post" action="updateEventOnlyPhoto.php" enctype="multipart/form-data"><input type="hidden" name="oldPhotoPath" value='+photoPath+' /><input type="file" name="photopath"  /><button type="submit" class="btn btn-primary">Edit Photo</button/></form>';
				
                                        
		                    }
		                    return '';
		                }
           		 },
           		 
           		 
		],
		
		"tableTools": {
			"sRowSelect": "os",
			"aButtons": [
				
				{ "sExtends": "editor_edit",   "editor": editor },
				{ "sExtends": "editor_remove", "editor": editor }
			]
		},
		
	} );
} );


 

 


}(jQuery));