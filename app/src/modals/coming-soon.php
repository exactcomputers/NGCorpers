<!--
	Shop products adverts
 -->
 <div class="modal fade" id="modal-coming-soon" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="tt-modal-coming-soon">
				<div class="text-center">
					<h2 class="tt-title">
						Coming Soon!
                    </h2>
					<p>Free Product Advertisement</p>
				</div>
                <?php if ( !isset($_SESSION['accessToken']) ): ?>
                <div class="text-center">
                    <p>Don't have an account? </p>
                    <a href="signup" class="tt-option-btn">
                        <span class="btn btn-secondary">Sign Up!</span>
                    </a>
                </div>
                <?php endif; ?>
			</div>
		</div>
	</div>
</div>