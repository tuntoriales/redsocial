$(document).ready(function(){
	$(".like").click(function(){
		var id = this.id;

		$.ajax({
			url: 'megusta.php',
			type: 'POST',
			data: {id:id},
			dataType: 'json',

			success:function(data){
				var likes = data['likes'];
				var text = data['text'];

				$("#likes_"+id).text(likes);
				$("#"+id).html(text);
			}
		});
	});
});