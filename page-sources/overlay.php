<?php

	 $_template['title'] = "Gentoo Portage Overlay";
?>
<p>
	The ebuilds in this overlay have mostly been taken from the Gentoo 
	bugzilla, where the packages haven't yet made it into the portage tree. There 
	are also a couple of version-bumped packages, and packages to install my own 
	software on my own machines. Feel free to use these packages, but do so at your 
	own risk.
</p>

<p>
	You can install this overlay using layman. Add the the
	<a href="https://dev.sihnon.net/projects/gentoo-overlay/layman.xml" title="Sihnon overlay url">Sihnon overlay url</a> 
	to your overlays variable in <code>/etc/layman/layman.cfg</code>. Then update 
	the list of overlays with <code class="root">layman -l</code> and add the Sihnon overlay 
	with <code class="root">layman -a sihnon</code>.
</p>

<p>
	The contents of the overlay can be browsed in the 
	<a href="https://dev.sihnon.net/websvn/listing.php?repname=gentoo-overlay" title="Sihnon overlay browser">Sihnon overlay browser</a>.
</p>

