<?php
/*
--------------------------------------------------------------
 * @copyright	Copyright © 2024 - All rights reserved.
  Developer: Alvin Gil Saldaña
  @license		GNU General Public License v2.0
 --------------------------------------------------------------- */
defined('_JEXEC') or die;
$doc = JFactory::getDocument();
$video	= $params->get("video");
$VideoUrl = (array) $video ;
// Include assets
$doc->addStyleSheet(JURI::root()."modules/mod_vimeoslider/assets/css/rvslider.min.css");
$doc->addScript(JURI::root()."modules/mod_vimeoslider/assets/js/rvslider.min.js");
require JModuleHelper::getLayoutPath('mod_vimeoslider', $params->get('layout', 'default'));
