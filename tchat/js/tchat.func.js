$(document).ready(function() {

    recupMessage();

    $('.field-input').focus(function () {
        $(this).parent().addClass('is-focused has-label');
    });

    // à la perte du focus
    $('.field-input').blur(function () {
        $parent = $(this).parent();
        if ($(this).val() == '') {
            $parent.removeClass('has-label');
        }
        $parent.removeClass('is-focused');
    });

    // si un champs est rempli on rajoute directement la class has-label
    $('.field-input').each(function () {
        if ($(this).val() != '') {
            $(this).parent().addClass('has-label');
        }
    });

    $('#send').click(function(){
        var message = $('#message').val();

        if(message != ''){
            $.post('ajax/post.php',{message:message},function(){
                recupMessage();
                $('#message').val('');
            });
        }
    });

    function recupMessage(){
        $.post('ajax/recup.php',function(data){
            $('.messages-box').html(data);

        });
    }

    setInterval(recupMessage,1000);

});
window.onload(upload_img());


function upload_img(){
    var dropzone=document.getElementByID('dropzone');

    var dispayUpload = function(data){
        var uploads = document.getElementByID('uploads'),
        anchor,
        x;

        for(x=0;x< data.length;x=x+1){
            anchor= document.createElement('a');
            anchor.href=data[x].file;
            anchor.innerText= data[x].name;

            uploads.appendChild(anchor);

        }        
    }

    var upload = function(files){
        var formData = new formData(),
        xhr=new XMLHttpRequest(),
        x;
        for(x=0;x < files.length;x=x+1){
            formData.append('files[]',files[x])
        }
        xhr.onload=function(){
            var data =JSON.parse(this.respnseText);
            dispayUpload(data);

        }
        xhr.open('post', 'upload_image.func.php');
        xhr.send(formData);

    }
    dropzone.ondrop = function(e){
        e.preventDefault();
        this.className = 'dropzone';
        upload(e.dataTransfert.files);

    }

    dropzone.ondragOver = function(){
        this.className = 'dropzone dragover';
        dropzone.style.visibility="visible";
        getElementByID('messages-box').style.visibility="hidden";

        return false;
    }
    dropzone.ondragLeave = function(){
        this.className = 'dropzone';
        dropzone.style.visibility="hidden";
        getElementByID('messages-box').style.visibility="hidden";
        return false;
    }
}