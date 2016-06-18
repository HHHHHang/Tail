$(function(){

    console.log('test')

})

console.log("!")

function deleteTie(id) {
    console.log(id)

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/deleteTie",
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

function publishTie(id) {
    console.log(id)

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/publishTie",
        type: "post",
        data: {
            id : id
        },
        success: function(data) {
            alert("发表成功!")
            window.location.reload();
            console.log(data)
        }
    })
}