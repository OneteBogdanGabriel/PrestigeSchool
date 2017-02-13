(function( $ ) {
	//'use strict';
 $("#resetAllProducts").click(function() { waveJS.refreshTable()  }); 
$("#wavetree").fancytree({click: function(event, data) {		waveJS.refreshTable({category:data.node.key})}});
$("#wave_search").keyup(function(event){
    if(event.keyCode == 13){
      waveJS.refreshTable({s:$("#wave_search").val()});
    }
}); 

$('#wave_layout').height( $("#wpcontent").outerHeight()  );

$('#wave_layout').layout( );

var select =    $('#wave_search_options');
var newOptions = {'':'',
                'sku' : 'sku',
                'title' : 'title'};  
$('option', select).remove();
$.each(newOptions, function(text, key) { var option = new Option(key, text);select.append($(option));});
 

  waveJS = {
	 table: $('#wave_table') ,
	
	refreshTable: function(args ) {
        if (args)
		{
        if (!args.hasOwnProperty("category")) args.category = waveJS.category; else waveJS.category=args.category;
        if (!args.hasOwnProperty("s")) args.s = waveJS.s; else waveJS.s=args.s;
		}
		else
		{
			 args ={category:""}
		}
 		 waveJS.table.addClass('waiting');
		        
        var data = {
		'action': 'wave_get_category_products_action',
		'wave_nonce':ajax_object.wave_nonce,
		'category': args.category     , 
        's':args.s
	};
	// We can also pass the url value separately from ajaxurl for front end AJAX implementations
	jQuery.post(ajax_object.ajax_url, data, function(response) {
 
 $( waveJS.table).empty()
   waveJS.table.removeClass('waiting');
var ul = $('<ul>').appendTo( waveJS.table);
  
$(response).each(function(index, item) {
    
    ul.append(
        $(document.createElement('li')).html(
            '<a href="' + item.link + '">' +
            '<img src="' + item.image  + '" width="150" height="150">' +
            '[' + item.sku  + "]" +
            item.name +  
            "</a>"
           
        )
    );
});
     
		 
	});
	}
}    
	 
 
})( jQuery );
