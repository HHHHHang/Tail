$(function(){

    console.log('test')
    $('#submit').click(function() {
        var account = $('#account').val()
        var psw     = $('#password').val()
        if (account != 'admin' && psw != 'admin') {
            alert("错误的账户信息！")
        } else {
            window.location.href='/cms/article'
        }

    })
})