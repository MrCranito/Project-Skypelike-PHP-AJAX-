<script type="text/javascript">
    function change_status(){
        var my_status= document.getElementById('button_status').value;
         if (my_status=="ON"){
        document.getElementById('button_status').style.background.color="green";
          my_status="OFF";
        }
        if(my_status=="OFF"){
            document.getElementById('button_status').style.background.color="orange";
          my_status="OFFLINE";
        }
        else {
            document.getElementById('button_status').style.background.color="red";
            my_status="ON";
            
        }
    }
</script>