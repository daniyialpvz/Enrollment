<?php 
    $role_m = $this->session->userdata['logged_in']['role'];
    $form_m = $this->session->userdata['logged_in']['form_filled'];
?>
 <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?php echo base_url();?>images/login-logo.png" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="<?php echo base_url();?>index.php/Users/logout"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $this->session->userdata['logged_in']['username']; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">SESP</p>
                            </div>
                        </div>
                    </li>
                    <?php if($form_m != 0): ?>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                        <?php if($role_m ==  1 || $role_m ==  6): ?>

                            <!--Enrollment-->
                            <?php if($role_m ==  1 || $role_m ==  6): ?>
                            <a href="<?php echo base_url();?>index.php/Enrollments" class="collapsible-header  waves-effect waves-cyan"><i class="mdi-av-recent-actors"></i>Enrollment</a>
                            <?php endif; ?>
                            <!--Enrollment ends-->

                            <li class="li-hover"><div class="divider"></div></li>

                            <!--Reporting-->
                            <?php if($role_m ==  1 || $role_m ==  6): ?>
                            <a href="<?php echo base_url();?>index.php/Reportings" class="collapsible-header  waves-effect waves-cyan"><i class="mdi-av-recent-actors"></i>Reporting</a>
                            <?php endif; ?>
                            <!--Reporting ends-->

                        <?php endif; ?>
                        </ul>
                    </li>
                                  
                    <li class="li-hover"><div class="divider"></div></li>
                    <!-- <li class="li-hover"><p class="ultra-small margin more-text">Statistics</p></li> -->
                    <!-- <li class="li-hover">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="sample-chart-wrapper">                            
                                    <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <?php endif; ?>
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>