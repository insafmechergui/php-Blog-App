$(document).ready(function(){

        $("#comment").click(function() {
            $.ajax({
                url : "commentaire.php",
                type : 'POST',
                //dataType:"json",
                data:$(".formul").serialize(),
                success:function(data) {
                    //console.log(data);
                    //alert(data);
                },
                error:function(error) {
                    console.log("Error : "+JSON.stringify(error)); }
            });
        });

    });