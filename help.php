<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
<head>
    <meta charset="UTF-8">
    
    <!--icon of the page--><link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/hh6MVky.png" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background: url() center top repeat-x #f7f2df;
        }

        body .accueil-header, .accueil-body, .accueil-footer {
            width: 100%;
        }

        .accueil-header {
            text-align: center;
            height: 200px;
        }

        .accueil-body {
            text-align: center;
            margin-top: 50px;
        }

        .accueil-footer {
            position: absolute;
            bottom: 0px;
            left: 18%;
            width: 60%;
            background: #f9f6ea;
            border-top: 1px solid #d2d6de;
            padding: 12px;
            margin-top:50px;
        }

        .accueil-component {
            width: 500px;
            height: 184px;
            display: inline-block;
            padding-top: 6px;cursor: pointer;
        }
        /*@media (hover: hover){
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
            width: 208px;
            height: 208px;
            border-radius: 50%;
            border: 4px solid #9da7dc;
        }
        .accueil-component-icon1 img {
            width: 208px;
            height: 208px;
            border-radius: 50%;
            border: 4px solid #fff;
        }

        .accueil-component-title {
            display: inline-block;
            border: 0px solid;
            position: relative;
            background: #eeeeee;
            width: 97%;
            bottom: 15px;
            z-index: -1;
        }

        .accueil-component-title p {
            font-size: 20px;
            font-weight: 700;
            text-align: center;
        }

        .pull-right {
            float: left !important;
        }

        .pull-left {
            float: right !important;
        }

    </style>

</head>
<body>
    <div class="accueil-header">
        <img class="header-log" id="logo-men" src="https://iconape.com/wp-content/files/fy/257740/svg/257740.svg" style="width: 480px;">
    </div>
    <div class="accueil-body">

        <table class="responsive" style="margin: auto;">
            <tr>
                <td>
                    <div class="accueil-component" data-url="loginadmin">
                        <div class="accueil-component-icon">
                            <img src="/images/image3.png" style="background: rgba(144, 164, 175, 0.81); "/>
                        </div>
                        <div class="accueil-component-title">
                            <p>Espace Administration</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="accueil-component " data-url="students/login">
                        <div class="accueil-component-icon1">
                            <img src="/images/image1.png" style="background: rgba(206, 117, 35, 0.81);"/>
                        </div>
                        <div class="accueil-component-title">
                            <p>Espace Etudiant</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="accueil-component " data-url="students/login">
                        <div class="accueil-component-icon1">
                            <img src="/images/image1.png" style="background: rgba(206, 117, 35, 0.81);"/>
                        </div>
                        <div class="accueil-component-title">
                            <p>Espace Etudiant</p>
                        </div>
                    </div>
                </td>
            </tr>
        </table>




    </div>
    <div class="accueil-footer">
        <div class="pull-right">
            <b>Version</b> 2.0
        </div>
        <div class="pull-left">
            <strong>Copyright © <?php echo date("Y"); ?></strong>
        </div>

    </div>

    <script>

        $(".accueil-component").click(function () {

            var $url = $(this).data("url");

            window.location.href = $url;
        })

    </script>

</body>

</html>
