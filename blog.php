<?php
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";


include "logic/dao.php";
$dao = new dao();
$blogEntries = $dao->getBlogEntries();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Blog - <?=APPLICATION_NAME;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--[if IE 7]>
      <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/sample/logo-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/sample/logo-114.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/sample/logo-72.png">
                    <link rel="apple-touch-icon-precomposed" href="img/sample/logo-57.png">
                                   <link rel="shortcut icon" href="img/sample/logo.png">
    
  </head>

  <body class="archive">


  <?php
  include "nav.php";
  ?>


  <div class="clear"></div>
    
    <div class="container-wrapper container-top container-wrapper-sunset">
      <div class="container">
        <div class="row">
          <div class="col-md-12 center">
            <h1>Blog</h1>
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->

    <div class="container">
      <div class="row">
        <div class="col-md-8">


            <?php
            foreach ($blogEntries as $blog)
            {
                echo "<A NAME=\"".$blog['id']."\">
                   <article class=\"post\">

                    <h2><a href=\"blog-post.html\">".$blog['title']."</a></h2>
                    <a href=\"blog-post.html\" class=\"post-feature-image\" style=\"background-image:url(img/sample/portfolio-1.jpg);\"></a>
                    <div class=\"row\">
                      <div class=\"col-md-3 post-meta-wrapper\">
                        <p>".$blog['date']."</p>
                        <p>Written by <a href=\"#none\">".$blog['author']."</a></p>
                        <p>Source <a href=\"".$blog['url']."\">".$blog['url']."</a></p>
                      </div><!-- end col -->
                      <div class=\"col-md-8 col-md-offset-1\">
                        <p>".$blog['content']."</p>
                      </div><!-- end col -->
                    </div><!-- end row -->
                  </article><!-- end post -->
                ";
            }
            ?>
<!--
          <div class="pagination-wrapper">
            <ul class="pagination">
              <li class="disabled"><span>Prev</span></li>
              <li class="active"><a href="#none">1</a></li>
              <li><a href="#none">2</a></li>
              <li><a href="#none">3</a></li>
              <li><a href="#none">4</a></li>
              <li><a href="#none">5</a></li>
              <li><a href="#none">Next</a></li>
            </ul>
          </div>
          -->
          <!-- end pagination -->


        </div><!-- end blog-wrapper -->
        <div class="col-md-3 col-md-offset-1 sidebar">
          <div class="widget">
            <h4>Latest Blog Posts</h4>
            <ul>
                <?foreach ($blogEntries as $blog)
                echo"<li> <a href='#".$blog['id']."'>".$blog['title']."</a></li>";
                ?>
            </ul>
          </div><!-- end widget -->

        </div>
      </div><!-- end row -->
      
    </div> <!-- end container -->
    
    <div class="clear"></div>

  <?php
  include "footer.php";
  ?>


  <!-- Le javascript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/zion.js"></script>
    <script type="text/javascript">
      
      
      
    </script>

  </body>
</html>
