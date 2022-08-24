<?php require '../web.components/header.php'?>
<body class='index home'>
<?php require '../web.components/navmenu.php'?>
<?php require '../queries/password-reset.php'?>
<div class='clearfix'></div>
<!-- Content Wrapper -->



<div class="row-x1" id="content-wrapper" style="transform: none;">
<div class="container" style="transform: none;">
<!-- Main Wrapper -->
<main id="main-wrapper" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">



<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 144.375px;"><div class="main section" id="main" name="Main Posts"><div class="widget Blog" data-version="2" id="Blog1">
<div class="jumbotron"> <div class="page-header"> 
                  <h5 class="page-title">Password Reset</h5>
                  <ol class="breadcrumb"> 
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li> 
                    <li class="breadcrumb-item active" aria-current="page">Reset</li> 
                  </ol> 
                </div>

          <div class="row"> 
            <div class="col-lg-12"> 
              <div class="card"> 
                <div class="card-header"> 
                  <div class="card-title"><h5><strong><?php echo $user_name; ?></strong></h5></div> 
                 <!--  <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fa fa-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fa fa-times"></i></a> 
                  </div>  -->
                </div> 
            <?php echo $message; ?>
              <div class="row">
                <div class="col-sm- 12 col-md-12">
                  <div class="card-body">
<form method="post" action="" id="passwd-reset-form"> 
                  <div class="row mb-2"> 
                    <div class="col-auto user-profpicture"> 
                      <img class="avatar brround avatar-xl" src="../assets/images/<?php echo getUserpic($user_id);?>" alt="Avatar-img"/>
                    </div> 
               
                    <div class="form-group"> 
                      <label class="form-label">New Password</label> <input type="password" id="password" name="password" class="form-control" /> <!-- value="<?php echo $password; ?>" -->
                    </div> 
                    <div class="form-group"> 
                      <label class="form-label"> Confirm Password</label> <input type="password" id="confirmpassword" name="confirmpassword" class="form-control"> 
                    </div> 
                    
                    <div class="form-footer"> 
                      <button type="submit" class=" btn btn-primary btn-block pfsetting1" name="passwd-reset">Save</button>
                    </div> 
                </form> 
            

</div></div></div></div></div></div>
</div></div><div class="clearfix"></div><div id="custom-ads">
	<? echo $postAds2; ?>

</div></div></main>

<?php require '../web.components/sidenav.php'; ?>

</div>
</div>
<div class='clearfix'></div>
<?php require '../web.components/footer.php'; ?>
<?php require '../web.components/default-javascripts.php'; ?>
<?php require '../web.components/javascripts.php'; ?>
</body>

</html>