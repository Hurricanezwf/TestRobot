$(document).ready(function(){
    registBtnEv();        
});


function registBtnEv() {
    $("#login").click(function(){
        var guid = $("#guid").val();
        if (guid == "") {
            alert("please enter id!");
            return;
        }

        $("form").submit();
    });
}
