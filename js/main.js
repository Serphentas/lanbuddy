var open = 0;
function slideMenu(){
    $('.nav').stop();
    $(".cog").stop();
    $('.main-view').stop();
    if(open == 1){
        open = 0;
        $('.nav').animate({
            height:'76px'
        },500, function(){
            $('.nav-content').hide();
            $('.nav .title').css({display:'block'});
            $('.nav .title').css({marginTop:'-92px'});
            $('.nav .title').animate({
                marginTop:'-22px'
            },125);
        });
        $(".cog").animate({  borderSpacing: -90 }, {
            step: function(now,fx) {
              $(this).css('-webkit-transform','rotate('+now+'deg)');
              $(this).css('-moz-transform','rotate('+now+'deg)');
              $(this).css('transform','rotate('+now+'deg)');
            },
            duration:'500'
        },'linear');
        $('.main-view').animate({
            height:getMainViewHeight(76)
        },500);
    }else{
        open = 1;
        $('.nav .title').css({display:'none'});
        $('.nav-content').show();
        $('.nav').animate({
            height:'230px'
        },500, function(){
            //success
        });
        $('.main-view').animate({
            height:getMainViewHeight(230)
        },500);
        $(".cog").animate({  borderSpacing: 90 }, {
            step: function(now,fx) {
              $(this).css('-webkit-transform','rotate('+now+'deg)');
              $(this).css('-moz-transform','rotate('+now+'deg)');
              $(this).css('transform','rotate('+now+'deg)');
            },
            duration:'500'
        },'linear');
    }
}
function getMainViewHeight(navHeight){
    var height = $(window).height();
    var sub = navHeight;
    var height = height - sub;
    return height;
}
function resizeMainView(){
    var height = $(window).height();
    var sub = $('.nav').height() + 20;
    var height = height - sub;
    $('.main-view').css({height:height});
}
function buyItem(id){
    jQuery.ajax({
        'type':'POST','url':'/index.php?r=site/buyItem','data':{'id':id},'cache':false,'success':function(html){
            jQuery('#content').html(html);
        }
    });
};
function buy(id){
    jQuery.ajax({
        'type':'POST','url':'/index.php?r=site/buy','data':{'id':id},'cache':false,'success':function(html){
            jQuery('#content').html(html);
        }
    });
};
function buyCancel(){
    jQuery.ajax({
        'url':'/index.php?r=site/renderShop', 'cache':false,'success':function(html){
            jQuery('#content').html(html);
        }
    });
};

function showOrders(){
    jQuery.ajax({
        'url':'/index.php?r=site/renderOrder', 'cache':false,'success':function(html){
            jQuery('#content').html(html);
        }
    });
};

function deliver(id){
    jQuery.ajax({
        'type':'POST','url':'/index.php?r=site/deliver','data':{'id':id},'cache':false,'success':function(html){
            jQuery('#content').html(html);
        }
    });
}
function subscribe(id){
    var txt;
    var validate = confirm("Es-tu sûr de vouloir participer?");
    if (validate == true) {
        jQuery.ajax({
            'type':'POST','url':'/index.php?r=site/subscribe','data':{'id':id},'cache':false,'success':function(html){
                jQuery('.schedule').html(html);
            }
        });
    }
}


// Document ready

$(document).ready(function(){
    $('.cog').click(function(){
        slideMenu();
        return false;
    });
    resizeMainView();
    $(window).resize(function(){
        resizeMainView(); 
    });
    $('.ladder').niceScroll();
    $('.schedule').niceScroll();
    
});