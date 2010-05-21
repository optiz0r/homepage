<?php

	/*
	 *
	 * 
	 */
	 
	 $_template['title'] = "Projects";

?>
<h2>Development projects:</h2>
<dl>
    <dt><a href="<?php echo $_req->construct("page", "overlay"); ?>" title="Gentoo Overlay">Gentoo Portage Overlay</a></dt>
    <dd>Personally developed software, or miscellaneous ebuilds that can't be found in any other overlay.</dd>

    <dt><a href="https://wiki.sihnon.net/" title="Sihnon Wiki">Sihnon Wiki</a></dt>
    <dd>Documentation for various systems I've configured; mostly for personal reference, but may be useful to others.</dd>

    <dt><a href="https://git.sihnon.net/cgit.cgi/handbrake-cluster.git" title="HandBrakeCluster">HandBrakeCluster</a></dt>
    <dd>A collection of perl scripts to use HandBrakeCLI to batch rip DVD images using multiple machines.</dd>

    <dt><a href="https://git.sihnon.net/cgit.cgi/handbrake-cluster-webui.git/" title="HandBrakeCluster WebUI">HandBrakeCluster WebUI</a></dt>
    <dd>An alternative web-based UI for the HandBrakeCluster scripts, written in PHP.</dd>

</dl>


<h2>University projects:</h2>
<dl>
    <dt><a href="<?php echo $_req->construct("page", "3yp"); ?>" title="Third Year Project">Third Year Project</a></dt>
    <dd>A cross-platform, zero-config file sharing client using public keys and a web of trust for password-less authentication and access control.</dd>
</dl>

