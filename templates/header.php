<!DOCTYPE HTML>
<html lang="en-gb">
    <head>       
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Programming">
        <meta name="author" content="Jeter">
        <meta name="keywords" content="Programming, java, php, sql, chatex, admincmd, bukkit, plugin, spigot, bungeecord"/>
        <link rel="icon" href="/favicon.ico">          

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <!-- Bulma Version 0.8.2-->
        <link rel="stylesheet" href="https://unpkg.com/bulma@0.8.2/css/bulma.min.css" />
        <?php if ($usedesign) { ?>
            <link rel="stylesheet" type="text/css" href ="/css/design.css">
        <?php } ?>
    </head>

    <body>        
        <section class="hero is-info is-fullheight">
            <?php
            if ($usedesign) {
                ?>
                <div class="hero-head">
                    <nav class="navbar">
                        <div class="container">
                            <div class="navbar-brand">
                                <a class="navbar-item" href="../">
                                    <img src="http://bulma.io/images/bulma-type-white.png" alt="Logo">
                                </a>
                                <span class="navbar-burger burger" data-target="navbarMenu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                            <div id="navbarMenu" class="navbar-menu">
                                <div class="navbar-end">
                                    <span class="navbar-item">
                                        <a class="button is-white is-outlined" href="#">
                                            <span class="icon">
                                                <i class="fa fa-home"></i>
                                            </span>
                                            <span>Home</span>
                                        </a>
                                    </span>
                                    <span class="navbar-item">
                                        <a class="button is-white is-outlined" href="#">
                                            <span class="icon">
                                                <i class="fa fa-superpowers"></i>
                                            </span>
                                            <span>Examples</span>
                                        </a>
                                    </span>
                                    <span class="navbar-item">
                                        <a class="button is-white is-outlined" href="#">
                                            <span class="icon">
                                                <i class="fa fa-book"></i>
                                            </span>
                                            <span>Documentation</span>
                                        </a>
                                    </span>
                                    <span class="navbar-item">
                                        <a class="button is-white is-outlined" href="https://github.com/BulmaTemplates/bulma-templates/blob/master/templates/landing.html">
                                            <span class="icon">
                                                <i class="fa fa-github"></i>
                                            </span>
                                            <span>View Source</span>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <?php
            }
            ?>

            <div class="hero-body">
                <!-- Template here -->
