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

});