<style type="text/css">
    body ,.list-group-item{
        background-color: black;
        color:white;
    }
    .list-group-item.active{
        background:#3c3c3c;
        border: none;
    }
    .sidebar{
        width: 300px;
    }
    .badge{
        position: absolute;
        right: 10px;
    }
    .chat{
        flex: 1;max-width: calc(100vw - 300px);height: 100vh;overflow: hidden;
    }
    .side {
  padding: 0;
  margin: 0;
  height: 100%;
}
    .side-one {
  padding: 0;
  margin: 0;
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  display: block;
  top: 0;
}

.side-two {
  padding: 0;
  margin: 0;
  height: 100%;
  width: 100%;
  z-index: 2;
  position: relative;
  top: -100%;
  left: -100%;
  -webkit-transition: left 0.3s ease;
  transition: left 0.3s ease;

}
</style>

<div class="container" id="chat-realtime">
    <div class="row app-one">
        <div class="col-sm-8 conversation">
                <div class="row heading">
                    <div class="col-sm-1 col-xs-1 user-back">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-1 col-md-1 col-xs-3 heading-avatar">
                        <div class="heading-avatar-icon">
                            <img class="you" src="<?=Yii::$app->homeUrl?>images/public.jpg">
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-4 heading-name">
                        <p id="heading-name-meta">John Doe</p>
                        <span id="heading-online">Online</span>
                    </div>
                    <div class="col-sm-1 col-xs-2 user-fork pull-right">
                        <!-- <a href="https://github.com/bachors/Chat-Realtime" title="Fork me on github" target="_BLANK"><i class="fa fa-code-fork fa-2x" aria-hidden="true"></i></a> -->
                    </div>
                </div>
                <div class="row message" id="conversation">
                    <p class="messages">
                        <!-- message -->
                    </p>
                    <div class="row message-previous">
                        <div class="col-sm-12 previous">
                            <a>
                            Show Previous Message!
                            </a>
                        </div>
                    </div>
                    <div class="message-scroll">
                        <div id="scroll">
                            <a>
                            <i class="fa fa-chevron-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row imagetmp">
                        <div id="reviewImg"></div>
                </div>
                <div class="row reply">
                    <div class="col-sm-1 col-xs-1 reply-recording" align="center">
                        <label class="btn btn-default fileinput">
                        <i class="fa fa-camera fa-2x" aria-hidden="true"></i> <input type="file" id="fileinput" multiple style="display: none;">
                        </label>    
                    </div>
                    <div class="col-sm-10 col-xs-8 reply-main">
                        <textarea class="form-control" data-emojiable="true" rows="1" id="comment"></textarea>
                    </div>

                    <div class="col-sm-1 col-xs-1 reply-send" id="send">
                        <i class="fa fa-send fa-2x pull-right" aria-hidden="true"></i>
                    </div>
                </div>
        </div>
        <div class="col-sm-4 side">
            <div class="side-one">
                <div class="row heading">
                    <div class="col-sm-2 col-xs-2 heading-avatar">
                        <div class="heading-avatar-icon">
                            <img class="me" src="<?=Yii::$app->homeUrl?>images/icon-profile.svg">
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-2  heading-logout  pull-right">
                        <i class="fa fa-sign-out fa-2x  pull-right" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
                        <i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-2 col-xs-2 heading-home  pull-right" data-tipe="rooms" data-avatar="<?=Yii::$app->homeUrl?>images/public.jpg" id="Public">
                        <span class="inbox-status">0</span>
                        <i class="fa fa-home fa-2x  pull-right" aria-hidden="true"></i>
                    </div>
                </div>
                
                <div class="row searchBox">
                    <div class="col-sm-12 searchBox-inner">
                        <div class="form-group has-feedback">
                            <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="row sideBar">
                    <!-- side1 -->
                </div>
            </div>
            <div class="side-two">
                <div class="row newMessage-heading">
                    <div class="row newMessage-main">
                        <div class="col-sm-2 col-xs-2 newMessage-back">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-10 col-xs-10 newMessage-title">
                            New Chat
                        </div>
                    </div>
                </div>
                <div class="row composeBox">
                    <div class="col-sm-12 composeBox-inner">
                        <div class="form-group has-feedback">
                            <input id="composeText" type="text" class="form-control" name="searchText" placeholder="Search People">
                        </div>
                    </div>
                </div>
                <div class="row compose-sideBar">
                    <!-- side2 -->
                </div>
            </div>
        </div>
            
    </div>
</div>

<!-- <div class="layout">
    <div class="sidebar">
        <div class="container">
            <header><img src="images/logo.png" width="300px"></header>
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="search" style="background-color: black;color: white">
                    <div class="input-group-append"><i class="fas fa-search"></i></div>
                </div>
            </form>
            <div><button>+</button></div>
            <ul class="list-group">
                <li class="list-group-item active">groupname <span class="badge badge-light">9</span></li>
                <li class="list-group-item">groupname</li>
            </ul>
        </div>
    </div>
    <div class="chat">
        <div class="heading">
            <div class="col-1">avatar</div>
            <div class="col">namegroup</div>
        </div>
        <div class="message-area"></div>
        <div class="compose">
            <form>
                <input type="text" name="compose">
            </form>
        </div>
    </div>
    <div class="sidebar"></div>
</div> -->
<script type="text/javascript">
    document.getElementsByClassName("heading-compose")[0].addEventListener("click", () => {
    document.getElementsByClassName('side-two')[0].style.left = "0";
});

document.getElementsByClassName("newMessage-back")[0].addEventListener("click", () => {
    document.getElementsByClassName('side-two')[0].style.left = "-100%";
});

document.getElementsByClassName("user-back")[0].addEventListener("click", () => {
    document.getElementsByClassName('side')[0].style.display = "block";
});
</script>