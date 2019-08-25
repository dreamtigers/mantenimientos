$(function () {

    $(document).keypress(function(e){
	
        var keycode = (e.keyCode ? e.keyCode : e.which);
        if(keycode == '13'){
            console.log('You pressed a "enter" key in somewhere');	
            $("#myform").submit();
        }
        
    });

 });