$(document).ready(function(){
    $('#category').hide();

    $('#addform').click(function(){
        $('#category').toggle();
    }); 


    $('#utilisateur').hide();

    $('#ajouteruser').click(function(){
        $('#utilisateur').toggle();
    }); 
      
   

    $("#adduser").click(function() {
        $.ajax({
            url : "user.php",
            type : 'POST',
            //dataType:"json",
            data:$(".btnloginForm").serialize(),
            success:function(data) {
                // console.log(data.name);
                //alert(data);
            },
            error:function(error) {
                console.log("Error : "+JSON.stringify(error)); }
        });
    });


    $("#addcat").click(function() {

        $.ajax({
            url : "addcategory.php",
            type : 'GET',
            dataType:"html",
            data:$(".addform").serialize(),
            success:function(data,statut) {
                // console.log(data.name);
                //alert(data);
                //alert(statut);
            },
            error:function(error) {
                console.log("Error : "+JSON.stringify(error)); }
        });
    });
   
    
    


        
});