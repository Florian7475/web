<?php
/**
 * This core file should only be overwritten via your child theme.
 *
 * We strongly recommend to read the Beans documentation to find out more about
 * how to customize Beans theme.
 *
 * @author Beans
 * @link   https://www.getbeans.io
 * @package Beans\Framework
 */

if ( wp_is_mobile() ) {
    echo "mobile";
}else{ 
    echo "no mobile"; }


beans_load_document();
