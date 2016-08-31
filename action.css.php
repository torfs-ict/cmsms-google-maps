<?php

/** @var GoogleMaps $this */
if (!isset($gCms)) exit;

echo $this->smarty->fetch($this->GetFileResource('css.tpl'));