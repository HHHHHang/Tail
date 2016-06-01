$( document ).ready(function() {

	$('#search').click(function(){
		let keyword = $('#keyword').val()
		window.location.href='/search/article/'+ keyword;
	})

});