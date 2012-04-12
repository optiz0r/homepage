<h2>Third Year Project</h2>

<p>
    My third year dissertation was a research/design/build project investigating the use of RSA keys and a web-of-trust to provide
    simple and secure yet password-less and zero-configuration file sharing between users located on the same network segment. 
</p>
<p>
    The source code is currently archived on CD, but I will attempt to locate and upload a copy of the version control repository in due course.
    In the meantime, for anyone who might be interested in the rationale, design decisions and implementation detail, please see the
    <a href="{$base_uri}files/3yp/project-report.pdf" title="RSDSS Post Project Report">post-project report</a>.
</p>

<h3>Releases</h3>
<p>
    The project was not completed beyond an alpha stage, so the binaries below are strictly for testing purposes only and are definitely
    not ready for any kind of production use. These are provided as-is with no guarantees for functionality or safetly!
    
    <ul>
        <li><a href="{$base_uri}files/3yp/rsdss_1.01_i386.deb" title="Ubuntu x86 deb package">rsdss-1.01-i386.deb</a></li>
        <li><a href="{$base_uri}files/3yp/rsdss-1.0.2-1-i386.tar.bz2" title="Linux x86 binary archive">rsdss-1.0.1-i386.tar.bz2</a></li>
        <li><a href="{$base_uri}files/3yp/rsdss-1.0.2-win32.zip" title="Windows 32-bit zip archive">rsdss-1.0.2-win32.zip</a></li>
    </ul>
</p>

<h3>Screenshots</h3>
<ul id="rsdss-screenshots" class="thumbnails">
    <li class="span4">
        <div class="thumbnail">
            <img src="{$base_uri}images/3yp/wizard-name.png" alt="Name selection wizard" />
            <a href="{$base_uri}images/3yp/wizard-name.png" class="viewmore" title="Name selection wizard">View larger</a>
            <h5>Wizard - Name selection</h5>
            <p>
                The first question in the startup wizard - selecting a name for yourself so as to be recognisable by other people.
            </p>
        </div>
    </li>
    <li class="span4">
        <div class="thumbnail">
            <img src="{$base_uri}images/3yp/wizard-shares.png" alt="Shared folder selection wizard" />
            <a href="{$base_uri}images/3yp/wizard-shares.png" class="viewmore" title="Shared folder selection wizard">View larger</a>
            <h5>Wizard - Shared folders</h5>
            <p>
                The second question in the startup wizard - selecting the folders that will be shared to the network.
            </p>
        </div>
    </li>
    <li class="span4">
        <div class="thumbnail">
            <img src="{$base_uri}images/3yp/new-peer.png" alt="New Peer dialog" />
            <a href="{$base_uri}images/3yp/new-peer.png" class="viewmore" title="New peer dialog">View larger</a>
            <h5>New Peer</h5>
            <p>
                The dialog presented when a new, previously unknown person wishes to start sharing files with you.
            </p>
        </div>
    </li>
    <li class="span4">
        <div class="thumbnail">
            <img src="{$base_uri}images/3yp/people.png" alt="People" />
            <a href="{$base_uri}images/3yp/people.png" class="viewmore" title="People">View larger</a>
            <h5>People</h5>
            <p>
                Settings dialog showing the list of all people you've communicated with previously, and options to change the trust level
                for each person - allowing people you trust to introduce new peers to you automatically.
            </p>
        </div>
    </li>
    <li class="span4">
        <div class="thumbnail">
            <img src="{$base_uri}images/3yp/introductions.png" alt="Introductions" />
            <a href="{$base_uri}images/3yp/introductions.png" class="viewmore" title="Introductions">View larger</a>
            <h5>Introductions</h5>
            <p>
               Settings dialog showing the list of users who have verified your identity which is automatically sent to all new peers
               you wish to communicate with in an attempt to find some common friends and avoid the need to ask any security questions.
            </p>
        </div>
    </li>
    <li class="span4">
        <div class="thumbnail">
            <img src="{$base_uri}images/3yp/changed-peer.png" alt="Changed peer warning" />
            <a href="{$base_uri}images/3yp/changed-peer.png" class="viewmore" title="Changed peer warning">View larger</a>
            <h5>Changed Peer</h5>
            <p>
                Warning dialog displayed when the key for a previously known person has changed. This could be innocous such as a reinstall 
                or name collision or could be the sign of a malicious user trying to access unauthorised shared files.
            </p>
        </div>
    </li>
    <li class="span4">
        <div class="thumbnail">
            <img src="{$base_uri}images/3yp/shares.png" alt="Shares" />
            <a href="{$base_uri}images/3yp/shares.png" class="viewmore" title="Shares">View larger</a>
            <h5>shares</h5>
            <p>
                Settings dialog showing the list of shared folders.
            </p>
        </div>
    </li>
    <li class="span4">
        <div class="thumbnail">
            <img src="{$base_uri}images/3yp/browser.png" alt="Browser" />
            <a href="{$base_uri}images/3yp/browser.png" class="viewmore" title="Browser">View larger</a>
            <h5>Browser</h5>
            <p>
                File browser allowing you to list the files shared by other users and download to your own machine.
            </p>
        </div>
    </li>
    <li class="span4">
        <div class="thumbnail">
            <img src="{$base_uri}images/3yp/cli.png" alt="Command line interface" />
            <a href="{$base_uri}images/3yp/cli.png" class="viewmore" title="Command line interface">View larger</a>
            <h5>CLI</h5>
            <p>
                Screenshot showing the simple CLI tool for displaying the shares of a remote user and downloading files.
            </p>
        </div>
    </li>
    <li class="span4">
        <div class="thumbnail">
            <img src="{$base_uri}images/3yp/security.png" alt="Security" />
            <a href="{$base_uri}images/3yp/security.png" class="viewmore" title="Security">View larger</a>
            <h5>Security</h5>
            <p>
                Settings dialog showing the security tab to assign permissions to different users and finely control which files can be accessed.
            </p>
        </div>
    </li>
    <li class="span4">
        <div class="thumbnail">
            <img src="{$base_uri}images/3yp/settings.png" alt="Advanced Settings" />
            <a href="{$base_uri}images/3yp/settings.png" class="viewmore" title="Advanced Settings">View larger</a>
            <h5>Advanced Settings</h5>
            <p>
                Settings dialog granting options to control advanced options within the application.
            </p>
        </div>
    </li>
</ul>
