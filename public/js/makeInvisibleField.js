function makeInvisible(){
	var dataBank = APP.scope.course;

	if($('#invisible').prop('checked') == true){
		if(!dataBank.invisible_connected && dataBank.invisible == 1){
			$('#invisible_connected').prop('checked', false);
		}else{
			$('#invisible_connected').prop('checked', true);
		}

		$('.divCourseConnected').removeClass('hide');
	}else{
		$('#invisible_connected').prop('checked', false);
		$('.divCourseConnected').addClass('hide');
	}
}
