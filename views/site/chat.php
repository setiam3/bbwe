<?php 
use yii\helpers\Url;
$absoluteHomeUrl = Url::home(true);
$apis = Url::home(true).'chat/index';
$script=<<< JS
var domain="$absoluteHomeUrl";
var imageDir="assets";
var dbRef = new Firebase("https://bbwe-2736d.firebaseio.com/");
const messageRef = dbRef.child('message');
const userRef = dbRef.child('user');
var apis="$apis";
function ajax(method, send, callback) {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            callback(this.responseText);
        }
    };
    xmlhttp.open(method, apis, true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    if (send) {
        xmlhttp.send(send);
    } else {
        xmlhttp.send();
    }
}
ajax("POST", "data=cek", res => {
    const a = JSON.parse(res);
    if (a.status == 'success') {
        const x = new Date();
        const b = x.getDate();
        const c = (x.getMonth() + 1);
        const d = x.getFullYear();
        const e = x.getHours();
        const f = x.getMinutes();
        const g = x.getSeconds();
        const date = d+'-'+((c<10)?'0'+c:c)+'-'+b+' '+e+':'+f+':'+g;
        $('.user-avatar >img').attr('src',a.avatar);
        const h = {
            name: a.user,
            nameidmember: a.nameidmember,
            avatar: a.avatar,
            id: a.id,
            login: date,
            tipe: 'login'
        };
        userRef.push(h);
        
        chat_realtime(userRef, messageRef, apis, a.user, a.avatar, imageDir, domain);
    } else {
        //document.getElementsByClassName('app-one')[0].style.display = "none";
    }
});
var chat_realtime = (j, k, l, m, n, imageDir, domain) => {
    let allUser;
    let chatUser;
    let messages = [];
    let no = 0;
    const limit = 10;
    let uKe = 'Public';
    let uTipe = 'rooms';
    let tampungImg = [];
    let inbox = 0;
    if (inbox == 0) {
        $(".inbox-status").hide();
    }
    userMysql(({all, chat}) => {
        allUser = all;
        chatUser = chat;
        allUser.forEach(a => {
            if (a.name != m) {
                //sideTwoHTML(a);
            }
        });
        if (chatUser.length > 0) {
            chatUser.forEach(a => {
                //sideOneHTML(a);
            });
        }
        chatMysql('rooms', 'Public', a => {
            messages = a;
            no = 0;
            //document.getElementsByClassName('messages')[0].innerHTML = "";
            if (messages.length <= limit) {
                $('#message-previous').hide();
            } else {
                $('#message-previous').show();
            }
            let opsid = 0;
            messages.forEach(a => {
                if (opsid < limit) {
                    //messageHTML(messages[no]);
                    no++;
                }
                opsid++;
            });
            
            //scrollBottom();
        });
    });

    j.on("child_added", a => {//insert users
        if (a.val().tipe == 'login') {
          alert(a);
          console.log(a);
            if (a.val().name != m) {
                if ($($('#a.val().name')).length) {
                    $('#a.val().name .contact-status').removeClass('off');
                    
                } else {
                    const newUser = {
                        status: "online",
                        name: a.val().name,
                        nameidmember: a.val().nameidmember,
                        login: a.val().login,
                        avatar: a.val().avatar
                    };
                    allUser.push(newUser);
                    //sideTwoHTML(newUser);
                }
            }
        } else {
            
        }
        j.child(a.key).remove()
    });

    

    function userMysql(callback) {
        $.ajax({
            url: l,
            type: "post",
            data: 'data=user',
            crossDomain: true,
            dataType: 'json',
            success(a) {
                callback(a);
            }
        })
    }

    function chatMysql(e, f, callback) {
        $.ajax({
            url: l,
            type: "post",
            data: {
                data: 'message',
                ke: f,
                tipe: e
            },
            crossDomain: true,
            dataType: 'json',
            success(a) {
                callback(a);
            }
        })
    }

    
    function getname(name) {
      var data=$.ajax({
            url: l,
            type: "post",
            data: {
                data: 'getname',
                name: name,
            },
            async: false,
            crossDomain: true,
            dataType: 'json',
            success:function(name) {
              data=name;
            }
        });
      return data.responseJSON;
    }

    
    function htmlEntities(a) {
        return String(a).replace(/</g, '&lt;').replace(/>/g, '&gt;')
    }

    function urltag(d, e) {
        const f = {
            yutub: {
                regex: /(^|)(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*)(\s+|$)/ig,
                template: "<iframe class='yutub' src='//www.youtube.com/embed/$3' frameborder='0' allowfullscreen></iframe>"
            },
            link: {
                regex: /((^|)(https|http|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig,
                template: "<a href='$1' target='_BLANK'>$1</a>"
            },
            email: {
                regex: /([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9._-]+)/gi,
                template: '<a href=\"mailto:$1\">$1</a>'
            }
        };
        const g = $.extend(f, e);
        $.each(g, (a, {regex, template}) => {
            d = d.replace(regex, template)
        });
        return d
    }
    // upload images
    function convertDataURIToBinary(dataURI) {
        const BASE64_MARKER = ';base64,';
        const base64Index = dataURI.indexOf(BASE64_MARKER) + BASE64_MARKER.length;
        const base64 = dataURI.substring(base64Index);
        const raw = window.atob(base64);
        const rawLength = raw.length;
        const array = new Uint8Array(new ArrayBuffer(rawLength));
        for (i = 0; i < rawLength; i++) {
            array[i] = raw.charCodeAt(i);
        }
        return array;
    }


    

    function scrollTop() {
        setTimeout(() => {
            const cc = $('#conversation');
            cc.animate({
                scrollTop: 0
            }, 500);
        }, 1000);
    }

    function timeToWords(
        time,
        lang = {
            postfixes: {
                '<': '',
                '>': ''
            },
            1000: {
                singular: 'just now',
                plural: '# seconds'
            },
            60000: {
                singular: '1 minute',
                plural: '# minutes'
            },
            3600000: {
                singular: '1 hour',
                plural: '# hours'
            },
            86400000: {
                singular: 'a day',
                plural: '# days'
            },
            31540000000: {
                singular: 'a year',
                plural: '# years'
            }
        }
        ) {
            const timespans = [1000, 60000, 3600000, 86400000, 31540000000];
            const parsedTime = Date.parse(time);
            //const parsedTime = Date.parse(time.replace(/\-00:?00$/, ''));

            if (parsedTime && Date.now) {
                const timeAgo = parsedTime - Date.now();
                const diff = Math.abs(timeAgo);
                const postfix = lang.postfixes[(timeAgo < 0) ? '<' : '>'];
                let timespan = timespans[0];

                for (let i = 1; i < timespans.length; i++) {
                    if (diff > timespans[i]) {
                        timespan = timespans[i];
                    }
                }

                const n = Math.round(diff / timespan);

                return lang[timespan][n > 1 ? 'plural' : 'singular']
                    .replace('#', n) + postfix;
            }
    }

  

    function checkWidth() {
        const windowsize = $(window).width();
        if (windowsize > 700) {
            
            $(".user-back").hide();
            $(".sideBar-body").removeClass("user-body");
        } else if (windowsize <= 700) {
            $(".user-back").show();
            $(".sideBar-body").addClass("user-body");
        }
    }
    checkWidth();
    $(window).resize(checkWidth);

    

    $('body').on('keydown', '#searchText', () => {//pencarian last users
        setTimeout(() => {
            if (document.getElementById("searchText").value == "") {
                $("body .side-one .sideBar-body").show();
            } else {
                $("body .side-one .sideBar-body").hide();
                $("body .side-one .sideBar-body").each((i, a) => {
                    const key = $("body .side-one .sideBar-body").eq(i).attr('id');
                    const reg = new RegExp(document.getElementById("searchText").value, 'ig');
                    const res = key.match(reg);
                    if (res) {
                        $("body .side-one .sideBar-body").eq(i).show();
                    }
                });
            }
        }, 50);
    });

    $('body').on('keydown', '#composeText', () => {//pencarian di side bar2
        setTimeout(() => {
            if (document.getElementById("composeText").value == "") {
                $("body .side-two .sideBar-body").show();
            } else {
                $("body .side-two .sideBar-body").hide();
                $("body .side-two .sideBar-body").each((i, a) => {
                    const key = $("body .side-two .sideBar-body").eq(i).attr('id');
                    const reg = new RegExp(document.getElementById("composeText").value, 'ig');
                    const res = key.match(reg);
                    if (res) {
                        $("body .side-two .sideBar-body").eq(i).show();
                    }
                });
            }

        }, 50);
    });

    //document.getElementById('fileinput').addEventListener('change', readMultipleImg, false);
}
$('.messaging div:first').prepend('asd');
JS;
$this->registerJs($script
);
?>
<script src="https://cdn.firebase.com/js/client/2.2.3/firebase.js"></script>
<div class="row messaging ">
    <div class="col-sm-6" >
      <?php ?>
      <!-- <div class="media">
        <div class="col-md-3 user-avatar">
          <img src="<?=Yii::$app->homeUrl?>images/icon-profile.png" class="img-fluid profile-pic mt-0">
          <div class="user-active"></div>
        </div>
        <div class="media-body mt-3">
          <h4 class="mt-0">Helen Cho</h4>
          <small class="font-italic font-weight-lighter user-monitor">Active Now</small>
        </div>
        
        <div class="btn-group" role="group">
          <button id="btnGroupDrop1" type="button" class="border-0 bg-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?=Yii::$app->homeUrl?>images/icon-three-dots.png" class="img-fluid float-right mt-3">
          </button>
          <div class="dropdown-menu dropdown-menu-right gradation-bg" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item list-inline" href="#" ><i class="fa fa-user m-1"></i>
            Goto Profile Page</a>
            <a class="dropdown-item list-inline" href="#" data-toggle="modal" data-target="#user-block"><i class="fa fa-ban m-1"></i>Block</a>
          </div>
        </div>
      </div> -->
      <?php ?>

      <div class="message-area detaile">
        <div class="on-blank-message">
          <div class="text-gradation p-4 center h3">You haven’t talk to Anyone Say Hi !</div>
        </div>
        <div class="have-chat">
          
        </div>
      </div>
      
    </div>
    
    <div class="col-sm-6 center list-user-online">
      <div class="side-two">
      <h5>See Who is online</h5>
        <div class="row composeBox">
          <div class="col-sm-12 composeBox-inner">
            <div class="form-group has-feedback">
            <label class="sr-only" for="inlineFormInputGroup">Find people</label>
              <div class="input-group mb-2 gradation-bg rounded-pill">
                <i class="fa fa-search m-2"></i>
                <input id="composeText" type="text" name="searchText" class="form-control gradation-bg rounded-pill" id="inlineFormInputGroup" placeholder="Find people">
              </div>
          </div>
          </div>
        </div>
        <div class="row compose-sideBar">
          <!-- side2 -->
        </div>
      </div>

      <div class="detaile">
        <!-- <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="member" width="100%">
          <?php 
            //foreach ($member as $value) {
          ?>
          <tr>
            <td>
              <a href="message-block-unblock.html" class="row">
              <div class="col-sm-2 user-avatar">
                <img src="<?//=isset($value->photo)?Yii::$app->homeUrl.$value->photo:Yii::$app->homeUrl.'images/icon-profile.svg'?>" class="img-fluid profile-pic mt-0">
                <div class="user-inactive"></div>
              </div>
              <h5 class="mt-3" ><?//=$value->name?></h5>
            </a>
            </td>
          </tr>
          <?php //}?>
        </table> -->
        <!-- <ul class="list-down">
          <?php 
          	//foreach ($member as $value) {
          ?>
          <li class="pb-0">
            <a href="message-block-unblock.html" class="row">
              <div class="col-sm-2 user-avatar">
                <img src="<?//=isset($value->photo)?Yii::$app->homeUrl.$value->photo:Yii::$app->homeUrl.'images/icon-profile.svg'?>" class="img-fluid profile-pic mt-0">
                <div class="user-inactive"></div>
              </div>
              <h5 class="mt-3" ><?//=$value->name?></h5>
            </a>
          </li>
      	<?php //}?>
          
        </ul> -->
      </div>
    </div>
  </div>