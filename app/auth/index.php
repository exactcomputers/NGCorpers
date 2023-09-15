<?php
include path("inc", "header");
if ( query_uri('auth') && file_exists(path(__DIR__, query_uri('auth'))) ) :
	include path(__DIR__, query_uri('auth'));
else :
	include path(__DIR__, "login");
endif;
include path("inc", "footer"); ?>
