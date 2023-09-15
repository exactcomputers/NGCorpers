<div class="modal fade" id="modal-share" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<div class="tt-modal-title">
					<h3>Share Post</h3>
					<a class="pt-close-modal" style="border: 2px solid #000" href="#" data-dismiss="modal">
						<svg class="icon">
							<use xlink:href="#icon-cancel"></use>
						</svg>
					</a>
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> -->
				</div>
			</div>
			<div class="modal-body">
				<div class="tt-modal-coming-soon">
					<div class="tt-item-info info-bottom">
						<form class="form-default">
							<div class="form-group">
								<label for="shareLinkInput" style="font-weight:normal">Copy or share this link:</label>
								<div class="tt-value-wrapper">
									<input type="text" value="<?=$_SERVER['REQUEST_URI']?>" name="post-link" class="form-control" id="shareLinkInput" readonly />
									<span class="tt-value-input" ><i class="fa fa-lg fa-copy"></i></span>
								</div>
							</div>
						</form>
						<div class="mb-4"></div>
						<a target="_blank" href="https://wa.me/?text=<?=$_SERVER['REQUEST_URI']?>" data-action="share/whatsapp/share" title="share on whatsapp" class="tt-icon-btn tt-hover-02 tt-small-indent">
							<i class="tt-icon"><span class="fab fa-lg fa-whatsapp"></span></i>
						</a>
						<a target="_blank" href="https://twitter.com/intent/tweet?text=<?=$_SERVER['REQUEST_URI']?>" title="share on twitter" class="tt-icon-btn tt-hover-02 tt-small-indent">
							<i class="tt-icon"><span class="fab fa-lg fa-twitter"></span></i>
						</a>
						<a target="_blank" href="https://www.facebook.com/sharer.php?u=<?=$_SERVER['REQUEST_URI']?>" title="share on facebook" class="tt-icon-btn tt-hover-02 tt-small-indent">
							<i class="tt-icon"><span class="fab fa-lg fa-facebook"></span></i>
						</a>
						<a target="_blank" href="https://www.linkedin.com/shareArticle?url=<?=$_SERVER['REQUEST_URI']?>" title="share on linkedin" class="tt-icon-btn tt-hover-02 tt-small-indent">
							<i class="tt-icon"><span class="fab fa-lg fa-linkedin"></span></i>
						</a>
						<a href="javascript:void(0);" class="tt-icon-btn tt-hover-02 tt-small-indent clipboard-copy">
							<i class="tt-icon"><span class="far fa-lg fa-copy"></span></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>