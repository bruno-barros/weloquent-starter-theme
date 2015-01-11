<?php
/**
 * ----------------------------------------
 * Insert Global JSON data
 * ----------------------------------------
 */
use Weloquent\Facades\GlobalJs;

// home url
GlobalJs::add('url', url('/'));

// home path
GlobalJs::add('path', dirname(SRC_PATH));