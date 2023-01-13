<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
        body{
            width:100%;
            height:100vh;
        }
        .box-main{
            width:100%;
            height:100vh;
            align-items: center;
            justify-content: center;
        }
        .box {
            justify-content: center;
        }

        .box div {
            width: 70px;
            height: 70px;
            margin :1px;
        }
        img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        position: relative;
        }
        p{
            margin-top: 0;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
            top: -27px;
            text-align: center;
            color:darkblue;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

  <?php
  $directory = "./images";
  $myLoveHeartArr = glob($directory . "/*");
  if (($key = array_search('./images/myHeart.jpg', $myLoveHeartArr)) !== false) {
    unset($myLoveHeartArr[$key]);
  }
  $myLoveHeartArr=array_values($myLoveHeartArr);
  usort( $myLoveHeartArr, function( $a, $b ) { return filemtime($a) - filemtime($b); } );
  $myLoveHeartArr=array_reverse($myLoveHeartArr);
//   echo "<pre>";
//   print_r($myLoveHeartArr);
//   exit;
?>


    <?php
    $heart_array = [
        [0,1,1,0,0,0,1,1,0],
        [1,1,1,1,0,1,1,1,1],
        [1,1,1,1,1,1,1,1,1],
        [1,1,1,1,1,1,1,1,1],
        [0,1,1,1,1,1,1,1,0],
        [0,0,1,1,1,1,1,0,0],
        [0,0,0,1,1,1,0,0,0],
        [0,0,0,0,1,0,0,0,0]
    ];
    $j=0;
    ?>
    <div class="d-flex box-main">
        <div class="item-main">
            <?php foreach($heart_array as $heart){?>
                <div class="d-flex box">
                    <?php foreach($heart as $key=>$love ){
                            $islove = $love?"visible":"hidden";
                        ?>
                        <div class="item" style="visibility:<?=$islove?>;">
                            <?php
                                if($islove=="visible" && count($myLoveHeartArr)!=0)
                                {
                                    $get_name= substr($myLoveHeartArr[$j],9);
                                    $nARR = explode('.',$get_name);
                                    $loveName = $nARR[0];
                                    ?>
                                    <img src="<?=$myLoveHeartArr[$j]?>">
                                    <p><?=strlen($loveName)<=6?$loveName:substr($nARR[0], 0, 6)."...";?></p>
                                    <?php
                                    unset($myLoveHeartArr[$j]);
                                    $j++;
                                }else
                                {
                                    ?>
                                    <img src="./images/myHeart.jpg">
                                    <?php
                                }
                            ?>
                        </div>
                        <?php
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>