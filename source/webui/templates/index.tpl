<!DOCTYPE html>
<html>
    <head>
        <title>{$title}</title>
        
        <!-- JQuery //-->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
        <!-- JQuery Plugins //-->
        <script type="text/javascript" src="{$base_uri}scripts/3rdparty/jquery.chained.js"></script>
        
        <!-- Less //-->
        <script type="text/javascript" src="{$base_uri}scripts/3rdparty/less-1.1.5.min.js"></script>
        
        <!-- Bootstrap //-->
        <script type="text/javascript" src="{$base_uri}scripts/3rdparty/bootstrap-alerts.js"></script>
        <script type="text/javascript" src="{$base_uri}scripts/3rdparty/bootstrap-twipsy.js"></script>
        <script type="text/javascript" src="{$base_uri}scripts/3rdparty/bootstrap-popover.js"></script>
        <script type="text/javascript" src="{$base_uri}scripts/3rdparty/bootstrap-dropdown.js"></script>
        <script type="text/javascript" src="{$base_uri}scripts/3rdparty/bootstrap-tabs.js"></script>
        <script type="text/javascript" src="{$base_uri}scripts/3rdparty/bootstrap-modal.js"></script>
        
        <!-- Local //-->
        <script type="text/javascript" src="{$base_uri}scripts/main.js"></script>
        
        <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/smoothness/jquery-ui.css" rel="Stylesheet" />        
        <link rel="stylesheet/less" href="{$base_uri}less/bootstrap.less" media="all" />
        <link rel="stylesheet" type="text/css" href="{$base_uri}styles/normal.css" />

    </head>
    <body>
        <div class="topbar">
            <div class="topbar-inner">
                <div class="container-fluid">
                    {$page->include_template('navigation')}
                </div><!-- /tobar-inner -->
            </div><!-- /container-fliud -->
        </div><!-- /topbar -->

        <div class="container">
            <div class="row">
                <div class="span16">
                    <h1>
                        Ben Roberts
                        <small>MEng Computer Science @ ecs.soton.ac.uk</small>
                    </h1>
                </div>
            </div>
        
            <div class="row">
                {if ! $messages}
                    {$session = Homepage_Main::instance()->session()}
                    {$messages = $session->get('messages')}
                    {$session->delete('messages')}
                {/if}
                {if $messages}
                    <div id="messages">
                        {foreach from=$messages item=message}
                            {if is_array($message)}
                                {$severity=$message['severity']}
                                <div class="alert-message {$severity}">
                                    {$message['content']|escape:html}
                                </div>
                            {else}
                                <div class="alert-message info">
                                    {$message|escape:html}
                                </div>
                            {/if}
                        {/foreach}
                    </div><!-- /messages -->
                {/if}

                {$page_content}
            </div>
    
            <footer>
                <p>
                    Copyright &copy; 2012 by Ben Roberts. All rights reserved unless otherwise specified.
                </p>
            </footer>
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