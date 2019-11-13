<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="index.css"> -->
<link rel="stylesheet" href="<?=$this->theme->baseUrl?>/css/font-awesome.min.css">
<style type="text/css">
body {
  background: black;
}
.radialnav {
  position: fixed;
  bottom: 6%;
  right: 0;
  left: 0;
  display: block;
  width: 26em;
  height: 26em;
  font: 500 14px/14px arial normal;
}
.radialnav .ellipsis {
  position: absolute;
  right: 40%;
  bottom: 0;
  z-index: 2;
  width: 60px;
  height: 60px;
  border-radius: 100%;
  background: #3db9bd;  /* fallback for old browsers */
  background: -webkit-linear-gradient(150deg, #dd4182, #3db9bd); 
  background: linear-gradient(150deg, #dd4182, #3db9bd); 
  color: white;
  text-align: center;
  box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.44);
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.ellipsis2, .ellipsis3, .ellipsis4 {
  position: absolute;
  right: 40%;
  bottom: 0;
  z-index: 1;
  width: 60px;
  height: 60px;
  border-radius: 100%;
  background: #3db9bd;  /* fallback for old browsers */
  background: -webkit-linear-gradient(150deg, #dd4182, #3db9bd); 
  background: linear-gradient(150deg, #dd4182, #3db9bd); 
  color: white;
  text-align: center;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.radialnav .ellipsis i {
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -7px 0 0 -7px;
}
.radialnav .ellipsis:active, .radialnav .ellipsis:hover {
  background: -webkit-linear-gradient(150deg, #dd4182, #3db9bd); 
  background: linear-gradient(150deg, #dd4182, #3db9bd);
}
.radialnav a {
  color: white;
  text-decoration: none;
}
.radialnav.active .ellipsis {
  background: -webkit-linear-gradient(150deg, #dd4182, #3db9bd); 
  background: linear-gradient(150deg, #dd4182, #3db9bd);
}

.radialnav.active .ellipsis2 {
  transform: scale(1.5);
  opacity: 0.5;
}

.radialnav.active .ellipsis3 {
  transform: scale(1.9);
  opacity: 0.3;
}

.radialnav.active .menu {
  pointer-events: auto;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}

.menu {
  position: absolute;
  padding:0;
  top: 50%;
  right: 8%;
  z-index: 0;
  width: 300px;
  height: 300px;
  -webkit-transform: scale(0.1);
  -ms-transform: scale(0.1);
  -moz-transform: scale(0.1);
  transform: scale(0.1);
  pointer-events: none;
  -webkit-transition: all .15s ease;
  -moz-transition: all .15s ease;
  transition: all .15s ease;
  -moz-box-sizing: content-box;
  -webkit-box-sizing: content-box;
  box-sizing: content-box;
}
.menu > li:nth-of-type(1) {
  -moz-transform: rotate(0deg) skew(50deg);
  -ms-transform: rotate(0deg) skew(50deg);
  -webkit-transform: rotate(0deg) skew(50deg);
  transform: rotate(0deg) skew(50deg);
}
.menu > li:nth-of-type(2) {
  -moz-transform: rotate(35deg) skew(50deg);
  -ms-transform: rotate(35deg) skew(50deg);
  -webkit-transform: rotate(35deg) skew(50deg);
  transform: rotate(35deg) skew(50deg);
}

.menu > li:nth-of-type(3) {
  -moz-transform: rotate(70deg) skew(50deg);
  -ms-transform: rotate(70deg) skew(50deg);
  -webkit-transform: rotate(70deg) skew(50deg);
  transform: rotate(70deg) skew(50deg);
}
.menu > li:nth-of-type(4)  {
  -moz-transform: rotate(105deg) skew(50deg);
  -ms-transform: rotate(105deg) skew(50deg);
  -webkit-transform: rotate(105deg) skew(50deg);
  transform: rotate(105deg) skew(50deg);
}

.menu > li:nth-of-type(5) {
  -moz-transform: rotate(140deg) skew(50deg);
  -ms-transform: rotate(140deg) skew(50deg);
  -webkit-transform: rotate(140deg) skew(50deg);
  transform: rotate(140deg) skew(50deg);
}
.menu > li {
  position: absolute;
  bottom: 50%;
  right: 50%;
  font-size: 1.5em;
  width: 9em;
  height: 7.8em;
  -webkit-transform-origin: 100% 100%;
  -moz-transform-origin: 100% 100%;
  -ms-transform-origin: 100% 100%;
  transform-origin: 100% 100%;
  overflow: hidden;
  margin-top: -1.3em;
  margin-left: -10em;
  -webkit-transition: all .3s ease;
  -moz-transition: all .3s ease;
  transition: all 0.3s ease;
}
.menu > li a {
  position: absolute;
  bottom: -7.25em;
  right: -7.25em;
  display: block;
  height: 14.5em;
  width: 14.5em;
  border-radius: 50%;
  text-decoration: none;
  color: #fff;
  padding-top: 0em;
  text-align: center;
  font-size: 1.18em;
  -webkit-transform: skew(-50deg) rotate(-70deg) scale(1);
  -ms-transform: skew(-50deg) rotate(-70deg) scale(1);
  -moz-transform: skew(-50deg) rotate(-70deg) scale(1);
  transform: skew(-50deg) rotate(-70deg) scale(1);
  -webkit-backface-visibility: hidden;
  -webkit-transition: opacity 0.3s, color 0.3s;
  -moz-transition: opacity 0.3s, color 0.3s;
  transition: opacity 0.3s, color 0.3s;
  background-color: black;
   border-top: 1px solid silver;
}
.a1:hover {

}
.menu > li a i {
  padding: 40px 15px 0 0;
}
.i-1 {transform: rotate(70deg);
  margin-top: 30px;
  margin-left: 30px;
  font-size: 40px !important;
}
.i-2 {
  font-size: 30px !important;
 }
 .i-3 {
  transform: rotate(-70deg);
  margin-top: 20px;
  margin-right: 20px;
  font-size: 30px !important;
 }

.menu > li a:active, .menu > li a:hover {
  background-color: none;
}
</style>

</head>

<body>
<nav class="radialnav">
  <a href="#" class="ellipsis"><i class="fa fa-bars"></i></a>
  <a href="#" class="ellipsis2"></a>
  <a href="#" class="ellipsis3"></a>
  <a href="#" class="ellipsis4"></a>
  <ul class="menu" style="position: absolute;">
    <li data-submenu="home">
      <a href="#" class="a1"><i style="color:orange;" class="fa fa-home i-1"></i></a>
    </li>
    <li><a></a></li>
    <li>
      <a href="#"><i style="color:aqua;" class="fa fa-desktop i-2"></i></a>
    </li>
    <li><a></a></li>
    <li>
      <a href="#" class="a2"><i style="color:magenta;" class="fa fa-envelope i-3"></i></a>
    </li>
  </ul>
</nav>
<!-- <script src="<?=$this->theme->baseUrl?>/js/jquery-latest.min.js"></script> -->
<script>
// var thisButton,
//     thisMenuItem,
//     thisSubmenuItem,
//     pieMenu = $('.radialnav'),
//     menuItems  = $('.menu li'),
//     submenuItems = $('.submenu'),
//     submenuId = '';

function openMenu (thisButton) {
  if(!thisButton.hasClass('active')){
    thisButton.addClass('active');$('.menu').show();
  }else{
    $('.menu').hide();
    $('.radialnav, .submenu').removeClass('active');
  }
}

$('.ellipsis').click(function (event) {
  event.preventDefault();
  openMenu($('.radialnav'));
});

</script>

</body>
</html>