<?php
/* @var $this yii\web\View */
?>
<h1>chat-room/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<div id="result">

</div>
<script>
    if (typeof (EventSource) !== 'undefined') {
        var source = new EventSource("http://localhost:9999/chat-room/push");
        source.onopen = function (event) {
            console.log('onopen', event);
        };

        source.onerror = function (event) {
            console.log('onerror', event);
        };

        // source.onmessage = function(event) {
        // 	document.getElementById("result").innerHTML += event.data + "<br />";
        // };
        var link = document.querySelector("link[rel*='icon']") || document.createElement('link');
        link.type = 'image/x-icon';
        link.rel = 'shortcut icon';
        link.href = 'http://www.stackoverflow.com/favicon.ico';
        document.getElementsByTagName('head')[0].appendChild(link);
        source.addEventListener('new-msgs', function (event) {
            data = '';
            $.each(event.data.newMsgs, function(key, val) {
                data += key;
//                data += val.id + ' - ' + val.full_name + ' - ' + val.status + '<br />';
            });
            document.getElementById("result").innerHTML += data;
        });
    } else {
        document.getElementById("result").innerHTML = 'Sorry, your browser does not support server-sent events...';
    }
</script>