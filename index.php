<?php
require( "config.php" );

// simple limiter ?show=5
$show = 10;
if( isset( $_GET['show']) ) $show = intval( $_GET['show'] );
if( $show < 1 ) $show = 1;
if( $show > 10 ) $show = 10;

if( defined( "SERVER_FETCH") ) {
    $url = str_replace("callback=?", "callback=raw_json", DATA_URL);
    $data = file_get_contents($url);
    $data = json_decode($data);
}

function image($filename) {
    if( defined( "INLINE_IMAGES" ) ) {
        $img = base64_encode( file_get_contents($filename) );
        printf(
            "data: image/png;base64,%s", $img
        );

    } else {
        echo $filename;
    }
}

?>
<!doctype html>
<html>
<head>
    <title>Olympic Medal Tracker</title>
    <meta charset="utf-8" />
<?php if( !defined( "SERVER_FETCH" ) ) { ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<?php } ?>
<style>
body, html {
    width: 100%; height: 100%;
    overflow: hidden;
    padding:0; margin:0;
    font-size: 14px;
    font-family: Arial;
}
table {
    border-collapse: collapse;
    width:100%;
    height:100%;
}

td.country_symbol {
    font-size: 0.75em;
}
thead td.count { text-align: right; width: 15% }
tbody td.count {
    text-align: right;
    padding-right: 1em;
    font-weight: bold;
    font-size: 1.25em;
}
td.flag { text-align: center }
img { width: 100%; max-width: 48px; }

tr.odd {
    background-color: #DDDDDD
}

/* mousey */

tbody tr { transition: background-color 0.5s ease; }
tbody tr img {  }

tbody tr:hover {
    background-color: #FFDC00;
}

tbody tr:hover * {

}

@media all and (max-height: 450px) {
    img { transform: scale(0.75) }
}

@media all and (min-width: 600px) {
    table { max-width: 600px; margin: auto }

}

</style>
</head>
<body>

<table border="0">
    <thead>
        <tr>
            <td class="flag"></td>
            <td class="country_symbol"></td>
            <td class="count"><img src="<?php image("gold.png"); ?>" /></td>
            <td class="count"><img src="<?php image("silver.png") ?>" /></td>
            <td class="count"><img src="<?php image("bronze.png") ?>" /></td>
        </tr>
    </thead>
    <tbody id="data">
<?php if( defined( "SERVER_FETCH" ) ) { ?>
<?php foreach( $data as $k => $row ) { ?>
<?php if( $k >= $show ) break; ?>
        <tr class="<?php echo ($k % 2) ? "even" : "odd"; ?>">
            <td class="flag"><img src="<?php echo $row->flag_url ?>" /></td>
            <td class="country_symbol"><?php echo $row->country_symbol ?></td>
            <td class="count"><?php echo $row->gold ?></td>
            <td class="count"><?php echo $row->silver ?></td>
            <td class="count"><?php echo $row->bronze ?></td>
        </tr>
<?php } ?>
<?php } ?>
    </tbody>
</table>

<?php if( !defined( "SERVER_FETCH" ) ) { ?>

<script>
$.getJSON( <?php echo json_encode(DATA_URL) ?>, { }, function(data) {

    function t(c, cl) {
        if( typeof cl === "undefined" ) {
            cl = "";
        }
        return(
            "<td class='" + cl + "'>" + c + "</td>"
        );
    }

    for( var i = 0; i < data.length; i++ ) {
        $("#data").append(
            "<tr class='" + (i%2 ? "even" : "odd")+ "'>" +
            t("<img src='" + data[i].flag_url + "' />", "flag") +
            t(data[i].country_symbol, "country_symbol") +
            t(data[i].gold, "count") +
            t(data[i].silver, "count") +
            t(data[i].bronze, "count") +
            "</tr>"
        );
    }
});
</script>

<?php } ?>

</body>
</html>
