<form method="POST">
    <input name="name">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <div class="g-recaptcha" data-sitekey="6LeuoyETAAAAABocBU6xUaMa0HuAIuSNceK_UjM7"></div>
    <input type="submit" value="Send">
</form>

<?php
function verifyCaptcha($response)
{
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=6LeuoyETAAAAAGnX-ZZjPLQql4s17WVVP_z8ZdzC&response='.$response;
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1');
    $result = curl_exec($ch);
    $json = json_decode($result);
    return $json['success'];
}
if($_SERVER['REQUEST_METHOD'] == "POST") {
    verifyCaptcha($_POST['g-recaptcha-response']);
}
?>