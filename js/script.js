/* Modified version of Adam Khoury's code */ 

$(function() {
   $("#progressBar").hide();
});

function _(el) {
	return document.getElementById(el);
}

function uploadFile() {
	var file = _("fileToUpload[]").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("fileToUpload[]", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "");
	ajax.send(formdata);
}

function progressHandler(event) {
	$("#progressBar").show();
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}

function completeHandler(event) {
	_("status").innerHTML = event.target.responseText;
	$("#progressBar").hide();
	_("progressBar").value = 0;
}

function errorHandler(event) {
	_("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
	_("status").innerHTML = "Upload Aborted";
}

var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});


input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });