$(document).ready(function(){
    $("#cadastrar").click(function(){
        /*$("#form-login").remove();*/
        $("#form-login").css("display", "none");
        $("#form-cadastrar").css("display", "block");
    });


    $("#esquecer").click(function(){
        /*$("#form-login").remove();*/
        $("#form-login").css("display", "none");
        $("#form-recuperar").css("display", "block");
    });

    $("#voltar").click(function(){
        $("#form-cadastrar").css("display", "none");
        $("#form-login").css("display", "block");
    });
    $("#voltar2").click(function(){
        $("#form-recuperar").css("display", "none");
        $("#form-login").css("display", "block");
    });



    $("#form-cadastrar").validate({
        rules:{
            nome1: {
                required: true,
                rangelength:[5,100],
                minWords: 2
            },
            email1: {
                required: true,
                email: true
            },
            senha: {
                required:true, 
                rangelength:[5,10]
            },
            senha2: {
                required: true,
                equalTo: "#senha"
            },
            termos: {
                required: true
            }
        }
    });
});