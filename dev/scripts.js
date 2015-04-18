$(document).ready(function() { 
  var pagerOptions = {
    container: $(".pager"),
    output: '{startRow:input} to {endRow} ({totalRows})',
    updateArrows: true,
    page: 0,
    size: 10, 
    storageKey:'tablesorter-pager',
    fixedHeight: true,
	//don't set this false
    removeRows: true,	
    cssNext: '.next', 
    cssPrev: '.prev', 
    cssFirst: '.first', 
    cssLast: '.last', 
  };

  $("Table")
    .tablesorter({
		theme: 'blue',
      widthFixed: false,
      widgets: ["filter"],
	  widgetOptions : {
      filter_external : '.search',
      filter_defaultFilter: { 1 : '~{query}' },
      filter_columnFilters: true,
      filter_placeholder: { search : 'Search...' },
      filter_saveFilters : true,
      filter_reset: '.reset'
    },
	  cssChildRow: "tablesorter-childRow"
    })
    .tablesorterPager(pagerOptions);
});
