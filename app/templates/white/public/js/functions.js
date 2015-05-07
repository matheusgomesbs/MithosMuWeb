function Captcha(div){
	document.getElementById(div).src='pages/captcha.php?' + Math.random();
}
function load_comments(id) {
	$.ajax({
		type: "GET",
		data: "id=" + id,
		url: "pages/ajax/comments.php",
		beforeSend : function() {
			$("#load_comments").html('Carregando coment&aacute;rios... <br /><img src="images/ajax-loader.gif" />');
		},
		success : function(data) {
			$("#load_comments").html(data);
		}
	});
}
function load_answers(id) {
	$.ajax({
		type: "GET",
		data: "id=" + id,
		url: "pages/ajax/answers.php",
		beforeSend : function() {
			$("#load_answers").html('Carregando respostas para este ticket... <br /><img src="images/ajax-loader.gif" />');
		},
		success : function(data) {
			$("#load_answers").html(data);
		}
	});
}
function load_servers() {
	$.ajax({
		type: "GET",
		url: "pages/ajax/servers.php",
		success : function(data) {
			$("#load_servers").html(data);
		}
	});
}