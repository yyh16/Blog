
$(function(){
    // 监听滚动事件
 
    $(window).scroll(function(){
         // 获得div的高度
 
         var h = $("#fl_yushou").offset().top;
         if($(this).scrollTop()>h && $(this).scrollTop() < h+$("#fl_yushou").height()){
            // 滚动到指定位置
            $("#flow-left").show();
 
        } else {
            $("#flow-left").hide();
        }
    });
 
})


