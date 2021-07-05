<?php

include('simple_html_dom.php');

$html = file_get_html('https://www.newegg.com/p/pl?d=3080+ti&N=100007709%20600030348');

// echo $html->find('title', 0)->plaintext;

$item_list = $html->find('div[class="item-cell"]');
$image = $html->find('div[class="item-container"]');
$title = $html->find('a[class="item-title"]');
$price = $html->find('li[class="price-current"]');
$stock = $html->find('p[class="item-promo"]');
foreach ($item_list as $item) {
    $info = $item->find('div[class="item-info"]');

    $image = $item->find('a[class="item-img"]');
    $title = $item->find('a[class="item-title"]')[0];
    $price = $item->find('li[class="price-current"]')[0];
    $stock = $item->find('p[class="item-promo"]');

    if(!isset($stock[0])) {
        $stock[0] = '';
    }

    echo($image[0]."<br>".$title->plaintext."<br>".$price->plaintext."<br>".$stock[0]."<br>");

}

echo(count($stock));
?>