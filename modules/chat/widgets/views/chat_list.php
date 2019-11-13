<?php
foreach ($list as $key => $val) {
    echo '<div class="chat-content text-size-very-large"><b>' . $val['name'] . '</b>: ' . $val['message'] . '</div><br />';
}
?>