<?php
class Root_Component extends Kwc_Root_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();

        $ret['generators']['box']['component']['mainMenu'] = 'Menu_Main_Component';
        $ret['generators']['box']['component']['metaTags'] = 'Kwc_Box_MetaTagsContent_Component';
        $ret['generators']['box']['component']['google'] = 'Box_Google_Component';

        $ret['generators']['title']['component'] = 'Kwc_Box_TitleEditable_Component';
        $ret['generators']['products'] = array(
            'class' => 'Kwf_Component_Generator_Static',
            'component' => 'Directory_Products_Component'
        );

        $ret['editComponents'] = array('title', 'metaTags');
        return $ret;
    }
}
