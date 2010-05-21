<?php
    
    /*
     * Template
     * This file contains the common html elements for all pages in the site.
     * _template variables contain the information from the acutal page to be displayed
     */
     
     
    
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $_template['title']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $_meta['base-dir']; ?>/resources/normal.css" />
	<script language="javascript" type="text/javascript" src="<?php echo $_meta['base-dir']; ?>/resources/email.js"></script>
<?php
	// If we have a redirection, implement a meta refresh here
	if( $_template['redirect-to'] ) {
?>
	<meta http-equiv="refresh" content="5;url=<?php echo $_template['redirect-to']; ?>" />
<?php
	}
	
	// Add any header info from the page
	echo $_template['head'];
?>
</head>
<body>
	<div class="header">
		<h1>Ben Roberts</h1>
		<p class="subtitle">MEng Computer Science @ ecs.soton.ac.uk</p>
	</div>

	
	<div class="sidebar">
		<ul>
			<li><a href="<?php echo $_req->construct('page','home'); ?>" title="Homepage">Home</a></li>
			<li><a href="<?php echo $_meta['base-dir']; ?>/files/BenRobertsCv.pdf" title="Curriculum Vitae">Curriculum Vitae</a></li>
			<li><a href="<?php echo $_req->construct('page','projects'); ?>" title="Projects">Projects</a></li>
<?php if( $_session->is_logged_in() ) { ?>
			<li><a href="<?php echo $_req->construct('page','logout'); ?>" title="Logout">Logout</a></li>
<?php } ?>
		</ul>
	</div>
	
	<div class="page">
		<?php
			// Display any page annoucements
			if( count($_template['messages']) > 0 ) {
				foreach( $_template['messages'] as $_message ) {
		?>
		<p class="message">
			<?php echo $_message; ?>
		</p>
		<?php
				}
			}
		?>
		<h2><?php echo $_template['title']; ?></h2>
		<?php
			// Include the main page content
			echo $_template['page'];
		
			// Display any redirections
			if( $_template['redirect-to'] ) {
		?>
		<p class="information">
			About to be redirected... If nothing happens after 10 seconds, please click <a href="<?php echo $_template['redirect-to']; ?>" title="Redirecting">here</a>.
		</p>
		<?php
			}	
		?>
	</div>
	
	<div class="footer">
		<p>
			Copyright &copy; 2008-2010 by Ben Roberts. All rights reserved unless otherwise specified.
		</p>
		<p>
			This file was last modified <?php echo date("j F Y", filemtime($_page)); ?>.
		</p>
	</div>

    <!-- Piwik -->
    <script type="text/javascript">
    var pkBaseURL = (("https:" == document.location.protocol) ? "https://miranda.sihnon.net/logs/" : "http://miranda.sihnon.net/logs/");
    document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
    </script><script type="text/javascript">
        try {
            var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 3);
            piwikTracker.trackPageView();
            piwikTracker.enableLinkTracking();
        } catch( err ) {}
    </script><noscript><p><img src="http://miranda.sihnon.net/logs/piwik.php?idsite=3" style="border:0" alt=""/></p></noscript>
    <!-- End Piwik Tag -->
</body>
</html>
