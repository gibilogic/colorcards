<?php
/**
 * @version       helper.php 2014-09-09 08:43:00 UTC zanardi
 * @package       GiBi Colorcards
 * @author        GiBiLogic <info@gibilogic.com>
 * @authorUrl     http://www.gibilogic.com
 * @copyright     (C) 2014 GiBiLogic snc - All rights reserved.
 * @license       GNU/GPL v3 or later
 */
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

class ColorcardsHelper
{	
      private $pattern = '/\{colorcard [^}]+\}/';
      
      public function createColorCards($article)
      {
          if ( ! preg_match_all($this->pattern, $article, $matches))
          {
              return $article;
          }
                    
          foreach ($matches[0] as $text)
          {
              $colorcard = $this->createColorCard($text);
              $article = str_replace ($text, $colorcard, $article);
          }
          
          return $article;
      }
      
      private function createColorCard($text)
      {
          $text = trim(str_replace(array("{colorcard ","}"), "", $text));
          $tokens = explode("|", $text);
          $text = trim(str_replace(array("{colorcard ", "}", "&nbsp;"), "", $text));
          $tokens = explode("|", $text);
          $color =        empty($tokens[0]) ? '' : trim($tokens[0]);
          $title =        empty($tokens[1]) ? '' : trim($tokens[1]);
          $description =  empty($tokens[2]) ? '' : trim($tokens[2]);
          $class =        empty($tokens[3]) ? '' : trim($tokens[3]);

          $card = $this->createCardHtml($color, $title, $description, $class);
          
          return $card;
      }
      
      private function createCardHtml($color, $title, $description, $class)
      {
          ob_start();
          include __DIR__ . '/template.php';
          $cardHtml = ob_get_clean();
          
          return $cardHtml;
      }
}
