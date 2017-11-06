
$(document).ready(function() {
    $('.field-input').focus(function () {
        $(this).parent().addClass('is-focused has-label');
    });

    // à la perte du focus
    $('.field-input').blur(function () {
        $parent = $(this).parent();
        $parent.removeClass('is-focused');
    });

    // si un champs est rempli on rajoute directement la class has-label
    $('.field-input').each(function () {
        if ($(this).val() != '') {
            $(this).parent().addClass('has-label');
        }
    });
    var e = document.getElementById("selected");
    e.border.color="green";
    var strUser = e.options[e.selectedIndex].value;
    if(strUser==1){
        e.border.color = "green";
    }
    $('#regForm').submit(function(){
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var result = true;

        if(email == ''){
            $('#email').parent().addClass('is-focused error');
            result = false;
        }
        if(name == ''){
            $('#name').parent().addClass('is-focused error');
            result = false;
        }

        if(password == ''){
            $('#password').parent().addClass('is-focused error');
            result = false;
        }

        
        return result;

    });

    $('#email').keyup(function(){
        if($('#email').val() == ''){
            $('#email').parent().addClass('is-focused error');
        }else{
            $('#email').parent().removeClass('error');
        }

    });
    $('#name').keyup(function(){
        if($('#name').val() == ''){
            $('#name').parent().addClass('is-focused error');
        }else{
            $('#name').parent().removeClass('error');
        }

    });
    $('#password').keyup(function(){
        if($('#password').val() == ''){
            $('#password').parent().addClass('is-focused error');
        }else{
            $('#password').parent().removeClass('error');
        }

    });

});