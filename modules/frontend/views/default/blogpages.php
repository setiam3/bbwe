<?php 
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\Html;

$imgprofile=(!empty($post->member->photo))?$post->member->photo:$this->theme->baseUrl.'/images/icon-profile.png';
?>
<p class="lead mb-3">Top Viewed <i class="fas fa-crown"></i></p>
	<section class="row mb-3">
		<div class="col-md-7 mb-2">
			
			<?php $i=0; foreach ($posts as $post) {
				?>
			<div class="cover-pict">
				<img class="img-fluid" src="<?=$post->cover_picture?>">
			</div>
			
			<?php 
			if(++$i>=1) break;
		} ?>
		</div>
		<div class="author col-md-5">
			<div class="row m-2">
				<div class="col-md-3 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-9">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			<div class="contentbody">
			<?php echo substr(strip_tags($post->description),0,350).' ... <a href="#" class="text-gradation">Read More</a>';?>
			</div>
		</div>

	</section>
	<div class="row">
		<form class="center" method="get" style="width: 40%;">
        <div class="form-group">
          <label class="sr-only" for="inlineFormInputGroup">Type One Keyword</label>
            <div class="input-group mb-2 gradation-bg rounded-pill">
              <i class="fa fa-search m-2"></i>
              <input type="text" id="search" maxlength="255" style="color: white;" class="form-control gradation-bg rounded-pill" id="inlineFormInputGroup" placeholder="Type One Keyword">
            </div>
        </div>
      </form>
			<ul class="list-inline p-1">
				<?php 
				foreach ($posts as $post) {
					
					echo '<li class="list-item gradation-border rounded-lg listslider mb-3">
					<div class="content-slider rounded">
						<div class="row">
						<div class="col-md-4">
							<a href="" ><img style="height:100%;" src="'.$post->cover_picture.'" class="img-fluid rounded"></a>
						</div>
						<div class="col-md-8">
							<h5 class="posttitle pink"><a href="#" class="pink">'.$post->title.'</a></h5>
							<div class="row">
								<div class="col-4">
									<a href="#" ><img src="'.$imgprofile.'" class="img-fluid"></a>
								</div>
								<div class="col-8">
									<a href="#">'.$post->member->name.'</a><br>
									<span>'.$post->getAgoTime($post->datetime).'</span>
								</div>
							</div>
						</div>
						</div>
					</div>
					</li>';
				}
				?>
			</ul>
		</div>
	<div class="row mb-3">
			<div class="p-2 pl-5 ml-n6 gradation-bg rounded-right"><img src="<?=$this->theme->baseUrl?>/images/icon-posteditor.png" class="img-fluid"> New Blogs</div>
	</div>
	<section class="row mb-3">
		<div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div><div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div><div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div>
		<div class="leftarrow d-none d-md-block d-lg-block">
	<i class="fas fa-chevron-right rounded-circle p-2" style="background: aqua;"></i></div>
	</section>
	<div class="row mb-3">
			<div class="p-2 pl-5 ml-n6 gradation-bg rounded-right"><img src="<?=$this->theme->baseUrl?>/images/icon-posteditor.png" class="img-fluid"> Best Author this week</div>
	</div>
	<section class="row mt-4 mb-3">
		<div class="col-md-3 ">
			<div class="card text-center borderbg">
            <div class="card-img">
              <div class="flagcon"><img src="https://www.countryflags.io/gb/flat/24.png" class="profile-pic"></div>
              <img class="profile-pic img-fluid" src="<?=$this->theme->baseUrl?>/images/avatars.jpg" alt="Card image cap">
            </div>
          <div class="card-body">
          <h6 class="card-title">
            Name : Jasmine <br>
            Profession : Artist
          </h6>
          <div class="">
            <ul class="list-inline">
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-tech-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-contact-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-hire-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-blog-icon.png"></a></li>
            </ul>
            
          </div>
          </div>
        </div>
		</div><div class="col-md-3 ">
			<div class="card text-center border">
            <div class="card-img">
              <div class="flagcon"><img src="https://www.countryflags.io/gb/flat/24.png" class="profile-pic"></div>
              <img class="profile-pic img-fluid" src="<?=$this->theme->baseUrl?>/images/avatars.jpg" alt="Card image cap">
            </div>
          <div class="card-body">
          <h6 class="card-title">
            Name : Jasmine <br>
            Profession : Artist
          </h6>
          <div class="">
            <ul class="list-inline">
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-tech-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-contact-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-hire-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-blog-icon.png"></a></li>
            </ul>
            
          </div>
          </div>
        </div>
		</div><div class="col-md-3 ">
			<div class="card text-center border">
            <div class="card-img">
              <div class="flagcon"><img src="https://www.countryflags.io/gb/flat/24.png" class="profile-pic"></div>
              <img class="profile-pic img-fluid" src="<?=$this->theme->baseUrl?>/images/avatars.jpg" alt="Card image cap">
            </div>
          <div class="card-body">
          <h6 class="card-title">
            Name : Jasmine <br>
            Profession : Artist
          </h6>
          <div class="">
            <ul class="list-inline">
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-tech-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-contact-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-hire-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-blog-icon.png"></a></li>
            </ul>
            
          </div>
          </div>
        </div>
		</div><div class="col-md-3 ">
			<div class="card text-center border">
            <div class="card-img">
              <div class="flagcon"><img src="https://www.countryflags.io/gb/flat/24.png" class="profile-pic"></div>
              <img class="profile-pic img-fluid" src="<?=$this->theme->baseUrl?>/images/avatars.jpg" alt="Card image cap">
            </div>
          <div class="card-body">
          <h6 class="card-title">
            Name : Jasmine <br>
            Profession : Artist
          </h6>
          <div class="">
            <ul class="list-inline">
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-tech-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-contact-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-hire-icon.png"></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><img src="<?=$this->theme->baseUrl?>/images/directory-blog-icon.png"></a></li>
            </ul>
            
          </div>
          </div>
        </div>
		</div>
	</section>
<div class="row mb-3">
			<div class="p-2 pl-5 ml-n6 gradation-bg rounded-right"><img src="<?=$this->theme->baseUrl?>/images/icon-podcast-white.png" class="img-fluid"> Fresh Podcast</div>
	</div>
	<section class="row mb-3">
		<div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div><div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div><div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div>
		<div class="leftarrow d-none d-md-block d-lg-block">
	<i class="fas fa-chevron-right rounded-circle p-2" style="background: aqua;"></i></div>
	</section>
	<div class="row mb-3">
			<div class="p-2 pl-5 ml-n6 gradation-bg rounded-right"><img src="<?=$this->theme->baseUrl?>/images/icon-video.png" class="img-fluid"> Fresh Videos</div>
	</div>
	<section class="row mb-3">
		<div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div><div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div><div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div>
	</section>
	<div class="row mb-3">
			<div class="p-2 pl-5 ml-n6 gradation-bg rounded-right"><img src="<?=$this->theme->baseUrl?>/images/icon-video.png" class="img-fluid"> Advertisement</div>
	</div>
	<section class="row mb-3">
		<div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div><div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div><div class="col-md-4">
		<div class="gradation-border rounded-lg listslider">
		<div class="content-slider rounded">
			<img src="<?=$this->theme->baseUrl?>/uploads/balekambang.jpg" class="img-fluid rounded mb-1">
			<div class="row m-2">
				<div class="col-md-4 p-0">
					<a href="#" ><img src="<?=$imgprofile?>" class="img-fluid"></a>
				</div>
				<div class="col-md-8">
					<a href="#">Jasmine Statham</a><br>
					<span>2 hours ago</span>
				</div>
			</div>
			</div>
		</div>
		</div>
	</section>
<div class="clearfix mb-5"></div>