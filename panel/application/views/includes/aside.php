<?php $user = get_active_user(); ?>
<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <?php
                    if($user->img_url == "")
                    {
                        $img_url = base_url("uploads/users_v/default_users/default-user-image.png");  
                    } 
                    else
                    {      
                        $img_url = base_url("uploads/users_v/{$user->user_name}/{$user->img_url}");              
                    }
                    ?>
                    <a href="javascript:void(0)"><img class="img-responsive" src="<?php echo $img_url;?>" alt="avatar"/></a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username"><?php echo $user->full_name ?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small>Web Developer</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?php echo base_url(); ?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("users/update_form/$user->id"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="settings.html">
                                        <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("logout"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Exit</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">
                <?php if(isAllowViewModule("dashboard")):?>
                    <li>
                        <a href="<?php echo base_url("dashboard"); ?>">
                            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                <?php endif; ?>
                
                <?php if((isAllowViewModule("settings")) || (isAllowViewModule("email_settings"))):?>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                        <span class="menu-text">Ayarlar</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                    <?php if(isAllowViewModule("settings")):?>
                        <li><a href="<?php echo base_url("settings") ?>"><span class="menu-text">Site Ayarları</span></a></li>
                    <?php endif; ?>
                    <?php if(isAllowViewModule("email_settings")):?>
                        <li><a href="<?php echo base_url("email_settings")?>"><span class="menu-text">Mail Ayarları</span></a></li>
                    <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(isAllowViewModule("galleries")):?>
                <li>
                    <a href="<?php echo base_url("galleries"); ?>">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Galeriler</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(isAllowViewModule("slides")):?>
                <li>
                    <a href="<?php echo base_url("slides"); ?>">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Slider</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(isAllowViewModule("product")):?>
                <li>
                    <a href="<?php echo base_url("product"); ?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text">Ürünler</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(isAllowViewModule("services")):?>
                <li>
                    <a href="<?php echo base_url("services"); ?>">
                        <i class="menu-icon fa fa-list"></i>
                        <span class="menu-text">Hizmetlerimiz</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if((isAllowViewModule("portfolio_categories")) || (isAllowViewModule("portfolio_categories"))):?>
                    <li class="has-submenu">
                        <a href="javascript:void(0)" class="submenu-toggle">
                            <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                            <span class="menu-text">Portfolyo İşlemleri</span>
                            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                        </a>
                        <ul class="submenu">
                        <?php if(isAllowViewModule("portfolio_categories")):?>
                            <li><a href="<?php echo base_url("portfolio_categories") ?>"><span class="menu-text">Portfolyo Kategori</span></a></li>
                        <?php endif; ?>
                        <?php if(isAllowViewModule("portfolios")):?>
                            <li><a href="<?php echo base_url("portfolios")?>"><span class="menu-text">Portfolyo</span></a></li>
                        <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                    
                <?php if(isAllowViewModule("news")):?>
                <li>
                    <a href="<?php echo base_url("news"); ?>">
                        <i class="menu-icon fa fa-newspaper-o"></i>
                        <span class="menu-text">Haberler</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(isAllowViewModule("courses")):?>
                <li>
                    <a href="<?php echo base_url("courses"); ?>">
                        <i class="menu-icon fa fa-calendar"></i>
                        <span class="menu-text">Eğitimler</span>
                    </a>
                </li>
                <?php endif; ?>


                <?php if(isAllowViewModule("references")):?>
                <li>
                    <a href="<?php echo base_url("references"); ?>">
                        <i class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i>
                        <span class="menu-text">Referanslar</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(isAllowViewModule("brands")):?>
                <li>
                    <a href="<?php echo base_url("brands"); ?>">
                        <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                        <span class="menu-text">Markalar</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(isAllowViewModule("users")):?>
                <li>
                    <a href="<?php echo base_url("users"); ?>">
                        <i class="menu-icon fa fa-user-secret"></i>
                        <span class="menu-text">Kullanıcılar</span>
                    </a>
                </li>
                <?php endif; ?>
                
                <?php if(isAllowViewModule("user_roles")):?>
                <li>
                    <a href="<?php echo base_url("user_roles"); ?>">
                        <i class="menu-icon fa fa-eye"></i>
                        <span class="menu-text">Kullanıcı Yetkisi</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(isAllowViewModule("our_team")):?>
                <li>
                    <a href="<?php echo base_url("our_team"); ?>">
                        <i class="menu-icon fa fa-user-secret"></i>
                        <span class="menu-text">Bizim Ekip</span>
                    </a>
                </li>
                <?php endif; ?>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text">Aboneler</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon zmdi zmdi-lamp zmdi-hc-lg"></i>
                        <span class="menu-text">Popup Hizmeti</span>
                    </a>
                </li>

                <li>
                    <a href="documentation.html">
                        <i class="menu-icon zmdi zmdi-view-web zmdi-hc-lg"></i>
                        <span class="menu-text">Ana Sayfa</span>
                    </a>
                </li>

            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>