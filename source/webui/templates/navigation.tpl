<a class="brand" href="{$base_uri}home/">Ben Roberts</a>

<ul class="nav">
    <li {if $requested_page == "home"}class="active"{/if}>
        <a href="{$base_uri}home/" title="Home">Home</a>
    </li>
    
    <li {if $requested_page == "cv"}class="active"{/if}>
        <a href="{$base_uri}cv/" title="CV">CV</a>
    </li>
    
    <li class="dropdown {if $requested_page == "projects"}active{/if}" data-dropdown="dropdown">
        <a href="#" class="dropdown-toggle" title="Projects">Projects</a>
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
</ul>
