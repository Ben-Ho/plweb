<?=$this->doctype('XHTML1_STRICT');?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?=$this->includeCode('header')?>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="shortcut icon" href="/assets/web/images/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="/assets/web/images/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/web/images/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/web/images/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="/assets/web/images/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="/assets/web/images/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="/assets/web/images/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="/assets/web/images/apple-touch-icon-152x152.png" />
    </head>
    <body class="frontend">
        <div id="page">
            <div id="outerHeader">
            </div>
            <div id="outerContent">
                <div class="menu">
                    <?=$this->component($this->boxes['mainMenu']);?>
                </div>
                <div id="content">
                    <div id="innerContent">
                        <?=$this->component($this->data);?>
                    </div>
                    <?=$this->component($this->boxes['google']);?>
                </div>
            </div>
            <div id="outerFooter">
            </div>
        </div>
        <?=$this->includeCode('footer')?>
    </body>
</html>
