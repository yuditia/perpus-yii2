<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap-datetimepicker.min.css_4.17.47/cdnjs/bootstrap-datetimepicker.min.css',
        'css/bootstrap-datepicker.css_1.9.0/cdnjs/bootstrap-datepicker.css'
    ];
    public $js = [
        
        'css/bootstrap-datepicker.min.js_1.9.0/cdnjs/bootstrap-datepicker.min.js',
        'css/bootstrap-datepicker.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\web\JqueryAsset',
        

    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
}
