<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tritango Traders - <?php echo date("y")?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles >
    <link href="assets/css/bootstrap.css" rel="stylesheet"-->
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <!--link href="assets/css/bootstrap-responsive.css" rel="stylesheet"-->
    <link href="less/bootstrap.less" type="text/css" rel="stylesheet/less">
    <link href="less/responsive.less" type="text/css" rel="stylesheet/less">
    


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <!--div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Tritango Traders</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div></.nav-collapse>
        </div>
      </div>
    </div-->
    <div class="container navbar">
      <div class="container" style="text-align:center;">
        <div class="row">
          <div class="span4 contact">
            <p>Contacto:</p>
            <address>
              <strong>TriTangoTraders, Inc.</strong><br>
              795 Folsom Ave, Suite 600<br>
              San Francisco, CA 94107<br>
              <abbr title="Phone">P:</abbr> (11) 456-7890
            </address>
            <address>
              <strong>Full Name</strong><br>
              <i class="icon-envelope"></i>
              <a href="mailto:#">first.last@gmail.com</a>
            </address>
          </div>
          <div class="span4 brand"><img src="http://www.tritangotraders.com/wp/wp-content/themes/Themeforest-mywordpress-wicked-wordpress/my/images/logo.png" height="45"/></div>
          
          <div class="span4 login">
            <form>
              <div class="control-group">
                <label class="control-label" for="inputIcon">Inicio</label>
                <div class="controls">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input class="span2" id="inputIcon" type="text" placeholder="Usuario">
                  </div>
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-asterisk"></i></span>
                    <input class="span2" id="inputIcon" type="text" placeholder="Contrase&ntilde;a">
                  </div>
                  <button class="btn" href="#">Log-in</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Cotizaciones</a></li>
              <li><a href="#about">Analisis TTT</a></li>
              <li><a href="#contact">Consultas</a></li>
              <li><a href="#contact">Opinion</a></li>
              <li><a href="#contact">Cursos</a></li>
              <li><a href="#contact">Noticias</a></li>
              <li><a href="#contact">Nosotros</a></li>
              
            </ul>
            <ul class="nav pull-right">
              <li><button class="btn btn-inverse" id="test-layout" href="#"><i class="icon-eye-close icon-white"></i></button></li>
            </ul>
          </div><!--/.nav-collapse-->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Cotizaciones</h1>
        <span class="label label-inverse" onClick="crawler.simpleQuerybySymbol('%5EMERV');">^MERV</span>
        <span class="label label-inverse" onClick="crawler.simpleQuerybySymbol('APBR.BA');">APBR.BA</span>
        <span class="label label-inverse" onClick="crawler.simpleQuerybySymbol('ALUA.BA');">ALUA.BA</span>
        <div id="results"></div>
        <div class="icon-white"></div>
      </div>

      <!-- Example row of columns -->
      <div class="row" row="true">
        <div id="myCarousel" class="carousel slide">
          <div class="span6">
            <h2>Promociones:</h2>
            <p class="fixie"></p>
            
            <!-- Carousel items -->
              <!--div class="carousel-inner">
                <div class="active item fixie"></div>
                <div class="item fixie"></div>
                <div class="item fixie"></div>
              </div-->
            <!-- Carousel nav -->
            <!--a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a-->
          </div>
        </div>
        <div class="span6">
          <h2>Situaci&oacute;n Actual:</h2>
          <img id="thumb_chartID0EZF" src="http://api-cdn.cnbc.com/api/chart/chart.asp?YYY330_VnsGsd2sggPqXYH+RDnPSXkXqvF1rMxhWcY95GLZwC8=&amp;type=overview&amp;charttype=price&amp;timeframe=1week&amp;realtime=0&amp;symbol=.N225&amp;showHeader=&amp;showSidebar=0&amp;hideExchange=1&amp;changeOverTime=0&amp;showExtendedHours=0" name="chart_divID0EZF19751224" border="0">
          <p><a class="btn" href="#">Ver &raquo;</a></p>
        </div>
      </div>

      <div class="row" row="true">
        <div class="span6">
          <h2>Analisis TTT</h2>
          <ul class="thumbnails">
            <li class="span6">
              <div class="thumbnail">
                <img src="http://placehold.it/570x268" alt="">
                <h5>Analisis #1</h5>
                <p>
                  <span class="label label-success">normal</span>
                  Thumbnail caption right here...
                </p>
              </div>
            </li>
            <li class="span6">
              <div class="thumbnail">
                <img src="http://placehold.it/570x268" alt="">
                <h5>Analisis #2</h5>
                <p>
                  <span class="label label-warning">warning</span>
                  Thumbnail caption right here...
                </p>
              </div>
            </li>
          </ul>
          <p><a class="btn" href="#">Ver m&aacute;s</a></p>
        </div>
        <div class="span6">
          <h2>Foro</h2>
          <p class="fixie"></p>
          <p class="fixie"></p>
          <p class="fixie"></p>
          <p class="fixie"></p>
          <p><a class="btn" href="#">Ver m&aacute;s</a></p>
        </div>
      </div>

      <div class="row" row="true">
        <div class="span6">
          <h2>Noticias</h2>
          <div class="well fixie">
            <span class="label label-info">yahoo-finance</span>
            <p class="fixie"></p>
          </div>
          <div class="well fixie">
            <span class="label label-info">google-finance</span>
            <p class="fixie"></p>
          </div>
          <div class="well fixie">
            <span class="label label-info">cnbc</span>
            <p class="fixie"></p>
          </div>
        </div>
        <div class="span6">
          <h2>Consultas/Opinion</h2>
          <ul class="thumbnails">
            <li class="span6">
              <div class="thumbnail">
                <img src="http://placehold.it/570x128" alt="">
                <h5>Consulta #1</h5>
                <p class="">
                  <span class="label label-inverse">10/12/2011</span>
                  <p class="fixie"></p>
                </p>
              </div>
            </li>
            <li class="span6">
              <div class="thumbnail">
                <img src="http://placehold.it/570x128" alt="">
                <h5>Consulta #2</h5>
                <p class="">
                  <span class="label label-inverse">22/04/2012</span>
                  <p class="fixie"></p>
                </p>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <hr>

      <footer>
        <p>TriTangoTrends &copy; Company 2012</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="js/less.js" type="text/javascript"></script>
    <script src="http://yui.yahooapis.com/3.5.1/build/yui/yui-min.js" type="text/javascript"></script>
    <!--script src="http://yui.yahooapis.com/gallery-2010.01.27-20/build/gallery-yql/gallery-yql-min.js" type="text/javascript"></script-->
    <!--script src="http://yui.yahooapis.com/3.5.1/build/yui/yui-min.js"></script-->
    <script src="assets/js/fixie_min.js"></script>
    <script src="assets/js/application.js"></script>
    <script src="assets/js/ui.js"></script>
    <script src="assets/js/crawler-with-yahooquery.js"></script>

    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
