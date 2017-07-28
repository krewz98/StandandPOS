<!--Header-->
<header id="topnav" class="navbar navbar-default navbar-fixed-top" role="banner">

    <div class="logo-area">

				                <span class="toolbar-trigger toolbar-icon-bg">
                    <a href="dashboard"  title="Homepage">
                        <span class="icon-bg">
                            <i class="fa fa-home"></i>
                        </span>
                    </a>
                </span>

        <a class="navbar-brand" href="#">JCore</a>



    </div><!-- logo-area -->

    <ul class="nav navbar-nav toolbar pull-right">



        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="ti ti-fullscreen"></i></span></i></a>
        </li>
		

        <li class="dropdown toolbar-icon-bg">
            <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                <img class="img-circle" src="<?php echo $this->session->user_photo; ?>" alt="" />
            </a>
            <ul class="dropdown-menu userinfo arrow">
                <li><a href="#"><i class="ti ti-user"></i><span>Profile</span></a></li>
                <li><a href="login/transaction/logout"><i class="ti ti-shift-right"></i><span>Sign Out</span></a></li>
            </ul>
        </li>

    </ul>

</header><!--Header-->