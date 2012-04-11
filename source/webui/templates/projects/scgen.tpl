<h2>Cisco Switch Configuration Generator</h2>

<p>
    SCGen is a Cisco Switch Configuration Generator for a substancial portion of 
    the available commands in a modern IOS. The tool runs entirely client side in
    a web browser and can be run either from a local filesystem or via a
    webserver.
</p>

<div class="container">
    <div class="row">
        <div class="span7 column">
            <h3>Features</h3>
            <ul>
                <li>Configure global options such as hostname, logging, ntp, and ip hosts/routes</li>
                <li>Configure aliases</li>
                <li>Configure VLANs, Interfaces and SVIs</li>
                <li>Produces a config you can copy/paste onto a switch</li>
                <li>Customisable using an external JSON file</li>
                <li>Tested on chromium 18
            </ul>

            <h3>Demo</h2>
            <p>
                A copy of this tool is hosted at 
                <a href="http://demo.sihnon.net/scgen/" title="SCGen Demo">http://demo.sihnon.net/scgen/</a>.
            </p>
        </div>
        <div class="span5 column">
            <img class="span5" src="{$base_uri}images/scgen/overview.png" alt="SCGen Overview" />
        </div>
    </div>

    <div class="row">
        <div class="span12">
            <h3>Source</h3>
            <p>
                View or clone a copy of the Git repositories from one of the mirrors listed below:
            </p>
            <ul>
                <li><a href="https://git.sihnon.net/cgit.cgi/scgen.git/" title="Sihnon Mirror">Sihnon Mirror</a></li>
                <li><a href="https://github.com/optiz0r/scgen/" title="GitHub Mirror">GitHub Mirror</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="span12">
            <h3>Screenshots</h3>
            <ul class="thumbnails">
                <li class="span4">
                    <div class="thumbnail">
                        <img src="{$base_uri}images/scgen/alias-vlan.png" alt="Alias and VLAN configuration" />
                        <a href="{$base_uri}images/scgen/alias-vlan.png" class="viewmore">View larger</a>
                        <h5>Alias and VLANs</h5>
                        <p>
                            Define aliases and VLAN names.
                        </p>
                    </div>
                </li>
                <li class="span4">
                    <div class="thumbnail">
                        <img src="{$base_uri}images/scgen/interfaces.png" alt="Interface configuration" />
                        <a href="{$base_uri}images/scgen/interfaces.png" class="viewmore">View larger</a>
                        <h5>Interfaces</h5>
                        <p>
                            Configure interfaces and port channels using predefined port types with optional parameters.
                        </p>        
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

