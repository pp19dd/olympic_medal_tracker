<?php
require( "config.php" );
require( "flags.php" );

function localize($num) {
    global $numbers;
    if( $numbers === "english" ) return( $num );

    $t = ["۰","۱","۲","۳","۴","۵","۶","۷","۸","۹"];

    $r = "";
    for( $i = 0; $i < strlen($num); $i++ ) {
        $c = substr($num, $i, 1);
        $r .= $t[$c];
    }
    return( $r );
}

// parameter #1: simple limiter ex: "?show=5"
$show = 100;
if( isset( $_GET['show']) ) $show = intval( $_GET['show'] );
if( $show < 1 ) $show = 1;
if( $show > 100 ) $show = 100;

// parameter #2: direction ex: "?dir=rtl"
$dir = "ltr";
if( isset( $_GET['dir']) && $_GET['dir'] == "rtl" ) $dir = "rtl";

// parameter #3: numbers in farsi
$numbers = "english";
if( isset( $_GET['numbers']) && $_GET['numbers'] == "farsi" ) $numbers = "farsi";

if( defined( "SERVER_FETCH") ) {
    $url = str_replace("callback=?", "callback=raw_json", DATA_URL);
    $url .= "&ts=" . time();
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
    <meta name="robots" content="noindex" />
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

thead td.count { text-align: right;}
tbody td.count {
    text-align: right;
}
td.flag { text-align: center;  }

tr.odd {
    background-color: #DDDDDD
}

/* col widths */
table { width: 80%; margin: auto }
th { text-align: right }
td.count { width:15%; }
img { width: 100%; max-width: 48px; }
td.country_symbol { text-align: right }
.count_gold { font-weight: bold; }
.count_silver { color: #555; }
.count_bronze { color: #555; }

/* mousey */

tbody tr { transition: background-color 0.5s ease; }
tbody tr img { }
tbody tr:hover {
    opacity: 0.8;
    background-color: #FFDC00;
    box-shadow:0px 0px 3px #ffdc00;
    -webkit-box-shadow:0px 0px 3px #ffdc00;
}
.high {
    background-color: rgba(0,0,0,0.1);
}
tbody tr:hover * { }

/* alignment fix */
@media all and (max-width: 260px) { td.count { padding-right:6px; } }
@media all and (max-width: 400px) { td.count { padding-right:12px; } }
@media all and (max-width: 600px) { td.count { padding-right:15px; } }
@media all and (min-width: 600px) { td.count { padding-right:18px; } }

@media all and (min-width: 260px) { td.count { font-size:1.0em } }
@media all and (min-width: 400px) { td.count { font-size:1.33em } }
@media all and (min-width: 600px) { td.count { font-size:1.5em } }

td.country_symbol { font-size: 0.75em; }
@media all and (min-width: 350px) { td.country_symbol { font-size: 0.85em; } }
@media all and (min-width: 600px) { td.country_symbol { font-size: 0.95em; } }
@media all and (min-width: 700px) { td.country_symbol { font-size: 1em; } }

@media all and (max-height: 450px) {
    img { transform: scale(0.75) }
}

@media all and (min-width: 600px) {
    table { max-width: 600px; margin: auto }
}

<?php if( $numbers != "english" ) { ?>

td.count {
    font-size: 1.25em;
}

<?php } ?>
</style>
</head>
<body>

<table border="0" dir="<?php echo $dir ?>">
    <thead>
        <tr>
            <th class="country_symbol"></th>
            <th class="flag"></th>
            <th id="gold" class="count count_gold"><img src="http://www.voanews.com/MediaAssets2/projects/olympics-2016/gold.png" /></th>
            <th id="silver" class="count count_silver"><img src="http://www.voanews.com/MediaAssets2/projects/olympics-2016/silver.png" /></th>
            <th id="bronze" class="count count_bronze"><img src="http://www.voanews.com/MediaAssets2/projects/olympics-2016/bronze.png" /></th>
        </tr>
    </thead>
    <tbody id="data">
<?php if( defined( "SERVER_FETCH" ) ) { ?>
<?php
foreach( $data as $k => $row ) {
    $code = strtoupper(trim($row->country_symbol));
    if( $k >= $show ) break;
?>
        <tr class="<?php echo ($k % 2) ? "even" : "odd"; ?>">
            <td class="country_symbol"><?php echo $code ?></td>
<?php if( isset($flags[$code]) ) { ?>
            <td class="flag"><img src="http://www.voanews.com/MediaAssets2/projects/olympics-2016/flags/<?php echo $flags[$code] ?>" /></td>
<?php } else { ?>
            <td class="flag"></td>
<?php } ?>
            <td class="count count_gold"><?php echo localize(intval($row->gold)) ?></td>
            <td class="count count_silver"><?php echo localize(intval($row->silver)) ?></td>
            <td class="count count_bronze"><?php echo localize(intval($row->bronze)) ?></td>
        </tr>
<?php } ?>
<?php } # server fetch mode ?>
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
        if( i >= <?php echo $show ?> ) break;
        $("#data").append(
            "<tr class='" + (i%2 ? "even" : "odd")+ "'>" +
            t(data[i].country_symbol, "country_symbol") +
            t("<img src='" + data[i].flag_url + "' />", "flag") +
            t(data[i].gold, "count count_gold") +
            t(data[i].silver, "count count_silver") +
            t(data[i].bronze, "count count_bronze") +
            "</tr>"
        );
    }
});
</script>

<?php } ?>

<script>
(function() {
    function highlight(selector, show) {
        var e = document.getElementsByClassName("count_" + selector);
        for( var i = 0; i < e.length; i++ ) {
            if( show === true ) {
                e[i].classList.add("high");
            } else {
                e[i].classList.remove("high");
            }
        }
    }

    var e = ["gold", "silver", "bronze"];
    for( var i = 0; i < e.length; i++ )(function(selector) {

        document.getElementById(selector).onmouseover = function() {
            highlight(selector, true);
        }

        document.getElementById(selector).onmouseout = function() {
            highlight(selector, false);
        }

        document.getElementById(selector).onclick = function() {
            highlight(selector, true);
        }

    })(e[i]);
})();
</script>
</body>
</html>
