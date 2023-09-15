<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>NGCorpers Forum</title>
    <base href="http://localhost/exact/ngcorpers/app/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="NGCorpers, Corpers, Naija Corpers Forum">
    <meta name="description" content="NGCorpers Forum">
    <meta name="author" content="Exactcomputers">

    <meta property="og:title" content="NGCorpers Forum">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://ngcorpers.com/">
    <meta property="og:description" content="NGCorpers forum, building corpers for an excellent entrepreneurship.">
    <meta property="og:image" content="logo.png">
    <!-- styles -->
    <link rel="stylesheet" href="dist/css/nc.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="dist/css/custom.css">
    <link rel="stylesheet" href="dist/css/toastr.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href="dist/css/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    <style>
        html, body {padding: 0;margin: 0;width: 100%;height: 100%;}
        #vmap {width: 100%;height: 100%;}
        .ck-editor__editable[role="textbox"] {min-height: 200px;background: #e2e7ea!important;color: #666f74!important;}
        .ck-content {background: #e2e7ea;color: #666f74;}
    </style>
    <!-- Favicon-->    
    <link rel="shortcut icon" href="dist/favicon/favicon.ico">
    <!-- manifest file -->
    <link rel='manifest' href='manifest.json'>
    <!-- ios support -->
    <link rel="apple-touch-icon" href="dist/images/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-status-bar" content="#f8f9fb" />
    <meta name="theme-color" content="#000000" />
</head>
<body>
<!-- <div id="loading">
    <img id="loading-img" src="preloader.gif" style="display:none;"/>
</div> -->
<!-- tt-mobile menu -->
<nav class="panel-menu" id="mobile-menu">
    <ul></ul>
    <div class="mm-navbtn-names">
        <div class="mm-closebtn">
            Close
            <div class="tt-icon">
                <svg>
                  <use xlink:href="#icon-cancel"></use>
                </svg>
            </div>
        </div>
        <div class="mm-backbtn">Back</div>
    </div>
</nav>
<header id="tt-header">
    <div class="container">
        <div class="row tt-row no-gutters">
            <div class="col-auto">
                <!-- toggle mobile menu -->
                <a class="toggle-mobile-menu" href="#">
                    <svg class="tt-icon">
                      <use xlink:href="#icon-menu_icon"></use>
                    </svg>
                </a>
                <!-- /toggle mobile menu -->
                <!-- logo -->
                <div class="tt-logo">
                    <a href="./"><img src="dist/images/logo.png" alt="NGCorpers"><strong class="d-none">NGCorpers</strong></a>
                </div>
                <!-- /logo -->
                <!-- desctop menu -->
                <div class="tt-desktop-menu"><?php include buildFile('navbar');?></div>
                <!-- /desctop menu -->
                <!-- tt-search -->
                <div class="tt-search">
                    <!-- toggle -->
                    <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                       <svg class="tt-icon">
                          <use xlink:href="#icon-search"></use>
                        </svg>
                    </button>
                    <!-- /toggle -->
                    <!-- <form class="search-wrapper"> -->
                        <div class="search-wrapper search-form">
                            <input type="text" class="tt-search__input search-input" placeholder="Search">
                            <button class="tt-search__btn" type="submit">
                               <svg class="tt-icon">
                                  <use xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                             <button class="tt-search__close">
                               <svg class="tt-icon">
                                  <use xlink:href="#cancel"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="search-results">
                            <!-- <button type="button" class="tt-view-all" data-toggle="modal" data-target="#modalAdvancedSearch">Advanced Search</button> -->
                        </div>
                    <!-- </form> -->
                </div>
                <!-- /tt-search -->
            </div>
            <div class="col-auto ml-auto" id="account">

                <div class="tt-user-info d-flex justify-content-center">
                    <a href="#" class="tt-btn-icon" data-toggle="modal" data-target="#modal-notification" >
                        <i class="tt-icon"><svg><use xlink:href="#icon-notification"></use></svg></i>
                        <!-- <span>6</span> -->
                    </a>
                    <a href="profile"><div class="tt-avatar-icon tt-size-md display-avatar"></div></a>
                    <div class="dropdown">
                        <a data-toggle="dropdown" href="javascript:void(0)">
                            <h4 class="dropdown-header px-2 mt-2 ">
                                <!-- <span class="displayname"></span> -->
                                <b class="caret">&nbsp;</b>
                            </h4>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation" class="nav_link">
                                <a role="menuitem" href="profile" class="tt-icon-btn">
                                <i class="tt-icon"><svg><use xlink:href="#icon-user"></use></svg></i>
                                <span>Profile</span> </a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" href="javascript:;" id="logout" class="tt-icon-btn">
                                <i class="tt-icon"><svg><use xlink:href="#icon-exit"></use></svg></i>
                                <span>Log Out</span></a>
                            </li>
                        </ul>
                    </div>                     
                </div>

            </div>
        </div>
    </div>
</header>
            