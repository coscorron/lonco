<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.php" class="site_title"><img src="images/logo.png"><span>Lonco</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Bienvenido,</span>
        <h2><?php echo $_SESSION["nombre"]; ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />
    <?php
      include("left.php");
      include("menu_footer.php");
    ?>
  </div>
</div>

<?php
  include("top.php");
?>
