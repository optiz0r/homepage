<!DOCTYPE html>
<html>
    <head>
        <title>{if $title}{$title} -{/if} Ben Roberts</title>
        
        <!-- JQuery //-->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css" rel="Stylesheet" />        
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
        <!-- JQuery Plugins //-->
        <script type="text/javascript" src="{$base_uri}scripts/3rdparty/jquery.chained.js"></script>
        
        <!-- Less //-->
        <script type="text/javascript" src="{$base_uri}scripts/3rdparty/less-1.1.5.min.js"></script>
        
        <!-- Bootstrap //-->
        <link rel="stylesheet/less" href="{$base_uri}less/bootstrap.less" media="all" />
        <link type="text/css" href="{$base_uri}lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <script type="text/javascript" src="{$base_uri}lib/bootstrap/js/bootstrap.min.js"></script>
        
        <!-- Local //-->
        <link rel="stylesheet" type="text/css" href="{$base_uri}styles/normal.css" />
        <script type="text/javascript" src="{$base_uri}scripts/main.js"></script>

    </head>
    <body>
        <div class="navbar navbar-fixed-top navbar-inverse no-print">
            <div class="navbar-inner">
                <div class="container-fluid">
                    {$page->include_template('navigation')}
                </div><!-- /navbar-inner -->
            </div><!-- /container-fliud -->
        </div><!-- /topbar -->

        <div class="container">
            <div class="row">
                <div class="span12" id="header">
                    <h1>
                        Ben Roberts
                        <small>Systems Administrator @ GSA Capital</small>
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

                <div id="page_content">
                    {$page_content}
                </div>
            </div>
    
            <footer class="no-print">
                <p>
                    Powered by 
                    <a href="https://github.com/optiz0r/homepage/" title="Homepage">Homepage</a>
                    and <a href="https://github.com/optiz0r/sihnon-php-lib/" title="Sihnon PHP Library">Sihnon PHP Lib</a>
                    written by <a xmlns:cc="http://creativecommons.org/ns#" href="http://benroberts.net" property="cc:attributionName" rel="cc:attributionURL">Ben Roberts</a>.
                    <br />
                     
                    This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.
                    <br />
                    
                    <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">
                        <img alt="Creative Commons Licence" style="border-width:0" src="//i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" />
                    </a>
                </p>
            </footer>
        </div>
        

        <!-- Piwik -->
        <script type="text/javascript">
        var pkBaseURL = (("https:" == document.location.protocol) ? "https://admin.sihnon.net/stats/" : "https://admin.sihnon.net/stats/");
        document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
        </script><script type="text/javascript">
            try {
                var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 3);
                piwikTracker.trackPageView();
                piwikTracker.enableLinkTracking();
            } catch( err ) {}
        </script><noscript><p><img src="https://admin.sihnon.net/stats/piwik.php?idsite=3" style="border:0" alt=""/></p></noscript>
        <!-- End Piwik Tag -->
    </body>
</html>
