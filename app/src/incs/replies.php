<?php if ( count($row['comments']) > 0 ) : 
    foreach ($row['comments'] as $comments) :
        ["_id" => $id, "user" => $user, "text" => $text, "date" => $date] = $comments; 
?>    
            <div class="tt-item">
                 <div class="tt-single-topic">
                    <div class="tt-item-header pt-noborder">
                        <div class="tt-item-info info-top">
                            <div class="tt-avatar-icon">
                                <i class="tt-icon"><svg><use xlink:href="#icon-ava-<?= get_acronym($user['username']) ?>"></use></svg></i>
                            </div>
                            <div class="tt-avatar-title">
                               <a href="#" data-id="<?= $id ?>"><?= $user['username'] ?></a>
                            </div>
                            <a href="#" class="tt-info-time">
                                <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i><?= date("j M, Y", strtotime($date)) ?>
                            </a>
                        </div>
                    </div>
                    <div class="tt-item-description">
                        <?= $text ?>
                    </div>
                </div>
            </div>
            <!-- <div class="tt-item">
                 <div class="tt-single-topic">
                    <div class="tt-item-header pt-noborder">
                        <div class="tt-item-info info-top">
                            <div class="tt-avatar-icon">
                                <i class="tt-icon"><svg><use xlink:href="#icon-ava-v"></use></svg></i>
                            </div>
                            <div class="tt-avatar-title">
                               <a href="#">vickey03</a>
                            </div>
                            <a href="#" class="tt-info-time">
                                <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>6 Jan,2019
                            </a>
                        </div>
                    </div>
                    <div class="tt-item-description">
                        Finally!<br>
                        Are there any special recommendations for design or an updated guide that includes new preview sizes, including retina displays?
                        <div class="topic-inner-list">
                            <div class="topic-inner">
                                <div class="topic-inner-title">
                                    <div class="topic-inner-avatar">
                                        <i class="tt-icon"><svg><use xlink:href="#icon-ava-s"></use></svg></i>
                                    </div>
                                    <div class="topic-inner-title"><a href="#">summit92</a></div>
                                </div>
                                <div class="topic-inner-description">
                                    Finally!<br>
                                    Are there any special recommendations for design or an updated guide that includes new preview sizes, including retina displays?
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tt-item-info info-bottom">
                        <a href="#" class="tt-icon-btn">
                            <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                            <span class="tt-text">671</span>
                        </a>
                        <a href="#" class="tt-icon-btn">
                             <i class="tt-icon"><svg><use xlink:href="#icon-dislike"></use></svg></i>
                            <span class="tt-text">39</span>
                        </a>
                        <a href="#" class="tt-icon-btn">
                             <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                            <span class="tt-text">12</span>
                        </a>
                        <div class="col-separator"></div>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                        </a>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-flag"></use></svg></i>
                        </a>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                             <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                        </a>
                    </div>
                </div>
            </div> -->    
<?php endforeach;
    endif; 
?>