$(document).ready(function(){	
	$("#registForm").submit(function(event){
		submitForm();
		return false;
	});
});

function submitForm(){
    $.ajax({
        type: "POST",
        url: "saveRegist.php",
        cache:false,
        data: $('form#registForm').serialize(),
        success: function(response){
            $("#regist").html(response)
            $("#regist-modal").modal('hide');
        },
        error: function(){
            alert("Error");
        }
    });
}