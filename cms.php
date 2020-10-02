<?php
header('Content-type: text/html; charset=utf-8');
include('grab.php');
function check($html) {

    $cms = array(
        "Amiro CMS" => array("/amiro_sys_css.php?","/amiro_sys_js.php?","-= Amiro.CMS © =-","Работает на Amiro.CMS"),
        "Bitrix" => array("/bitrix/templates/", "/bitrix/js/", "/bitrix/admin/"),
        "Concrete CMS" => array("/concrete/js/", "concrete5 - 5.","/concrete/css/"),
        "Contao" => array("This website is powered by Contao Open Source CMS", "tl_files"),
        "CMS Made Simple" => array("Released under the GPL - http://cmsmadesimple",),
        "Danneo CMS" => array("Danneo Русская CMS", 'content="CMS Danneo'),
        "DataLife Engine" => array("DataLife Engine", "/engine/", "index.php?do=lostpassword", "/engine/ajax/dle_ajax.js","/engine/opensearch.php","/index.php?do=feedback","/index.php?do=rules","/?do=lastcomments"),
        "Drupal" => array("Drupal.settings","misc\/drupal.js","drupal_alter_by_ref","/sites/default/files/css/css_","/sites/all/files/css/css_"),
        "Ektron" => array("EktronClientManager","Ektron.PBSettings","ektron.modal.css","Ektron/Ektron.WebForms.js","EktronSiteDataJS","/Workarea/java/ektron.js","Amend the paths to reflect the ektron system"),
        "HostCMS" => array("/hostcmsfiles/"),
        "InSales" => array("InSales.formatMoney", ".html(InSales.formatMoney","Insales.money_format"),
        "InstantCMS" => array("InstantCMS",),
        "Joomla!" => array("/css/template_css.css", "Joomla! 1.5 - Open Source Content Management", "/templates/system/css/system.css", "Joomla! - the dynamic portal engine and content management system","/templates/system/css/system.css","/media/system/js/caption.js","/templates/system/css/general.css"),
        "Kentico" => array("CMSListMenuLI","CMSListMenuUL","Lvl2CMSListMenuLI","/CMSPages/GetResource.ashx"),
        "LiveStreet" => array("LIVESTREET_SECURITY_KEY"),
        "Magento" => array("cms-index-index"),
        "MaxSite CMS" => array("/application/maxsite/shared/","/application/maxsite/templates/","/application/maxsite/common/","/application/maxsite/plugins/"),
        "MODx" => array("/assets/styles.css", "/assets/templates/","/assets/css/lightbox.css","/assets/styles.css","/assets/js/script.js","assets/templates/design/","assets/images/","/assets/js/","/assets/components"),
        "NetCat" => array("/netcat_template/","/netcat_files/"),
        "OpenCart (ocStore)" => array("catalog/view/theme/default/stylesheet/stylesheet.css", "index.php?route=account/account", "index.php?route=account/login","index.php?route=account/simpleregister"),
        "phpBB" => array("phpBB style name:", "The phpBB Group"),
        "PrestaShop" => array("/themes/prestashop/cache/","/themes/prestashop/","Prestashop 1.5"." || Presta-Module.com",'meta name="generator" content="PrestaShop"'),
        "Simpla CMS" => array("design/default/css/main.css","design/default/images/favicon.ico","tooltip='section' section_id="),
        "TextPattern" => array("/textpattern/index.php"),
        "TYPO 3" => array("This website is powered by TYPO3","typo3temp/"),
        "uCoz" => array("cms-index-index","U1BFOOTER1Z","U1DRIGHTER1Z","U1CLEFTER1","U1AHEADER1Z","U1TRAKA1Z" ),
        "UMI CMS" => array("umi:element-id=", "umi:field-name=","umi:method=", "umi:module="),
        "vBulletin" => array("vbulletin_css", "vbulletin_important.css","clientscript/vbulletin_read_marker.js", "Powered by vBulletin", "Main vBulletin javascript Initialization"),
        "WebAsyst" => array("/published/SC/","/published/publicdata/","aux_page=","auxpages_navigation","auxpage_","?show_aux_page="),
        "Weebly" => array("Weebly.Commerce = Weebly.Commerce","Weebly.setup_rpc","editmysite.com/js/site/main.js","editmysite.com/css/sites.css","editmysite.com/editor/libraries","?show_aux_page="),
        "Wix" => array("X-Wix-Published-Version", "X-Wix-Renderer-Server","X-Wix-Meta-Site-Id"),
        "WordPress" => array("/wp-includes/", "/wp-content/", "/wp-admin/", "/wp-login/")
    );

    if (empty($html))
        exit('Сайт не открылся !');

    foreach ($cms as $name => $rules) {
        $c = count($rules);
        for ($i = 0; $i < $c; $i++) {
            if (stripos($html, $rules[$i]) !== FALSE) {
                exit($name);
            }
        }
    }
    exit("CMS не определна");
}

check(grab($_POST['url']));
