$(document).ready(function(){
    InitLoginBtn();
});

function InitLoginBtn() {
    $("#login").click(function(){
        var guid = $("#guid").val();
        if (guid == "") {
            alert("please enter id!")
            return
        }

        $("form").submit();
    });   
}

