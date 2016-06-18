$(function(){

    console.log('test')

})

console.log("!")

function deleteTopic(id) {
    console.log(id)

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/deleteTopic",
        type: "post",
        data: {
            id : id
        },
        success: function(data) {
            alert("删除话题成功!")
            window.location.reload();
            console.log(data)
        }
    })
}

function publishTopic(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/publishTopic",
        type: "post",
        data: {
            id : id
        },
        success: function(data) {
            alert("发布话题成功!")
            window.location.reload();
            console.log(data)
        }
    })

}