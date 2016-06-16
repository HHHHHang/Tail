/**
 * Created by Hang on 16/6/16.
 */
$(document).ready(function(){
    $("#goToTop").hide()//隐藏go to top按钮
    $(function(){
        $(window).scroll(function(){
            if($(this).scrollTop()>200){//当window的scrolltop距离大于1时，go to top按钮淡出，反之淡入
                $("#goToTop").fadeIn();
            } else {
                $("#goToTop").fadeOut();
            }
        });
    });


    // 给go to top按钮一个点击事件
    $("#goToTop a").click(function(){
        $("html,body").animate({scrollTop:0},800);//点击go to top按钮时，以800的速度回到顶部，这里的800可以根据你的需求修改
        return false;
    });
});