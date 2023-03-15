<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    
    <!--icon of the page--><link rel="shortcut icon" type="image/x-icon" href="images/logo.svg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mowadaba</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      .selector-for-some-widget {
  box-sizing: content-box;
}

.accueil-header {
  text-align: center;

  height: 20%;

  justify-content: center;
}
.header-log {
  width: 60%;
  display: block;
  margin-left: auto;
  margin-right: auto;
  background-color: white;
}
#logo-men {
  width: 80%;
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 1%;
}

.row {
  display: flex;
  margin: 7.5% auto 5% auto;
}
.sub-row {
  padding: 14px 20px;
  flex: 30%;
  text-align: center;
  cursor : pointer;
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
  border: 4px solid #ff8000;
  margin: auto;
}

.accueil-component-title {
  display: inline-block;
  position: relative;
  background: #526fd7;
  width: 60%;
  padding: 5%;
  border-radius: 10px;
  margin: auto;
  margin-top: 2%;
  text-align: center;
  display: table;
}

.accueil-component-title p {
  font-size: 20px;
  font-weight: 700;
  color: #fff;
  text-align: center;
  vertical-align: middle;
  display: table-cell;
}

.accueil-footer {
  position: fixed;
  bottom: 0px;
  width: 100%;
  background: #fff;
  border-top: 1% solid #d2d6de;
  padding: 12px;
}

.pull-right {
  float: left !important;
  padding-left: 5%;
}

.pull-left {
  float: right !important;
  padding-right: 5%;
}

@media only screen and (max-width: 500px) {
  .header-log {
    width: 100%;
    position: fixed;
    display: block;
    top: 0;
  }
  .container {
    margin-bottom: 20%;
  }
  .row {
    display: flex;
    margin: 30% 0 10% 0;
  }
  .accueil-component-icon img {
    background: #fff;
    width: 140px;
    height: 140px;
    border-radius: 50%;
    border: 4px solid #ff8000;
    margin: auto;
  }
  .accueil-component-title {
    display: inline-block;
    position: relative;
    background: #526fd7;
    width: 90%;
    height:auto;
    padding: 2.5%;
    border-radius: 10px;
    margin: auto;
    margin-top: 1%;
    text-align: center;
    display: table;
  }
}
@media screen and (min-width: 600px) {
    
    .accueil-component-title {
        
        display: inline-block;
        position: relative;
        background: #526fd7;
        width: 90%;
        height:auto;
        padding: 2.5%;
        border-radius: 10px;
        margin: auto;
        margin-top: 1%;
        text-align: center;
        display: table;
        
    }
    
}

    </style>
    <title>Mowadaba</title>
  </head>

  <body>

    <div class="accueil-header">
      <img class="header-log" src="/images/menlogo.png"/>
    </div>

    <div class="row mx-5">

      <div class="sub-row" data-url="loginadmin">
        <div class="accueil-component-icon">
          <img src="/images/Telecommuting-pana.svg"/>
        </div>
        <div class="accueil-component-title">
          <p>Espace Administration</p>
        </div>
      </div>

      <div class="sub-row"  data-url="loginprof">
        <div class="accueil-component-icon">
          <img src="/images/Learning-pana.svg"/>
        </div>
        <div class="accueil-component-title">
          <p>Espace Professeur</p>
        </div>
      </div>

      <div class="sub-row" data-url="students/login">
        <div class="accueil-component-icon">
          <img src="/images/Learning-rafiki.svg" />
        </div>
        <div class="accueil-component-title">
          <p>Espace Élève</p>
        </div>
      </div>

    </div>

    <footer>

      <div class="accueil-footer">
        <div class="pull-right"><b>Version</b> 2.0</div>
        <div class="pull-left">
          <strong>Copyright © <?php echo date("Y"); ?></strong>
        </div>
      </div>

    </footer>

    <script>
      $(".sub-row").click(function () {
        var $url = $(this).data("url");

        window.location.href = $url;
      });
      
    </script>

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
