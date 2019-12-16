function searchMovie(){
	$('#movie-list').html('');
	
	$.ajax({
		url : 'https://omdbapi.com',
		type : 'get',
		dataType : 'json',
		data : {
			'apikey' : '5c8fdbb7',
			's' : $('#search-input').val(),
		},
		success : function(result){
			if (result.Response == "True") {
				let movies = result.Search;
				$.each(movies, function(i, data){
					$('#movie-list').append(`
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top" src="`+data.Poster+`" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">`+data.Title+`</h5>
						    <h6 class="card-subtitle mb-2 text-muted">`+data.Year+`</h6>
						    <a href="#" class="card-link see-detail "  data-toggle="modal" data-target="#exampleModal"data-id="`+data.imdbID+`">See Detail</a>
						  </div>
						</div>
						`);
				});
				$('#search-input').val('');

				

			}else {
				$('#movie-list').html('<h1 class="text-center">'+result.Error+'</h1>');
			}
		},
	});
}

$('#search-button').on('click', function() {
	searchMovie();
});


$('#search-input').on('keyup', function(e) {
	if (e.which === 13) {
		searchMovie();
	}
});

$('#movie-list').on('click', '.see-detail', function (){
	// console.log($(this).data('id'));
	$('.modal-body').html('');

	$.ajax({
		url : 'https://omdbapi.com',
		type : 'get',
		dataType : 'json',
		data : {
			'apikey' : '5c8fdbb7',
			'i' : $(this).data('id'),
		},
		success : function(movie){
			if (movie.Response === 'True') {
				$('.modal-body').html(`
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-4">
								<img src="`+movie.Poster+`" class="img-fluid">

							</div>
							<div class="col-md-8">
								<ul class="list-group">
									<li class="list-group-item">`+movie.Title+`</li>
									<li class="list-group-item">`+movie.Plot+`</li>
								</ul>
							</div>
						</div>
					</div>
				`);
			}
		},
	});
});

