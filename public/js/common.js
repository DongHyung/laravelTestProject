/**
 * 
 */

function toValue(value) {
	alert(JSON.stringify(value));
}

function doAjax(obj) {
	$.ajax({
		type : obj.type || "POST",
		dataType : obj.dataType || "JSON",
		data : obj.data || {},
		url : obj.url,
		error : obj.error || function(data) {
			console.log(data);
			alert("시스템 에러 발생");
		},
		success : function(rs) {
			$.extend(rs.data, obj.data);
			obj.callback(rs);
		}
	});
}

function locationPage(data, url, method) {
	
	var form = "<form id='submitForm' method='"+ method +"' role='form' action='"+ url +"' >";
	
	for (var key in data) {
		form += "<input type='hidden' name='"+ key +"' value='"+ data[ key ] +"' />";
	}
	
	form += "</form>";
	$(document.body).append(form);
	
	$('#submitForm').submit();
	
}

function loadingOn() {
	$("#loading").show();
}

function loadingOff() {
	$("#loading").hide();
}