$('#button_friend').click(function(){
  $.ajax({
    url:'index.php?page=membres',
    type:'get',
    dataType: 'html';
    success:function(data){
    $('#btn').background.color ='red';


    }
  });

})