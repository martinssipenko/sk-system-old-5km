<html>
    <head>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <title>
            Šķūnenieku Kauss - Apgrieziens
        </title>
    </head><? date_default_timezone_set('Europe/Riga'); ?>
    <body>
        <div style="font-size:120px; margin: auto; text-align: center;">
            <div name="hronometrs" id="hronometrs"></div>
        </div>
        <div style="text-align:center; margin: auto;">
            <form action="apgrieziensInsertData.php" method="post" enctype="application/x-www-form-urlencoded" name="komentetajs">
                <div>Numurs:</div>
                <div>
                    <input style="width: 30%; vertical-align: middle; font-size: 100px; text-align: center; vertical-align: middle;" name="numurs" type="number" class="input" autocomplete="off" size="3" maxlength="3" tabindex="1" style="<?php if(isset($error['style'])) { echo $error['style']; } ?>" value="<?php if(isset($error['numurs'])) { echo $error['numurs']; } ?>">
                    <br/><?php if(isset($error['msg'])) { echo $error['msg']; } ?>
                    <input style="margin:0px" type="image" align="middle" src="images/submit_invisible.gif">
                </div>
            </form>
        </div>


        <script src="javascript/vendor/jquery.min.js" type="text/javascript"></script>
        <script src="javascript/vendor/jintervals.js" type="text/javascript"></script>
        <script type="text/javascript">
            var watchInterval;

            function update() {
                var t = new Date().getTime();

                $.ajax({
                    url: 'rightInfoData.php',
                    data: { t: t },
                    dataType: 'json'
                }).done(function(data) {
                    clearInterval(watchInterval);
                    var watch = data.watch;

                    $('#hronometrs').html(jintervals(Math.abs(watch), "{hh}:{mm}:{ss}"));
                    watchInterval = setInterval(function() {
                        watch++;
                        $('#hronometrs').html(jintervals(Math.abs(watch), "{hh}:{mm}:{ss}"));
                    }, 1000);
                });
            }

            var updateInterval = setInterval(function() {
                update();
            }, 10000);
            update();
        </script>
    </body>
</html>