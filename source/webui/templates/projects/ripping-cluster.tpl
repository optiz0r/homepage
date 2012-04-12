<h2>RippingCluster</h2>

<p>
    RippingCluster provides a web interface for managing a cluster of nodes for transcoding DVDs. The application provides the means
    to list available sources and prepare a list of titles to rip over a collection of nodes using HandBrake and Gearman.
</p>

<div class="container">
    <div class="row">
        <div class="span6 column">
            <div class="thumbnail">
                <img src="{$base_uri}images/ripping-cluster/overview.png" alt="RippingCluster Overview" />
            </div>
        </div>
        <div class="span6 column">
            <h3>Features</h3>
            <ul>
                <li>Multiple machines can participate in transcoding jobs using a worker daemon.</li>
                <li>Single WebUI to prepare and manage jobs.</li>
                <li>Batch multiple titles from a single DVD source (perfect for TV boxsets).</li>
                <li>Select audio and subtitle streams to include with the rip.</li>
            </ul>
        </div>
    </div>
    
    <div class="row">
        <div class="span12">
            <h3>Source</h3>
            <p>
                View or clone a copy of the Git repositories from one of the mirrors listed below:
            </p>
            <ul>
                <li><a href="https://git.sihnon.net/cgit.cgi/handbrake-cluster-webui.git/" title="Sihnon Mirror">Sihnon Mirror</a></li>
                <li><a href="https://github.com/optiz0r/handbrake-cluster-webui/" title="GitHub Mirror">GitHub Mirror</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="span12">
            <h3>Screenshots</h3>
            <ul class="thumbnails">
                <li class="span4">
                    <div class="thumbnail">
                        <img src="{$base_uri}images/ripping-cluster/setup-rip.png" alt="Setup Rip" />
                        <a href="{$base_uri}images/ripping-cluster/setup-rip.png" class="viewmore">View larger</a>
                        <h5>Setup Rip</h5>
                        <p>
                            Configure the titles, audio and subtitle tracks to be ripped.
                        </p>
                    </div>
                </li>
                <li class="span4">
                    <div class="thumbnail">
                        <img src="{$base_uri}images/ripping-cluster/jobs.png" alt="Job history" />
                        <a href="{$base_uri}images/ripping-cluster/jobs.png" class="viewmore">View larger</a>
                        <h5>Job History</h5>
                        <p>
                            View all jobs in detail, with options to re-run or remove info on past jobs.
                        </p>        
                    </div>
                </li>
            </ul>
        </div>
</div>
