	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">EnergCloud</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <?php
                $button_style = 'btn-danger';
                $link = 'main/logout';
                $link_text = 'Logout';
                if(!isset($session['logged_in']))
                {
                  $button_style = 'btn-primary';
                  $link = 'signin';
                  $link_text = 'Signin';
              ?> 
                <li class="active"><a href="#">Home</a></li>
              <?php   
                }
                else
                {
              ?>
                <li><a href="#about">Dashboard</a></li>
                <li><a href="#contact">Profile</a></li>
              <?php 
                }
              ?>
            </ul>
                <a class="btn <?php echo $button_style; ?> pull-right" href="<?php echo base_url($link) .'">'.$link_text; ?></a>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>