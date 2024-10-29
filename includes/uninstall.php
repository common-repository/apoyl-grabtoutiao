<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_GRABTOUTIAO
 * @subpackage APOYL_GRABTOUTIAO/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Apoyl_Grabtoutiao_Uninstall {

	
	public static function uninstall() {
	    global $wpdb;
        delete_option('apoyl-grabtoutiao-settings');
	}

}
