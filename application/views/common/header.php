<?php if(isset($browse)){ $class='active';} else{ $class='';}?>
<!-- Header -->
<!DOCTYPE HTML>
<html>
    <head>
        <title>ATGO</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/main.css" />
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/skel.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/util.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/main.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery-1.9.0.min.js"></script>
    </head>
<body>
    
<header id="header">
    <h1><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/frontend/images/ATGO_Logo_01.png" class="logo_t" alt=""/></a></h1>
    <nav class="links">
            <ul>
                    <li><a href="<?php echo base_url();?>" class="<?php if(empty($class)) { echo 'active';}?>">Feed</a></li>
                    <li><a class="<?php echo $class;?>" href="<?php echo base_url();?>home/browseCategory">Browse</a></li>
            </ul>
    </nav>
    <nav class="main">
        <ul>
            
            <?php if(isset($this->session->userdata['User']))
            { ?>
                 <li><a class="lg_tb"><?php echo $this->session->userdata['User']['c_name'] ?></a></li>
                 <li><a href="<?php echo base_url();?>customer/logout" class="lg_tb"><i class="icon fa-sign-out"></i></a></li>
            <?php } else { ?>
                 <li><a href="<?php echo base_url();?>customer/login" class="lg_tb"><i class="icon fa-sign-in"></i></a></li>
            <?php } ?>
                
                <li class="search">
                        <a class="fa-search" href="#search">Search</a>
                        <form id="search" method="POST" action="<?php echo base_url()?>home/search">
                                <input type="text" name="query" placeholder="Search" />
                        </form>
                </li>
                <li class="menu">
                    <a class="fa-bars" href="#menu">Menu</a>
                </li>
        </ul>
    </nav>
</header>

<!-- Menu -->
<section id="menu">
    <!-- Search -->
    <section>
            <form class="search" method="get" action="#">
                    <input type="text" name="query" placeholder="Search" />
            </form>
    </section>
<!-- Links -->
    <section>
        <ul class="links">
            <li>
                    <a href="#">
                            <h3>Lorem ipsum</h3>
                            <p>Feugiat tempus veroeros dolor</p>
                    </a>
            </li>
            <li>
                    <a href="#">
                            <h3>Dolor sit amet</h3>
                            <p>Sed vitae justo condimentum</p>
                    </a>
            </li>
            <li>
                    <a href="#">
                            <h3>Feugiat veroeros</h3>
                            <p>Phasellus sed ultricies mi congue</p>
                    </a>
            </li>
            <li>
                    <a href="#">
                            <h3>Etiam sed consequat</h3>
                            <p>Porta lectus amet ultricies</p>
                    </a>
            </li>
        </ul>
    </section>
<!-- Actions -->
    <section>
            <ul class="actions vertical">
                    <li><a href="<?php echo base_url();?>customer/registration" class="button big fit">Sign up</a></li>
            </ul>
    </section>

</section>
 <div id="wrapper">