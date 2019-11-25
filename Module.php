<?php

namespace koperdog\yii2sitemanager;

class Module extends \yii\base\Module
{
    const MODULE_NAME = "sitemanager";
    
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'koperdog\yii2sitemanager\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        
        $this->registerTranslations();
    }
    
    private function registerTranslations()
    {
        if (!isset(\Yii::$app->i18n->translations[self::MODULE_NAME . '*'])) {
            \Yii::$app->i18n->translations[self::MODULE_NAME . '*'] = [
                'class'    => \yii\i18n\PhpMessageSource::class,
                'basePath' => __DIR__ . '/messages',
                'fileMap'  => [
                    self::MODULE_NAME . "/error" => "error.php", 
                ],
            ];
        }
    }
}
