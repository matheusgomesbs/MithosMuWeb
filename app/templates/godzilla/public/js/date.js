var dayarray = new Array("Domingo", "Segunda-feira", "Ter&ccedil;a-feira",
		"Quarta-feira", "Quinta-feira", "Sexta-feira", "S&aacute;bado")

function getthedate() {
	var mydate = new Date()
	var day = mydate.getDay()
	var hours = mydate.getHours()
	var minutes = mydate.getMinutes()
	var seconds = mydate.getSeconds()
	if (hours > 24)
		hours = hours - 24
	if (minutes <= 9)
		minutes = "0" + minutes
	if (seconds <= 9)
		seconds = "0" + seconds
	var cdate = " " + hours + ":" + minutes + ":" + seconds + " - "
			+ dayarray[day] + ""
	if (document.all)
		document.all.setdate.innerHTML = cdate
	else if (document.getElementById)
		document.getElementById("setdate").innerHTML = cdate
	else
		document.write(cdate)
}
if (!document.all && !document.getElementById)
	getthedate()
function goforit() {
	if (document.all || document.getElementById)
		setInterval("getthedate()", 1000)
}