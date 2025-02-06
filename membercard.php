<?php
function floatvalue($val){
  $val = str_replace(",",".",$val);
  $val = preg_replace('/\.(?=.*\.)/', '', $val);
  return floatval($val);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Member Card</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0" />
  <meta http-equiv="Expires" content="Fry, 02 Oct 2012 12:00:00 GMT" />
  <style>
    * {
    font: <?php echo $sysconf['print']['membercard']['bio_font_size'] ?>px Arial, Helvetica, sans-serif;
  }

  p,
  li {
    position: relative;
  }

  p {
    margin-bottom: 0px;
    margin-top: 0px;
    font-weight: bold;
  }

  li {
    margin-bottom: 0px;
    margin-top: 0px;
    list-style-type: disc;
    font-size: <?php echo $sysconf['print']['membercard']['rules_font_size'] ?>px;
  }

  ul {
    margin: 0px;
    padding-left: 10px;
  }

  h1 {
    margin: 0px;
    font-weight: bold;
    text-align: center;
    font-size: <?php echo $sysconf['print']['membercard']['front_header1_font_size'] ?>px;
  }

  h2 {
    margin: 0px;
    font-weight: bold;
    text-align: center;
    padding-bottom: 3px;
    font-size: <?php echo $sysconf['print']['membercard']['front_header2_font_size'] ?>px;
  }

  h3 {
    margin: 0px;
    font-weight: bold;
    text-align: center;
    padding-bottom: 3px;
    font-size: 8px;
  }

  hr {
    margin: 0px;
    border: 1px solid<?php echo $sysconf['print']['membercard']['header_color'] ?>;
    position: relative;
  }

  #header1_div {
  z-index: 2;
    position: absolute;
    right: 15px;
    top: 300px;
    width: 245px;
    height: 45px;
    color: #000000;
    font-size: 14px;
  }

  #header2_div {
    z-index: 3;
    position: absolute;
    left: 10px;
    top: 4px;
    width: 300px;
    height: 43px;
    color:<?php echo $sysconf['print']['membercard']['header_color'] ?>;
  }

  #rules_div {
    z-index: 4;
    position: absolute;
    left: 247px;
    top: 321px;
    width: 300px;
    height: 142px;
    text-align: justify;
    font-size: 4px;
    color: white;
  }

  #address_div {
    z-index: 4;
    position: absolute;
    left: 250px;
    top: 320px;
    width: 300px;
    height: 20px;
    font-size: 5px;
    color: white;

  }
  .notice {
    z-index: 4;
    position: absolute;
    left: 250px;
    top: 320px;
    width: 300px;
    height: 20px;
    font-size: 6px;
    color: white;

  }

  #logo_div {
    z-index: 5;
    position: absolute;
    left: 10px;
    top: 152px;
    width: 20px;
    height: 70px;
  }

  #photo_blank_div {
    z-index: 5;
    position: absolute;
    left: 120px;
    top: 120px;
    font-size: 7px;
    text-align: center;
    border: #ffffff solid 4px;
    border-radius: 50%;
    width: 60px;
    height: 60px;
  }

  #photo_div {
    z-index: 6;
    position: absolute;
    left: 120px;
    top: 120px;
    
    border-radius: 50%;
    width: 60px;
    height: 60px;
  }

  #front_side {
    background: url(<?php echo SWB.'files/membercard/cubic/'.$sysconf['print']['membercard']['front_side_image'] ?>) center center;
  width: 5.4 cm;
  height: 8.6 cm;
  background-size: cover;

  }

  #back_side {
    background: url(<?php echo SWB.'files/membercard/cubic/'.$sysconf['print']['membercard']['back_side_image'] ?>) center center;
     width: 5.4 cm;
  height: 8.6 cm;
  background-size: cover;
  }
.top{
    font: 6px Arial, Helvetica, sans-serif;
}
#top{
font: 6px Arial, Helvetica, sans-serif;
}
  .container_div {
    z-index: 1;
    position: relative;
    width: <?= round($sysconf['print']['membercard']['box_width']*$sysconf['print']['membercard']['factor']) ?>px;
    height: <?= round($sysconf['print']['membercard']['box_height']*$sysconf['print']['membercard']['factor']) ?>px;
    margin-bottom: <?= round($sysconf['print']['membercard']['items_margin']*$sysconf['print']['membercard']['factor']) ?>px;
    ;
    border: #CCCCCC solid 1px;
    -moz-border-radius: 8px;
    border-radius: 8px;
  }

  .bio_div {
    z-index: 7;
    position: absolute;
    left: 10px;
    top: 200px;
    height: 110px;
    margin: 0px;
    text-align: justify;
    color: white;
    width: 100%
  }
  .named {
    z-index: 7;
    position: absolute;
    left: 20px;
    top: 200px;
    height: 110px;
    margin: 0px;
    text-align: justify;
    font-size: 21px;
    text-transform: uppercase;
    color: white;
}

  .institution {
    z-index: 7;
    position: absolute;
    left: 20px;
    top: 245px;
    height: 110px;
    margin: 0px;
    text-align: justify;
    font-size: 7px;
    text-transform: uppercase;
    color: white;
}

  .idnumb {
    z-index: 7;
    position: absolute;
    left: 20px;
    top: 227px;
    height: 110px;
    margin: 0px;
    text-align: justify;
    font-size: 10px;
    color: white;
}
  .named_back {
    z-index: 7;
    position: absolute;
    left: 25px;
    top: 155px;
    height: 110px;
    margin: 0px;
    text-align: justify;
    font-size: 7px;
    text-transform: uppercase;
    color: white;
}



  .institution_back {
    z-index: 7;
    position: absolute;
    left: 25px;
    top: 185px;
    height: 110px;
    margin: 0px;
    text-align: justify;
    font-size: 7px;
    text-transform: uppercase;
    color: white;
}


  .idnumb_back {
    z-index: 7;
    position: absolute;
    left: 25px;
    top: 169px;
    height: 110px;
    margin: 0px;
    text-align: justify;
    font-size: 7px;
    color: white;
}

  .address_back {
    z-index: 7;
    position: absolute;
    left: 40px;
    top: 200px;
    height: 110px;
    margin: 0px;
    text-align: left;
    font-size: 7px;
    color: white;
    text-transform: uppercase;
    width: 70%;
    word-wrap: break-word;
}
  .homeicon {
    z-index: 7;
    position: absolute;
    left: 25px;
    top: 200px;
    
}

  .bio_address {
    z-index: 8;
    top: 0px;
  }

  .bio_label {
    z-index: 9;
    float: left;
    width: 100px;
    text-align: left;
    padding-left: 10px;
  }

  .label_address {
    z-index: 10;
    float: left;
    width: 200px;
    margin-bottom: 0px;
    margin-left: 3px;
  }

  .stamp_div {
    z-index: 11;
    position: absolute;
    left: 100px;
    top: 140px;
    margin-bottom: 34px;
    width: 118px;
  }

  .stamp {
    z-index: 12;
    text-align: left;
    margin: 0px;
  }

  .city {
    z-index: 13;
    font-size: 8px;
    margin: 0px;
  }

  .title {
    z-index: 14;
    font-size: 8px;
    margin: 0px;
  }

  .officials {
    z-index: 15;
    top: 0px;
    font-size: 8px;
    margin: 0px;
  }

  .sign_file_div {
    z-index: 16;
    position: absolute;
    left: -10px;
    top: 10px;
    width: 107px;
    height: 25px;
  }

  .stamp_file_div {
    z-index: 17;
    position: absolute;
    left: -20px;
    top: 5px;
    width: 40px;
    height: 40px;
  }

  .exp_div {
    z-index: 18;
    position: absolute;
    left: 200px;
    top: 142px;
    width: 110px;
    height: 12px;
    font-size: 8px;
    text-align: right;
  }

  .barcode_div {
    z-index: 19;
    position: absolute;
    left: 40px;
    top: 100px;
    width: 112px;
    height: 42px;
  }
  .persons_icon{
    top: 40px;
  }
  </style>
</head>

<body>
  <a href="#" onclick="window.print()"><?php echo __('Print Again'); ?></a>
  <br /><br />
  <table style="margin: 0; padding: 0;" cellspacing="0" cellpadding="0">

    <?php foreach ($chunked_card_arrays as $membercard_rows) : ?>
      <tr>
        <?php foreach ($membercard_rows as $card) : ?>
          <td valign="top">
            <div class="container_div" id="front_side">
              <div></div>
              <div id="logo_div">
                <img 
                  height="30px" 
                  width="100px" 
                  src="<?php echo SWB . 'files/membercard/cubic/' . $sysconf['print']['membercard']['logo']; ?>" 
                />
              </div>

              <p class="named">
                <?php 
                  $fullName = $card['member_name']; 
                  $nameParts = explode(' ', $fullName); 
                  $shortName = isset($nameParts[0]) ? $nameParts[0] : ''; 
                  echo $shortName; 
                ?>
              </p>

              <p class="institution">
                <?php echo $card['inst_name']; ?>
              </p>

              <p class="idnumb">
                <?php echo $card['member_id']; ?>
              </p>

              <div id="photo_blank_div">
                <br />
                Photo size:<br />
                <?php echo $sysconf['print']['membercard']['photo_width']; ?> X
                <?php echo $sysconf['print']['membercard']['photo_height']; ?> cm
              </div>

              <div id="photo_div">
                <img 
                  width="60px" 
                  height="60px" 
                  style="border-radius:50%;border:4px solid white;"
                  src="<?php echo SWB . IMG ?>/persons/<?php echo $card['member_image']; ?>" 
                />
              </div>

              <div id="header1_div">
                <h3>
                  <?php echo $sysconf['print']['membercard']['front_header1_text']; ?>
                </h3>
              </div>
            </div>
          </td>
          <td valign="top">
            <div class="container_div" id="back_side">
              <div class="barcode_div">
                <img 
                  width="175px" 
                  height="40px" 
                  src="<?php echo SWB . IMG . '/barcodes/' . str_replace([' '], '_', $card['member_id']); ?>.png"
                  style="width:<?php echo $sysconf['print']['membercard']['barcode_scale']; ?>%;" 
                  border="0" 
                />
              </div>

              <p class="named_back">
                <img height="10px" width="10px" src="membercard/cubic/person_icon.png" /> &nbsp;
                <?php echo $card['member_name']; ?>
              </p>

              <p class="institution_back">
                <img height="10px" width="10px" src="membercard/cubic/faculty_icon.png" /> &nbsp;
                <?php echo $card['inst_name']; ?>
              </p>

              <p class="idnumb_back">
                <img height="10px" width="10px" src="membercard/cubic/bar_icon.png" /> &nbsp;
                <?php echo $card['member_id']; ?>
              </p>

              <p class="homeicon">
                <img height="10px" width="10px" src="membercard/cubic/home_icon.png" />
              </p>

              <p class="address_back">
                <?php echo $card['member_address']; ?>
              </p>

              <div class="notice">
                *Berlaku selama menjadi mahasiswa.
              </div>
            </div>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </table>

  <script type="text/javascript">
    self.print();
  </script>
</body>



</html>