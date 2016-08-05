<?php
require( "flags.php");

if( 1 ) {

    $countries = <<< EOF
    AFG	[1]	Afghanistan
    ALB	[2]	Albania
    ALG	[3]	Algeria
    AND	[4]	Andorra
    ANG	[5]	Angola
    ANT	[6]	Antigua and Barbuda
    ARG	[7]	Argentina
    ARM	[8]	Armenia
    ARU	[9]	Aruba
    ASA	[10]	American Samoa
    AUS	[11]	Australia
    AUT	[12]	Austria
    AZE	[13]	Azerbaijan
    BAH	[14]	Bahamas
    BAN	[15]	Bangladesh
    BAR	[16]	Barbados
    BDI	[17]	Burundi
    BEL	[18]	Belgium
    BEN	[19]	Benin
    BER	[20]	Bermuda
    BHU	[21]	Bhutan
    BIH	[22]	Bosnia and Herzegovina
    BIZ	[23]	Belize
    BLR	[24]	Belarus
    BOL	[25]	Bolivia
    BOT	[26]	Botswana
    BRA	[27]	Brazil
    BRN	[28]	Bahrain
    BRU	[29]	Brunei
    BUL	[30]	Bulgaria
    BUR	[31]	Burkina Faso
    CAF	[32]	Central African Republic
    CAM	[33]	Cambodia
    CAN	[34]	Canada
    CAY	[35]	Cayman Islands
    CGO	[36]	Congo
    CHA	[37]	Chad
    CHI	[38]	Chile
    CHN	[39]	China
    CIV	[40]	Ivory Coast
    CMR	[41]	Cameroon
    COD	[42]	DR Congo
    COK	[43]	Cook Islands
    COL	[44]	Colombia
    COM	[45]	Comoros
    CPV	[46]	Cape Verde
    CRC	[47]	Costa Rica
    CRO	[48]	Croatia
    CUB	[49]	Cuba
    CYP	[50]	Cyprus
    CZE	[51]	Czech Republic
    DEN	[52]	Denmark
    DJI	[53]	Djibouti
    DMA	[54]	Dominica
    DOM	[55]	Dominican Republic
    ECU	[56]	Ecuador
    EGY	[57]	Egypt
    ERI	[58]	Eritrea
    ESA	[59]	El Salvador
    ESP	[60]	Spain
    EST	[61]	Estonia
    ETH	[62]	Ethiopia
    FIJ	[63]	Fiji
    FIN	[64]	Finland
    FRA	[65]	France
    FSM	[66]	Federated States of Micronesia
    GAB	[67]	Gabon
    GAM	[68]	The Gambia
    GBR	[69]	Great Britain
    GBS	[70]	Guinea-Bissau
    GEO	[71]	Georgia
    GEQ	[72]	Equatorial Guinea
    GER	[73]	Germany
    GHA	[74]	Ghana
    GRE	[75]	Greece
    GRN	[76]	Grenada
    GUA	[77]	Guatemala
    GUI	[78]	Guinea
    GUM	[79]	Guam
    GUY	[80]	Guyana
    HAI	[81]	Haiti
    HKG	[82]	Hong Kong
    HON	[83]	Honduras
    HUN	[84]	Hungary
    INA	[85]	Indonesia
    IND	[86]	India
    IRI	[87]	Iran
    IRL	[88]	Ireland
    IRQ	[89]	Iraq
    ISL	[90]	Iceland
    ISR	[91]	Israel
    ISV	[92]	Virgin Islands
    ITA	[93]	Italy
    IVB	[94]	British Virgin Islands
    JAM	[95]	Jamaica
    JOR	[96]	Jordan
    JPN	[97]	Japan
    KAZ	[98]	Kazakhstan
    KEN	[99]	Kenya
    KGZ	[100]	Kyrgyzstan
    KIR	[101]	Kiribati
    KOR	[102]	South Korea
    KOS	[103]	Kosovo
    KSA	[104]	Saudi Arabia
    KUW	[105]	Kuwait
    LAO	[106]	Laos
    LAT	[107]	Latvia
    LBA	[108]	Libya
    LBR	[109]	Liberia
    LCA	[110]	Saint Lucia
    LES	[111]	Lesotho
    LIB	[112]	Lebanon
    LIE	[113]	Liechtenstein
    LTU	[114]	Lithuania
    LUX	[115]	Luxembourg
    MAD	[116]	Madagascar
    MAR	[117]	Morocco
    MAS	[118]	Malaysia
    MAW	[119]	Malawi
    MDA	[120]	Moldova
    MDV	[121]	Maldives
    MEX	[122]	Mexico
    MGL	[123]	Mongolia
    MHL	[124]	Marshall Islands
    MKD	[125]	Macedonia
    MLI	[126]	Mali
    MLT	[127]	Malta
    MNE	[128]	Montenegro
    MON	[129]	Monaco
    MOZ	[130]	Mozambique
    MRI	[131]	Mauritius
    MTN	[132]	Mauritania
    MYA	[133]	Myanmar
    NAM	[134]	Namibia
    NCA	[135]	Nicaragua
    NED	[136]	Netherlands
    NEP	[137]	Nepal
    NGR	[138]	Nigeria
    NIG	[139]	Niger
    NOR	[140]	Norway
    NRU	[141]	Nauru
    NZL	[142]	New Zealand
    OMA	[143]	Oman
    PAK	[144]	Pakistan
    PAN	[145]	Panama
    PAR	[146]	Paraguay
    PER	[147]	Peru
    PHI	[148]	Philippines
    PLE	[149]	Palestine
    PLW	[150]	Palau
    PNG	[151]	Papua New Guinea
    POL	[152]	Poland
    POR	[153]	Portugal
    PRK	[154]	North Korea
    PUR	[155]	Puerto Rico
    QAT	[156]	Qatar
    ROU	[157]	Romania
    RSA	[158]	South Africa
    RUS	[159]	Russia
    RWA	[160]	Rwanda
    SAM	[161]	Samoa
    SEN	[162]	Senegal
    SEY	[163]	Seychelles
    SIN	[164]	Singapore
    SKN	[165]	Saint Kitts and Nevis
    SLE	[166]	Sierra Leone
    SLO	[167]	Slovenia
    SMR	[168]	San Marino
    SOL	[169]	Solomon Islands
    SOM	[170]	Somalia
    SRB	[171]	Serbia
    SRI	[172]	Sri Lanka
    SSD	[173]	South Sudan
    STP	[174]	São Tomé and Príncipe
    SUD	[175]	Sudan
    SUI	[176]	Switzerland
    SUR	[177]	Suriname
    SVK	[178]	Slovakia
    SWE	[179]	Sweden
    SWZ	[180]	Swaziland
    SYR	[181]	Syria
    TAN	[182]	Tanzania
    TGA	[183]	Tonga
    THA	[184]	Thailand
    TJK	[185]	Tajikistan
    TKM	[186]	Turkmenistan
    TLS	[187]	Timor-Leste
    TOG	[188]	Togo
    TPE	[189]	Chinese Taipei[5]
    TTO	[190]	Trinidad and Tobago
    TUN	[191]	Tunisia
    TUR	[192]	Turkey
    TUV	[193]	Tuvalu
    UAE	[194]	United Arab Emirates
    UGA	[195]	Uganda
    UKR	[196]	Ukraine
    URU	[197]	Uruguay
    USA	[198]	United States
    UZB	[199]	Uzbekistan
    VAN	[200]	Vanuatu
    VEN	[201]	Venezuela
    VIE	[202]	Vietnam
    VIN	[203]	Saint Vincent and the Grenadines
    YEM	[204]	Yemen
    ZAM	[205]	Zambia
    ZIM	[206]	Zimbabwe
EOF;
}


$countries = explode("\n", trim($countries) );

$data = array();
foreach( $countries as $k => $v ) {
    $t1 = explode("[", $v);
    $t2 = explode("]", $t1[1] );

    $key = trim($t1[0]);
    $data[] = array(
        "symbol" => $key,
        "flag" => $flags[$key],
        "name" => trim($t2[1])
    );
}

$w = 48 * 1.333;
$h = 29 * 1.333;

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<meta charset="utf-8" />

<style>
.quiz { font-family: Arial; font-size: 14px }
img { width: <?php echo $w ?>px; height: <?php echo $h ?>px; }
.clr { clear: both; }
.pane { width: 24%; border-right:2px solid gray; float: left }
.pane-inner { padding: 1em }
.pane-last { border-right:0px }

.pane p { cursor: pointer }
.level { }
.answer {  }

.correct { background-color: limegreen; color:white }
.wrong { background-color: crimson; color: white }

.finished { opacity: 0.5; background-color: rgba(0,0,0,0.5) }
.pane .finished p { cursor: default !important }

.pane p { padding:0.5em }
#next { display: none }
</style>

<div class="quiz">
<h1>Olympic Flags Quiz</h1>

<p>How many olympic flags can you identify?</p>

<h1><span id="score"></span> <span id="next"><a href="#">Next level!</a></span></h1>

<div class="clr"></div>

<div class="panes">

    <div class="pane">
        <div class="pane-inner">

        </div>
    </div>

    <div class="pane">
        <div class="pane-inner">

        </div>
    </div>

    <div class="pane">
        <div class="pane-inner">

        </div>
    </div>

    <div class="pane pane-last">
        <div class="pane-inner">

        </div>
    </div>

</div>

<div class="clr"></div>

</div>

<script>
var score = {
    level: 1,
    correct: 0,
    wrong: 0
}

var data = <?php echo json_encode($data) ?>;

function update_scores() {
    $("#score").html(
        "Level: " + score.level + ", " +
        "Correct: " + score.correct + ", " +
        "Wrong: " + score.wrong
    );
}

function evaluate_next() {
    var panes = $(".finished");
    if( panes.length == 4 ) {
        $("#next").show();
    } else {
        $("#next").hide();
    }
}

function quiz(container) {
    var i = parseInt(Math.random() * data.length);
    container.html("");
    container.append("<div><img src='http://www.voanews.com/MediaAssets2/projects/olympics-2016/flags/" + data[i].flag + "' /></div>");

    var guesses = [];

    for( var j = 0; j < 4; j++ ) {

        var t = parseInt(Math.random() * data.length);
        guesses. push( data[t] );

        container.append("<p class='guess'>" + data[t].name + "</p>");
    }

    container.append("<p class='answer'>" + data[i].name + "</p>");

    shuffle(container);

    $("p", container).click( function() {
        if( $(this).hasClass("answer") ) {
            $(this).addClass("correct");
            $(container).addClass("finished");
            $("p", container).off("click");

            score.correct++;
            update_scores();
        } else {
            $(this).addClass("wrong");
            $(this).off("click");

            score.wrong++;
            update_scores();
        }

        evaluate_next();
    });
}

function shuffle(node) {
    // scramble this 10 times
    for( var i = 0; i < 10; i++ ) {
        var num = 1 + parseInt(Math.random() * 4);
        var first = $("p:eq(0)", node);
        var to_move = $("p:eq(" + num + ")", node);

        to_move.insertAfter(first);
    }
}

function new_quiz() {
    $(".pane-inner").each(function() {
        $(this).removeClass("finished");
        quiz($(this));
    });
}

$("#next").click(function(e) {
    score.level++;
    update_scores();
    new_quiz();
    return(false);
})

update_scores();
new_quiz();
</script>
