 <ul id="chat-out" class="side-nav rightside-navigation">
                    <li class="li-hover">
                        <ul class="chat-collapsible" data-collapsible="expandable">
                        <li>
                            <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Tagged Notification</div>
                            <?php

                            if(!empty($this->session->userdata['tagged_notification']['notifications'])):
                            foreach ($this->session->userdata['tagged_notification']['notifications'] as $key => $value):?>
                            <div class="collapsible-body recent-activity">
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-notification-vibration"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#"><?php echo $value->tagged_date_time; ?></a>
                                        <p><?php echo $value->agency." <strong> tagged </strong> ".$value->imp_agency?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </li>
                        </ul>
                    </li>
                </ul>