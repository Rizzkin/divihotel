<?php
include $basePath . '/templates/nav.php';
?>
<link rel="stylesheet" href="./css/styles.css">
<div id="myCarousel" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/zeilschool2.jpg" style="width:100%; height: 100%;" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          <p></p>
        </div>
      </div>
    </div>
    <div class="item">
      <img src="img/rsz_villa3.jpg" style="width:100%" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
        </div>
      </div>
    </div>
    <div class="item">
      <img src="img/rsz_villa2.jpg" style="width:100%" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
        </div>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>  
</div>

<div class="container marketing">
  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">

  <div class="featurette" style="margin-top: -200px;">
    <img class="featurette-image img-circle pull-right" src="img/zeilboot.jpg" style="width: 512px; height: 512px;">
    <h2 class="featurette-heading">Zeilschool De Waai<span class="text-muted"> daar sta je versteld van!</span></h2>
    <p class="lead">Makkelijk gezegd, super cursussen en super leuk! Leuk voor de gehele familie!</p>
  </div>

  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image img-circle pull-left" src="img/villa2.jpg" style="width: 512px; height: 512px;">
    <h2 class="featurette-heading">Amazing? Indeed. <span class="text-muted">Best place to relax!</span></h2>
    <p class="lead">Awesome family resort, yes Port of Troy best decission for you! You can relax, lay under the sun. Swim in the swimming pool! Play darts, play pools!</p>
  </div>

  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image img-circle pull-right" src="img/villa3.jpg" style="width: 512px; height: 512px;">
    <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Hell yeah!</span></h2>
    <p class="lead">An amazing mansion! Wanna go on vacation with your entire family, here you can! Seven bedrooms, 4 bathrooms, swimming pool in backyard! </p>
  </div>

  <hr class="featurette-divider">

  <!-- /END THE FEATURETTES -->


  <!-- FOOTER -->
  <footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>This website is developed by BB-8 <a href="https://twitter.com/bb8"><i class="fa fa-twitter fa-1x" aria-hidden="true"></i></a></p>
  </footer>

</div><!-- /.container -->