$(function(){

    console.log('test')

})

console.log("!")

function deleteArticle(id) {
    console.log(id)

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/deleteArticle",
        type: "post",
        data: {
            id : id
        },
        success: function(data) {
            alert("删除成功!")
            window.location.reload();
            console.log(data)
        }
    })
}

function publishArticle(id) {
    console.log(id)

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/publishArticle",
        type: "post",
        data: {
            id : id
        },
        success: function(data) {
            alert("发布成功!")
            window.location.reload();
            console.log(data)
        }
    })
}

function changeType() {
    location.href = "/cms/article/" + $('#type').val()
}