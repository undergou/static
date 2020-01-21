$(document).ready(function(){
    $("#example-h").click(function(){

        // var obj = {
        // 	post: 'bayern',
			// rate: 4
        // };
        var rate = 5;
        var slug = 'amsterdam';
        // var data = JSON.stringify(obj);
        $.ajax({
            url:'rating/create.html',
            type: 'POST',
            data: {rate: rate,
                slug: slug},
			// dataType: 'json',
            success: function(response){
                $('#result-example').html(response);
                console.log('success');
                console.log(response);
            }
        });
    });
});
