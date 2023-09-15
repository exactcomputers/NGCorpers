<main id="tt-pageContent" class="tt-offset-small">
    <div class="container">
        <div class="tt-tab-wrapper">
            <div class="tt-wrapper-inner">
                <ul class="nav nav-tabs pt-tabs-default" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link show active" data-toggle="tab" data-name="about" href="#tt-tab-01" role="tab"><span>About Us</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" data-name="guidelines" href="#tt-tab-02" role="tab"><span>Guidelines</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" data-name="faq" href="#tt-tab-03" role="tab"><span>FAQs</span></a>
                    </li>
                    <li class="nav-item tt-hide-xs">
                        <a class="nav-link" data-toggle="tab" data-name="terms" href="#tt-tab-04" role="tab"><span>Terms of Service</span></a>
                    </li>
                    <li class="nav-item tt-hide-md">
                        <a class="nav-link" data-toggle="tab" data-name="privacy" href="#tt-tab-05" role="tab"><span>Privacy</span></a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane show fade active" id="tt-tab-01" role="tabpanel">
                    <div class="tt-layout-tab">
                        <div class="tt-wrapper-inner">
                            <h2 class="tt-title">
                                About NGCorpers
                            </h2>
                            <span id="about-us"></span>
                            <h3 class="tt-title">
                                Admins
                            </h3>
                            <div class="tt-list-avatar">
                                <div class="row" id="admins">
                                    <?php if ( $admins =  httpRequest("users", ["role" => "root"]) ) : 
                                        foreach ($admins as $admin) :
                                            echo '<div class="col-6 col-md-4 col-lg-3">
                                                <a href="#" class="tt-avatar">
                                                    <div class="tt-col-icon">
                                                        <svg class="tt-icon">
                                                            <use xlink:href="#icon-ava-'.get_acronym($admin['username']).'"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="tt-col-description">
                                                        <h6 class="tt-title">'.$admin['fullname'].'</h6>
                                                        <div class="tt-value">@'.$admin['username'].'</div>
                                                    </div>
                                                </a>
                                            </div>';
                                        endforeach; 
                                    endif; ?>
                                </div>
                            </div>
                            <h4 class="tt-title">
                                Moderators
                            </h4>
                            <div class="tt-list-avatar">
                                <div class="row" id="moderators">
                                    <?php if ( $moderators =  httpRequest("users", ["role" => "moderator"]) ) : 
                                        foreach ($moderators as $moderator) :
                                            echo '<div class="col-6 col-md-4 col-lg-3">
                                                <a href="#" class="tt-avatar">
                                                    <div class="tt-col-icon">
                                                        <svg class="tt-icon">
                                                            <use xlink:href="#icon-ava-'.get_acronym($moderator['username']).'"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="tt-col-description">
                                                        <h6 class="tt-title">'.$moderator['fullname'].'</h6>
                                                        <div class="tt-value">@'.$moderator['username'].'</div>
                                                    </div>
                                                </a>
                                            </div>';
                                        endforeach; 
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="table-responsive-sm tt-indent-top">
                            <table class="table-01">
                                <caption>Site Statistics</caption>
                                <thead>
                                    <tr>
                                        <th>Topic</th>
                                        <th>All Time</th>
                                        <th>Last 7</th>
                                        <th>Last 30</th>
                                    </tr>
                                </thead>
                                <tbody class="table-zebra" id="site-statistics">
                                </tbody>
                            </table>
                        </div> -->
                        <div class="tt-wrapper-inner tt-indent-top">
                            <h4 class="tt-title">
                                Contact Us
                            </h4>
                            <span id="contact-us"></span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tt-tab-02" role="tabpanel">
                    <div class="tt-wrapper-inner tt-layout-tab " id="guidelines">
                        <h6 class="tt-title tt-size-lg">
                            Community Rules
                        </h6>
                    </div>
                </div>
                <div class="tab-pane" id="tt-tab-03" role="tabpanel">
                    <div class="tt-wrapper-inner tt-layout-tab " id="faqs">
                        Frequently Asked Questions
                    </div>
                </div>
                <div class="tab-pane" id="tt-tab-04" role="tabpanel">
                    <div class="tt-wrapper-inner tt-layout-tab " id="terms">
                        Terms of Service
                    </div>
                </div>
                <div class="tab-pane" id="tt-tab-05" role="tabpanel">
                    <div class="tt-wrapper-inner tt-layout-tab " id="privacy">
                        Privacy
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
