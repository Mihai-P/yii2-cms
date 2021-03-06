<?php

namespace cms;

class Module extends \yii\base\Module
{
	public $controllerNamespace = 'cms\controllers';

    /**
     * @var int
     * @desc Remember Me Time (seconds), default = 2592000 (30 days)
     */
    public $rememberMeTime = 2592000; // 30 days

	/**
	 * @var int
	 * @desc Records per page
	 */
	public $recordsPerPage = 25; // 30 days

    public $pageTemplates = [
        [
            'file' => '_simple',
            'name' => 'Simple',
        ],
    ];

    public $attemptsBeforeCaptcha = 3; // Unsuccessful Login Attempts before Captcha

	public function init()
	{
		parent::init();

		\Yii::$app->getI18n()->translations['cms.*'] = [
			'class' => 'yii\i18n\PhpMessageSource',
			'basePath' => __DIR__.'/messages',
		];
		$this->setAliases([
			'@cms' => __DIR__
		]);
    }
}