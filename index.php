<?php
    include("assets/system/header.html");
?>

<div id="reg-form">
    <form>
        <input id="reg-full-name" type="text" placeholder="Full Name" maxlength="150" autofocus>
        <input id="reg-university" type="text" onkeyup="retrieveDataOne();" placeholder="University" maxlength="150">
        <input id="reg-college" type="text" onkeyup="retrieveDataTwo();" placeholder="College" maxlength="150">
        <input type="button" id="reg-submit" value="Count Me In!">
    </form>
</div>
<div id="side-bar">
    <div id="universities">Universities:</div>
    <img id="one" class="logos" src="assets/img/adamson.png" title="Adamson University">
    <img id="two" class="logos" src="assets/img/arellano.png" title="Arellano University">
    <img id="three" class="logos" src="assets/img/ceu.png" title="Centro Escolar University">
    <img id="four" class="logos" src="assets/img/feu.png" title="Far Eastern University">
    <img id="five" class="logos" src="assets/img/mlqu.gif" title="Manuel L. Quezon University">
    <img id="six" class="logos" src="assets/img/ntc.png" title="National Teachers College">
    <img id="seven" class="logos" src="assets/img/NU.png" title="National University">
    <img id="eight" class="logos" src="assets/img/ue.png" title="University of the East">
    <img id="nine" class="logos" src="assets/img/ust.png" title="University of Santo Tomas">
</div>
<div id="help">
    <strong id="big">Welcome Guests!</strong><br><br>
    Would you mind giving us some information about yourself? Please register using the form below.
</div>
<div id="overlay"></div>
<div id="overlay-items"></div>

<?php
    include("assets/system/footer.html");
?>