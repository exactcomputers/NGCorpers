<?php 
if ( $results = httpRequest("users/profile/badges", []) ) :
    ['badges' => $badges, "_id" => $id] = $results;
    foreach ($badges as $item) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="tt-item">
                        <div class="h1 d-flex align-items-center">
                            <a href="javascript:;" class="badge-icon badge-type-bronze">
                                <i class="tt-icon"><svg class="svg-icon d-icon"><use xlink:href="#icon-user"></use></svg></i>
                            </a>
                            <h3 class="tt-title"><?= ucwords($item) ?></h3>
                        </div>
                        <!-- <div class="tt-item-layout">
                           <div class="innerwrapper">
                                description
                           </div>
                        </div> -->
                    </div>
                </div>
    <?php endforeach;
endif;  
?>