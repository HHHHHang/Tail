$( document ).ready(function() {

	$('#search').click(function(){
		let keyword = $('#keyword').val()
		console.log('search!')
		window.location.href='/search/article/'+ keyword;
	})

	$('#searchTie').click(function(){
		let keyword = $('#keywordTie').val()
		window.location.href='/search/forum/'+ keyword;
	})

    $('#searchTopic').click(function() {
        let keyword = $('#keywordTopic').val()
        window.location.href='/search/topic/' + keyword;
    })

    $('#header-search').click(function() {
        let keyword = $('#header-keyword').val()
        window.location.href='/search/article/' + keyword;
    })

});