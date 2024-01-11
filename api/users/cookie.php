<?php

function setSessionCookieParams() {
    session_set_cookie_params(3600, '/', '', true, true);
    session_name('super_troopers');
}

?>
