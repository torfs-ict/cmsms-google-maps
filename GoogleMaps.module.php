<?php

/**
 * Class NetDesignModule
 * 
 * @property \Smarty_CMS $smarty
 * @property \CmsApp $cms
 * @property \cms_config $config
 */
class GoogleMaps extends CMSModule {
    protected static $routeParams = null;
    #region Module skeleton
    public function GetVersion() {
        return '1.0.0';
    }

    public function CreateStaticRoutes() {
    }
    /**
     * @return array
     */
    public function GetAdminMenuItems() {
        return parent::GetAdminMenuItems();
    }

    /**
     * @return string
     */
    public function GetAdminSection() {
        return parent::GetAdminSection();
    }

    /**
     * @return string
     */
    public function GetAuthor() {
        return 'Kristof Torfs';
    }

    /**
     * @return string
     */
    public function GetAuthorEmail() {
        return 'kristof@torfs.org';
    }

    /**
     * @return array
     */
    function GetDependencies() {
        return [];
    }

    /**
     * @return string
     */
    public function GetFriendlyName() {
        return parent::GetFriendlyName();
    }

    /**
     * @return bool
     */
    public function HasAdmin() {
        return false;
    }

    /**
     * @return bool
     */
    public function IsPluginModule() {
        return true;
    }

    /**
     * @param array $request
     * @return bool
     */
    public function SuppressAdminOutput(&$request) {
        if (array_key_exists('suppress', $request) || array_key_exists(sprintf('%ssuppress', $this->ActionId()), $request)) return true;
    }
    #endregion

    public function Install() {
        $this->RegisterSmartyPlugin('GoogleMaps', 'block', 'SmartyBlock');
        return false;
    }

    public function Uninstall() {
        $this->RemoveSmartyPlugin();
        return false;
    }

    public static function SmartyBlock($params, $content, Smarty_Internal_Template $template, &$repeat) {
        $mo = ModuleOperations::get_instance();
        $module = $mo->get_module_instance('GoogleMaps');
        $smarty = $module->smarty;
        if (!array_key_exists('id', $params)) $params['id'] = 'map';
        if (!array_key_exists('title')) $smarty->trigger_error('Mandatory parameter "title" was not set.');
        if (!array_key_exists('address')) $smarty->trigger_error('Mandatory parameter "address" was not set.');
        if (!array_key_exists('hint', $params)) $params['hint'] = 'Click/tap on the map to activate it.';
        $smarty->assign(['id' => $params['id'], 'address' => $params['address'], 'title' => $params['title'], 'hint' => $params['hint']]);
        if ($repeat) {
            return $smarty->fetch($module->GetFileResource('before.tpl'));
        } else {
            return $content . $smarty->fetch($module->GetFileResource('after.tpl'));
        }
    }

}