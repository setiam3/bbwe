(function($){
  $(document).ready(function(){
    var cliked=0;
    function generateWheel(){
    var listItems = $(".menu li");
    var deg=360/listItems.length;
    $(".menu").css({transform:'matrix(1,0,0,1,0,0) rotate(0deg)'});
    for (var i = 1; i <= listItems.length; i++) {
      $(".menu li:eq("+(i-1)+")").attr('style','-moz-transform: rotate('+deg*(i-1)+'deg) skew(50deg);-ms-transform: rotate('+deg*(i-1)+'deg) skew(50deg);-webkit-transform: rotate('+deg*(i-1)+'deg) skew(50deg);transform: rotate('+deg*(i-1)+'deg) skew(50deg);');
      $(".menu li:eq(0)").addClass('left0');
      $(".menu li:eq(2)").addClass('center0');
      $(".menu li:eq(4)").addClass('right0');
      $('.left0 img, .left0 div').css({transform:'rotate('+deg*2+'deg)'});
      $('.center0 img, .center0 div').css({transform:'rotate(0deg)'});
      $('.right0 img, .right0 div').css({transform:'rotate(-'+deg*2+'deg)'});
      $('.left0 div, .right0 div').hide();
      $('.center0 div').show();
    }
  }

var thisButton;
function openMenu (thisButton) {
  if(!thisButton.hasClass("active")){
    thisButton.addClass("active");$(".menu").show();
    $(".ellipsis2,.ellipsis3,.ellipsis4").show();
    $(".menu,.button.left,.button.right,.maskwheel").show();
    $(".ellipsis").html('<i class="fa fa-times"></i>');
    $('.pic-models').addClass('opacity');
    generateWheel();
  }else{
  	$('.pic-models').removeClass('opacity');
    $(".ellipsis2,.ellipsis3,.ellipsis4").hide();
    $(".menu, .button.left,.button.right,.maskwheel").hide();
    $(".radialnav, .submenu").removeClass("active");
    $(".ellipsis").children().remove('i');
    $(".ellipsis").html('<img src="'+baseUrl+'/images/directory-show-menu.png" class="img-fluid">');
  }
}

  function addTransform(val) {
	    var tr = $('.menu').css('transform');
	    if(tr === 'none') tr = '';
	    $('.menu').css('transform', tr + ' ' + val);
	}
	function sendFirstCategory(){
        var test = "this is an ajax test";
        $.ajax({
            url: 'wheel',
            type: 'get',
             success: function(data) {
                 console.log(data);
             }
         });
    }

function getRotationDegrees(obj) {
    var matrix = obj.css("-webkit-transform") ||
    obj.css("-moz-transform")    ||
    obj.css("-ms-transform")     ||
    obj.css("-o-transform")      ||
    obj.css("transform");
    if(matrix !== 'none') {
        var values = matrix.split('(')[1].split(')')[0].split(',');
        var a = values[0];
        var b = values[1];
        var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
    } else { var angle = 0; }
    return angle;
}

$('.button.left').click(function() {
  $('.menu').css({
    position: 'absolute',
    transition: '400ms ease-in-out',
  });
  var deg=getRotationDegrees($(".menu li:eq(2)"));
  addTransform('rotate(-'+deg+'deg)');
  var l1=$('.menu li').index($('.left0')[0]); var c1=$('.menu li').index($('.center0')[0]); var r1=$('.menu li').index($('.right0')[0]);
  $(".menu li").removeClass('left0');$(".menu li").removeClass('center0');$(".menu li").removeClass('right0');
  l1+=2; c1+=2; r1+=2;
  if(l1>=10){
    l1=0;c1=2;r1=4;
  }
  if(c1>=10){
    c1=0;
  }if(r1>=10){
    r1=0;
  }
  $(".menu li:eq("+l1+")").addClass('left0');
  $(".menu li:eq("+c1+")").addClass('center0');
  $(".menu li:eq("+r1+")").addClass('right0');
  $('.left0 img, .left0 div').css({transform:'rotate('+deg*1+'deg)'});
  $('.center0 img, .center0 div').css({transform:'rotate(0deg)'});
  $('.right0 img, .right0 div').css({transform:'rotate(-'+deg+'deg)'});
  $('.left0 div, .right0 div').hide();
  $('.center0 div').show();
});

$('.button.right').click(function() {
  $('.menu').css({
    position: 'absolute',
    transition: '400ms ease-in-out',
  });
  var deg=getRotationDegrees($(".menu li:eq(2)"));
  addTransform('rotate('+deg+'deg)');
  var l1=$('.menu li').index($('.left0')[0]); var c1=$('.menu li').index($('.center0')[0]); var r1=$('.menu li').index($('.right0')[0]);
  $(".menu li").removeClass('left0');$(".menu li").removeClass('center0');$(".menu li").removeClass('right0');
  l1-=2; c1-=2; r1-=2;
  if(l1>=10){
    l1=0;c1=2;r1=4;
  }
  if(c1>=10){
    c1=0;
  }if(r1>=10){
    r1=0;
  }
  $(".menu li:eq("+l1+")").addClass('left0');
  $(".menu li:eq("+c1+")").addClass('center0');
  $(".menu li:eq("+r1+")").addClass('right0');
  $('.left0 img, .left0 div').css({transform:'rotate('+deg+'deg)'});
  $('.center0 img, .center0 div').css({transform:'rotate(0deg)'});
  $('.right0 img, .right0 div').css({transform:'rotate(-'+deg+'deg)'});
  $('.left0 div, .right0 div').hide();
  $('.center0 div').show();
});

$(".ellipsis").click(function (event) {
  event.preventDefault();
  openMenu($(".radialnav"));
});

});
})(jQuery);