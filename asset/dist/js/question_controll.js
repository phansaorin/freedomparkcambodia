/*$("#yes").on("click", function(e){
    var baseurl = $(this).attr("baseurl");
    var parent = $(this).attr('parent');
    $.ajax({
        url: baseurl+"page/next_question",
        type: "POST",
        data: {
            id: $('.question').attr('id'),
            parent_id: parent
        },
        success:function(data){
            if(data == 0) {
                window.location.href = baseurl+"page/finished/"+parent;
            }else{
               $('#question_block').html(data);
            }
        }
    });
});*/

$("#yes").on("click", function(e){
    var baseurl = $(this).attr("baseurl");
    var category = $(this).attr('parent');
    $.ajax({
        url: baseurl+"page/next_question",
        type: "POST",
        data: {
            id: $('.question').attr('id'),
            cateID: category
        },
        success:function(data){
            if(data == 0) {
                window.location.href = baseurl+"page/finished/"+category;
            }else{
               $('#question_block').html(data);
            }
        }
    });
});

$("#no").on("click", function(e){
    var baseurl = $(this).attr("baseurl");
    var category = $(this).attr('parent');
    $.ajax({
        url: baseurl+"page/next_question_no",
        type: "POST",
        data: {
            id: $('.question').attr('id'),
            cateID: category
        },
        success:function(data){
            if(data == 0) {
                window.location.href = baseurl+"page/vedio_no/"+category;
            }else{
               $('#question_block').html(data);
            }
        }
    });
});
