<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--icon of the page--><link rel="shortcut icon" type="image/x-icon" href="images/logo.svg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mowadaba</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background: url() center top repeat-x #fff;
        }

        body .accueil-header, .accueil-body, .accueil-footer {
            width: auto;
        }

        .accueil-header {
            text-align: center;
            height: 200px;
            justify-content: center;
        }

        .accueil-body {
            text-align: center;
            margin-top: 40px;
        }

        .accueil-footer {
            position: fixed;
            bottom: 0px;
            left: 18%;
            width: 60%;
            background: #fff;
            border-top: 1px solid #d2d6de;
            padding: 12px;
        }

        .accueil-component {
            width: auto;
            height: 184px;
            display: inline-block;
            padding-top: 6px;cursor: pointer;
        }
        
        /*
        @media (hover: hover){
            .accueil-component:hover {
                box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 45px, rgba(0, 0, 0, 0.22) 0px 10px 18px;
            }
        }
        
        @media (hover: none){
            .accueil-component:hover {
                box-shadow: transparent;
            }
        }*/
        

        .materiel-color-gray {
            background: #8fa4ae;
        }

        .accueil-component-icon {
            width: 40%;
            margin: auto;
            
            border: 0px solid;
            width: 208px;
            border-radius: 110px;
        }
        
        .accueil-component-icon img {
            background: #fff;
            width: 208px;
            height: 208px;
            border-radius: 50%;
            border: 4px solid #FF8000;
        }
        

        .accueil-component-title {
            /**/display: inline-block;
            border: 0px solid;
            position: relative;
            background: #526Fd7;
            width: 97%;
            height:80px;
            bottom: 15px;
            z-index: -1;
            border-radius:10px;display: table; 
        }

        .accueil-component-title p {
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            text-align: center;vertical-align: middle;display: table-cell;
        }

        .pull-right {
            float: left !important;
        }

        .pull-left {
            float: right !important;
        }
        tr > * + * {
          padding-left: 4em;
        }
        
        div {
            margin: 10px;
        }
  
        .first {
            width: 25%;
            display: inline-block;
            cursor: pointer;
        }
  
        .second {
            width: 25%;
            display: inline-block;
            cursor: pointer;
        }
  
        .third {
            width: 25%;
            display: inline-block;
            cursor: pointer;
        }
 .header-log{width: 60%;display: block;margin-left: auto;margin-right: auto;}
        @media screen and (max-width: 800px) {
  
            .first,
            .second,
            .third {
                display:block;
                width: 100%;
            }
        }
        @media only screen and (max-width: 600px) {

  .accueil-body{
      width:90%;
      margin-left:5%;
  }
   .header-log,
  .first,
            .second,
            .third {
                margin-left:10%;
    width: 220%;
  }
}
        
    </style>

</head>
<body>
    <div class="accueil-header">
        <img class="header-log" id="logo-men" src="images/menlogo.png" >
    </div>
    <div class="accueil-body">

                    
                        <div class="first" data-url="loginadmin">
                            <div class="accueil-component-icon">
                                <img src="/images/Telecommuting-pana.svg" style=" "/>
                            </div>
                            <div class="accueil-component-title">
                                <p>Espace Administration</p>
                            </div>
                        </div>
                    
                        <div class="second" data-url="students/login">
                            <div class="accueil-component-icon">
                                <img src="/images/Learning-rafiki.svg" style=""/>
                            </div>
                            <div class="accueil-component-title">
                                <p>Espace Élève</p>
                            </div>
                        </div>
                    
                        <div class="third" data-url="loginprof">
                            <div class="accueil-component-icon">
                                <img src="/images/Learning-pana.svg" style=""/>
                            </div>
                            <div class="accueil-component-title">
                                <p>Espace Professeur</p>
                            </div>
                        </div>
                    
                    
    </div>
</body><!---->
<footer>
    <div class="accueil-footer">
        <div class="pull-right">
            <b>Version</b> 2.0
        </div>
        <div class="pull-left">
            <strong>Copyright © <?php echo date("Y"); ?></strong>
        </div>
        
    </div>
</footer>
    <script>

        $(".first").click(function () {

            var $url = $(this).data("url");

            window.location.href = $url;
        })
        $(".second").click(function () {

            var $url = $(this).data("url");

            window.location.href = $url;
        })
        $(".third").click(function () {

            var $url = $(this).data("url");

            window.location.href = $url;
        })

    </script>



</html>
