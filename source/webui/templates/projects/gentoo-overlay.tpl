<h2>Gentoo Portage Overlay</h2>

<p>
    The ebuilds in this overlay have mostly been taken from the Gentoo 
    bugzilla, where the packages haven't yet made it into the portage tree. There 
    are also a couple of version-bumped packages, and packages to install homegrown 
    software on local machines. Feel free to use these packages, but do so at your 
    own risk.
</p>

<p>
    You can install this overlay using layman. Add the the
    <a href="https://dev.sihnon.net/projects/gentoo-overlay/layman.xml" title="Sihnon overlay url">Sihnon overlay url</a> 
    to your overlays variable in <code class="file">/etc/layman/layman.cfg</code>. Then update 
    the list of overlays with <code class="root">layman -L</code> and add the Sihnon overlay 
    with <code class="root">layman -a sihnon</code>.
</p>

<p>
    The contents of the overlay can be browsed in the 
    <a href="https://git.sihnon.net/cgit.cgi/gentoo-overlay.git/" title="Sihnon Git repository browser">Sihnon Git repository browser</a>.
</p>
