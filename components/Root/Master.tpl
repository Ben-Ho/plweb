<?=$this->doctype('XHTML1_STRICT');?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?=$this->includeCode('header')?>
        <link rel="shortcut icon" href="/assets/web/images/favicon.ico"></link> 
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
    </head>
    <body class="frontend">
        <div id="page">
            <div id="outerHeader">
            </div>
            <div id="outerContent">
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
