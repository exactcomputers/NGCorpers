<main id="tt-pageContent" >
    <div class="tt-custom-mobile-indent container">
        <div class="tt-categories-title">
            <div class="tt-title">States and their Resources</div>
			<p>Click the corresponding number on the map to view each state resources</p>
        </div>
        <div class="container">
			<div class="tt-tab-wrapper">
				<div class="tt-wrapper-inner">
					<ol id="all-states">
					</ol>
				</div>
			</div>
        </div>
    </div>
</main>
<div id="vmap" style="width: 85%; height: 100%; margin: auto;"></div>
<!--
	Modal States Resources
 -->
 <div class="modal fade" id="modal-state" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="tt-modal-level-up">
				<div class="text-center">
					<h6 class="tt-title" id="state-title">
						State Resource
					</h6>
				</div>
				<div class="tt-all-avatar">
                    <div id="gmap"></div>
                    <div class="tt-list-avatar js-init-scroll">
                        <span id="content"></span>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>