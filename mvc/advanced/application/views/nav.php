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
                if(!isset($session['logged_in']))
                {
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
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>