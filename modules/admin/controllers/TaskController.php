<?php

namespace app\modules\admin\controllers;

use app\models\Task;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class TaskController
 * @package app\modules\admin\controllers
 */
class TaskController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $tasksProvider = new ActiveDataProvider([
            'query' => Task::find(),
        ]);
        return $this->render('index', [
            'tasksProvider' => $tasksProvider,
        ]);
    }

    /**
     * @return string
     */
    public function actionCreate()
    {
        $task = new Task();

        $request = \Yii::$app->request;
        if ($request->isPost && $task->load($request->post())) {
            $task->save();
        }

        return $this->render('create', [
            'task' => $task,
        ]);
    }

    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $task = Task::findOne($id);
        if (!$task) {
            throw new NotFoundHttpException('Not found');
        }

        $request = \Yii::$app->request;
        if ($request->isPost && $task->load($request->post())) {
            $task->save();
        }

        return $this->render('update', [
            'task' => $task,
        ]);
    }

    public function actionDelete($id)
    {
        $task = Task::findOne($id);
        if (!$task) {
            throw new NotFoundHttpException('Not found');
        }
        $task->delete();
        return $this->redirect(['/admin/task/index']);
    }
}