<a class="brand" href="{$base_uri}home/">Ben Roberts</a>

<ul class="nav">
    <li {if $requested_page == "home"}class="active"{/if}>
        <a href="{$base_uri}home/" title="Home">Home</a>
    </li>
    
    <li {if $requested_page == "cv"}class="active"{/if}>
        <a href="{$base_uri}cv/" title="CV">CV</a>
    </li>
    
    <li class="dropdown {if $requested_page == "projects"}active{/if}" data-dropdown="dropdown">
        <a href="#" class="dropdown-toggle" title="Projects">
            Projects
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="{$base_uri}projects/" title="Projects Home">Home</a></li>
            <li><a href="https://wiki.sihnon.net/" title="Sihnon Wiki">Sihnon Wiki</a></li>
            <li><a href="{$base_uri}projects/gentoo-overlay/" title="Gentoo Portage Overlay">Gentoo Overlay</a></li>
            <li><a href="{$base_uri}projects/sabayon-crepo/" title="Sabayon Entropy Community Repositories">Sabayon Community Repos</a></li>
            <li><a href="{$base_uri}projects/sihnon-framework/" title="Sihnon Framework">Sihnon Framework</a></li>
            <li><a href="{$base_uri}projects/ripping-cluster/" title="RippingCluster">RippingCluster</a></li>
            <li><a href="{$base_uri}projects/status-board/" title="StatusBoard">StatusBoard</a></li>
            <li><a href="{$base_uri}projects/3yp/" title="Third Year Project">Third Year Project</a></li>
        </ul>
    </li>
    
    <li class="dropdown" data-dropdown="dropdown">
        <a href="#" class="dropdown-toggle" title="Code">
            Code
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="http://github.com/optiz0r/" title="GitHub Repositores">GitHub Repositories</a></li>
            <li><a href="https://git.sihnon.net/" title="Sihnon Git Repository Browser">Git Repositories</a></li>
            <li><a href="https://subversion.sihnon.net/" title="Sihnon SVN Repository Browser">Subversion Repositories</a></li>
        </ul>
    </li>
    
    <li class="dropdown" data-dropdown="dropdown">
        <a href="#" class="dropdown-toggle" title="Social Media">
            Social Media
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="https://twitter.com/optiz0r" title="optiz0r on Twitter">Twitter</a></li>
            <li><a href="https://plus.google.com/104283756158326784792/about" title="Ben Roberts on Google+">Google+</a></li>
            <li><a href="http://www.linkedin.com/pub/ben-roberts/19/791/572" title="Ben Roberts on LinkedIn">LinkedIn</a></li>
            <li><a href="http://www.facebook.com/profile.php?id=286108101" title="Ben Roberts on Facebook">Facebook</a></li>
        </ul>
    </li>
</ul>
