<style type="text/css">
	
#box {
    position: relative;
    -ms-touch-action: none;
    touch-action: none;
}
.ovale{
	width: 77%;
	height: 39%;
	z-index: 1;
	position: absolute;
	border-radius: 50%;
	top: 10%;
	left: 10%;
	opacity: 0.6;
	right: 25%;
	margin: 0 auto;

	background: rgba(255,255,255,0);
	background: -moz-linear-gradient(35deg, rgba(255,255,255,0) 30%, rgba(255,255,255,1) 100%);
	background: -webkit-gradient(35deg, right top, color-stop(30%, rgba(255,255,255,0)), color-stop(100%, rgba(255,255,255,1)));
	background: -webkit-linear-gradient(35deg, rgba(255,255,255,0) 30%, rgba(255,255,255,1) 100%);
	background: -o-linear-gradient(35deg, rgba(255,255,255,0) 30%, rgba(255,255,255,1) 100%);
	background: -ms-linear-gradient(35deg, rgba(255,255,255,0) 30%, rgba(255,255,255,1) 100%);
	background: linear-gradient(35deg, rgba(255,255,255,0) 30%, rgba(255,255,255,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff', GradientType=1 );

}
.layer2{
	width: 100%;
    height: 100%;
    border: 3px solid transparent;
    position: absolute;
	
	z-index: 100;
	-webkit-box-shadow: inset -5px 2px 70px -8px rgba(0,0,0,0.3);
	-moz-box-shadow: inset -5px 2px 70px -8px rgba(0,0,0,0.3);
	box-shadow: inset -5px 2px 70px -8px rgba(0,0,0,0.3);
}
.circleBase{
	border-radius: 50%;
    behavior: url(PIE.htc);
}
.shadowboard, .clipboard {
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    
    background-size: cover;
    background-position: center center;
}

</style>
	<div id="box" class="" style="width: 40px; height: 40px;margin:6px;">
		<div class="shadowboard" style="opacity: 0;background-image: url(../images/flag/guf.svg);"></div>
		<div class="clipboard" style="-webkit-clip-path: circle(50% at 50% 50%);clip-path: circle(50% at 50% 50%);background-image: url(../images/flag/guf.svg); <?=$code?>">
			
			<div class="circleBase layer2">
				<div class="ovale"></div>
			</div>
		</div>
	</div>