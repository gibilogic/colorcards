<?php
/**
 * @version       colorcards.php 2014-09-09 08:43:00 UTC zanardi
 * @package       GiBi Colorcards
 * @author        GiBiLogic <info@gibilogic.com>
 * @authorUrl     http://www.gibilogic.com
 * @copyright     (C) 2014 GiBiLogic snc - All rights reserved.
 * @license       GNU/GPL v3 or later
 */
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');
require_once __DIR__ . '/colorcards/helper.php';

class plgContentColorcards extends JPlugin
{	
    /**
     * @var ColorcardsHelper $helper 
     */
    private $helper;

    /**
     * @var JApplication $app 
     */
    private $app;
    
    /**
     * @var string $pattern Basic colorcards pattern 
     */
    private $pattern = '{colorcard';
  
    /**
     * Constructor
     */
    public function __construct(&$subject, $config = array())
    {
        parent::__construct($subject, $config);
        $this->helper = new ColorcardsHelper();
        $this->app = JFactory::getApplication();
    }
    
    public function onContentPrepare($context, &$row, &$params, $page = 0)
    {
        if ($this->app->isAdmin())
        {
            return true;
        }
        
        if (strpos($row->text, $this->pattern) === false)
        {
            return true;
        }
        
        $row->text = $this->helper->createColorCards($row->text);
        
        // include basic CSS if option enabled
        JFactory::getDocument()->addStyleSheet(JURI::root().'/plugins/content/colorcards/colorcards/styles.css');
        return true;
    }
}
