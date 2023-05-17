<?php 

/*
 * Update checker
 */

// Slug repository GitHub
$slugGitPlugin = 'dati-remoto';
// Ramo. Es. Stable 
$branchGitPlugin = 'Development';

// Link repository GitHub.
$linkGitPlugin = 'https://github.com/sargentiniandrea/'.$slugGitPlugin.'/';
// Token
$token = get_option('token_updates') ? get_option('token_updates') : '';

require DR_PLUG_PATH . 'vendor/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
$myUpdateChecker = PucFactory::buildUpdateChecker($linkGitPlugin, DR_MAIN_FILE_PATH, DR_SLUG );
$myUpdateChecker->setBranch($branchGitPlugin);
$myUpdateChecker->setAuthentication($token);