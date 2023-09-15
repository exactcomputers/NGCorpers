<main id="tt-pageContent" >
<?php 
if ( isset($_GET['slug']) ) : 
        include path("src", "single-categories");
else: ?>
    <div class="tt-custom-mobile-indent container">
        <div class="tt-categories-title">
            <div class="tt-title">Categories</div>
            <div class="tt-search">
                <form class="search-wrapper">
                    <div class="search-form">
                        <input type="text" class="tt-search__input" placeholder="Search Categories">
                        <button class="tt-search__btn" type="submit">
                           <svg class="tt-icon">
                              <use xlink:href="#icon-search"></use>
                            </svg>
                        </button>
                         <button class="tt-search__close">
                           <svg class="tt-icon">
                              <use xlink:href="#icon-cancel"></use>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="tt-categories-list">
            <div class="row">
            <?php
            $results = httpRequest("posts/categories", []);
            if ( $results ) :
                $i = 0;
                foreach ($results as $category) : 
                    $i++;

                    $iStr = str_pad($i, 2, "0", STR_PAD_LEFT);
                    
                    ['_id' => $id, 'slug' => $slug, 'description' => $description, 'threads' => $threads] = $category;

                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="tt-item">
                            <div class="tt-item-header">
                                <ul class="tt-list-badge">
                                    <li><a href="cat/<?= $slug ?>"><span class="tt-color<?=$iStr?> tt-badge"><?= ucfirst($slug) ?></span></a></li>
                                </ul>
                                <h6 class="tt-title"><a href="cat/<?= $slug ?>">Threads - <?= count($threads) ?></a></h6>
                            </div>
                            <div class="tt-item-layout">
                                <div class="innerwrapper">
                                    <?= $description ?>
                                </div>
                                <div class="innerwrapper">
                                    <h6 class="tt-title">Similar TAGS</h6>
                                    <ul class="tt-list-badge">
                                    <?php 
                                        $tags = array_column($threads, 'tags');
                                        array_map(function($tag) {
                                            printf('<li><span class="tt-badge">%s</span></li>', trim($tag));
                                        }, mergeArrays($tags));
                                    ?>
                                    </ul>
                                </div>
                                <!-- <a href="javascript:;" class="tt-btn-icon">
                                    <i class="tt-icon favorite"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                                </a> -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- <div class="col-12">
                    <div class="tt-row-btn">
                        <button type="button" class="btn-icon js-topiclist-showmore">
                            <svg class="tt-icon">
                            <use xlink:href="#icon-load_lore_icon"></use>
                            </svg>
                        </button>
                    </div>
                </div> -->
            <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
</main>

