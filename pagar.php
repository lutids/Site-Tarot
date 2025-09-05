<?php
require __DIR__ . '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken("SUA_ACCESS_TOKEN_AQUI");

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->title = "Consulta de Tarot";
$item->quantity = 1;
$item->unit_price = 50.00;

$preference->items = array($item);
$preference->back_urls = array(
    "success" => "http://localhost/sucesso.html",
    "failure" => "http://localhost/erro.html",
    "pending" => "http://localhost/pendente.html"
);
$preference->auto_return = "approved";
$preference->save();

header('Content-Type: application/json');
echo json_encode([ "preference_id" => $preference->id ]);
