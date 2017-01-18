<?php
namespace deepziyu\yii\rest\module\controllers;

use deepziyu\yii\rest\models\Route;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class ApiController extends Controller
{
    public function init()
    {
        parent::init();
        Yii::$app->response->format = 'html';
    }

    /**
     * Displays homepage.
     * @param int $id
     * @return array
     */
    public function actionIndex()
    {
        $model = new Route();

        $routes =  $model->getRoutes();
        unset($routes['/route/*'],$routes['/*']);
        $routes = array_reverse($routes);
        return $this->renderPartial('index',[
            'routes'=>$routes
        ]);
    }

    public function actionRoutes()
    {

    }

}
