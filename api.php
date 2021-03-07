<?php
$req = curl_init();
$base_url = "https://accsmart.panasonic.com";
$default_headers = array('Content-Type: application/json', 'X-APP-VERSION: 2.0.0', 'Accept: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
    if ($_GET['action'] == 'login') {
        curl_setopt($req, CURLOPT_URL, $base_url . "/auth/login/");
        $json = json_encode(array("loginId" => $_POST['username'], "language" => "0", "password" => $_POST['password']));
    }

    // Default POST Options for POST requests
    curl_setopt($req, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($req, CURLOPT_POSTFIELDS, $json);
    curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    curl_setopt($req, CURLOPT_URL, $base_url + "");
}

curl_setopt($req, CURLOPT_HTTPHEADER, $default_headers);
echo curl_exec($req);

curl_close($req);
