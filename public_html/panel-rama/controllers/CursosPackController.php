<?php

namespace app\controllers;

use app\models\CursosPack;
use yii\filters\AccessControl;
use app\models\CursosDetalle;
use app\models\AutoNum;
use app\models\WebhooksConfig;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CursosPackController implements the CRUD actions for CursosPack model.
 */
class CursosPackController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['*'],
                    'rules' => [
                        [
                            'actions' => [],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all CursosPack models.
     * @return mixed
     */
    public function actionIndex($curso)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CursosPack::find()->where(['ID_ABRE' => $curso]),
            
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
            'curso' => CursosDetalle::find()->where(['CURSO' => $curso])->one(),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CursosPack model.
     * @param int $ID ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'curso' => CursosDetalle::find()->where(['CURSO' => $model->ID_ABRE])->one(),
            'model' => $model,
        ]);
    }

    /**
     * Creates a new CursosPack model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($curso)
    {
        $model = new CursosPack();
        $model->ID_ABRE = $curso;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $curso = CursosDetalle::find()->where(['CURSO' => $model->ID_ABRE])->one();
                $curso2 = CursosDetalle::find()->where(['CURSO' => $model->ID_ABRE_PACK])->one();
                //echo '$curso = ' . $curso->CURSO .'<br>';
                //echo '$curso->ID_ABRE_PACK = ' . $model->ID_ABRE_PACK .'<br>';
                $arrayK = [$model->ID_ABRE_PACK.'_'.$curso->CURSO, $curso->CURSO];
                sort($arrayK);
                $keynew = implode("|", $arrayK);
                //echo '$keynew = ' . $keynew .'<br>';
                $cursoPack = CursosDetalle::find()->where(['CURSO' => $keynew])->one();

                $jsonURLDOWNLOAD = [
                        $curso->CURSO => $curso->URL_DOWNLOAD,
                        $curso2->CURSO => $curso2->URL_DOWNLOAD,
                    ];
                $jsonURLFACEBOOKGROUP = [
                        $curso->CURSO => $curso->URL_FACEBOOK_GROUP,
                        $curso2->CURSO => $curso2->URL_FACEBOOK_GROUP,
                    ];

                if($cursoPack == null){
                    $cursoPack = new CursosDetalle();
                    $cursoPack->CURSO = $keynew;
                    $cursoPack->DIR = $curso->DIR;
                    $cursoPack->TITULO = $curso->TITULO . ' + ' . $model->TITULO_1;
                    $cursoPack->DESCRIPCION = $curso->TITULO . ' + ' . $model->TITULO_1;
                    $cursoPack->PRECIO_UNITARIO = $curso->PRECIO_UNITARIO + $model->PRECIO;
                    $cursoPack->PORCENTAJE_DES = 0;
                    $cursoPack->PUBLIC_KEY_MP = $curso->PUBLIC_KEY_MP;
                    $cursoPack->ACCESS_TOKEN_MP = $curso->ACCESS_TOKEN_MP;
                    $cursoPack->URL_DOWNLOAD = json_encode($jsonURLDOWNLOAD);
                    $cursoPack->URL_FACEBOOK_GROUP = json_encode($jsonURLFACEBOOKGROUP);
                    $cursoPack->save();

                    $cursoPackAutoNum = new AutoNum();
                    $cursoPackAutoNum->ID = $keynew;
                    $cursoPackAutoNum->PREFIJO = 'A';
                    $cursoPackAutoNum->ULTIMO_NUM = 0;
                    $cursoPackAutoNum->MAX_LEN = 10;
                    $cursoPackAutoNum->save();
                    
                    $cursoWebhooksConfig = WebhooksConfig::find()->where(['CURSO' => $model->ID_ABRE, 'ESTADO_MP' => 'approved'])->one();
                    $cursoPackWebhooksConfig = new WebhooksConfig();
                    $cursoPackWebhooksConfig->CURSO = $keynew;
                    $cursoPackWebhooksConfig->ESTADO_MP = 'approved';
                    $cursoPackWebhooksConfig->WEBHOOK_URL = $cursoWebhooksConfig->WEBHOOK_URL;
                    $cursoPackWebhooksConfig->save();
                } 
                /* Ya no se usa más
                else {
                    $cursoPack->URL_DOWNLOAD = json_encode($jsonURLDOWNLOAD);
                    $cursoPack->URL_FACEBOOK_GROUP = json_encode($jsonURLFACEBOOKGROUP);
                    $cursoPack->PRECIO_UNITARIO = $curso->PRECIO_UNITARIO + $model->PRECIO;
                    if($cursoPack->save()){

                    } else {
                        print_r($cursoPack->errors);
                        die();
                    }
                }*/
                return $this->redirect(['view', 'id' => $model->ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'curso' => CursosDetalle::find()->where(['CURSO' => $model->ID_ABRE])->one(),
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CursosPack model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $curso = CursosDetalle::find()->where(['CURSO' => $model->ID_ABRE])->one();
            $curso2 = CursosDetalle::find()->where(['CURSO' => $model->ID_ABRE_PACK])->one();
            //echo '$curso = ' . $curso->CURSO .'<br>';
            //echo '$curso->ID_ABRE_PACK = ' . $model->ID_ABRE_PACK .'<br>';
            $arrayK = [$model->ID_ABRE_PACK,$curso->CURSO];
            sort($arrayK);
            $keynew = implode("|", $arrayK);
            //echo '$keynew = ' . $keynew .'<br>';
            $cursoPack = CursosDetalle::find()->where(['CURSO' => $keynew])->one();

            $jsonURLDOWNLOAD = [
                    $curso->CURSO => $curso->URL_DOWNLOAD,
                    $curso2->CURSO => $curso2->URL_DOWNLOAD,
                ];
            $jsonURLFACEBOOKGROUP = [
                    $curso->CURSO => $curso->URL_FACEBOOK_GROUP,
                    $curso2->CURSO => $curso2->URL_FACEBOOK_GROUP,
                ];

            if($cursoPack == null){
                $cursoPack = new CursosDetalle();
                $cursoPack->CURSO = $keynew;
                $cursoPack->DIR = $curso->DIR;
                $cursoPack->TITULO = $curso->TITULO . ' + ' . $model->TITULO_1;
                $cursoPack->DESCRIPCION = $curso->TITULO . ' + ' . $model->TITULO_1;
                $cursoPack->PRECIO_UNITARIO = $curso->PRECIO_UNITARIO + $model->PRECIO;
                $cursoPack->PORCENTAJE_DES = 0;
                $cursoPack->PUBLIC_KEY_MP = $curso->PUBLIC_KEY_MP;
                $cursoPack->ACCESS_TOKEN_MP = $curso->ACCESS_TOKEN_MP;
                $cursoPack->URL_DOWNLOAD = json_encode($jsonURLDOWNLOAD);
                $cursoPack->URL_FACEBOOK_GROUP = json_encode($jsonURLFACEBOOKGROUP);
                $cursoPack->save();

                $cursoPackAutoNum = new AutoNum();
                    $cursoPackAutoNum->ID = $keynew;
                    $cursoPackAutoNum->PREFIJO = 'A';
                    $cursoPackAutoNum->ULTIMO_NUM = 0;
                    $cursoPackAutoNum->MAX_LEN = 10;
                    $cursoPackAutoNum->save();
            } else {
                $cursoPack->URL_DOWNLOAD = json_encode($jsonURLDOWNLOAD);
                $cursoPack->URL_FACEBOOK_GROUP = json_encode($jsonURLFACEBOOKGROUP);
                $cursoPack->PRECIO_UNITARIO = $curso->PRECIO_UNITARIO + $model->PRECIO;
                if($cursoPack->save()){

                } else {
                    print_r($cursoPack->errors);
                    die();
                }
            }
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('update', [
            'curso' => CursosDetalle::find()->where(['CURSO' => $model->ID_ABRE])->one(),
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CursosPack model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index', 'curso' => $model->ID_ABRE]);
    }

    /**
     * Finds the CursosPack model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return CursosPack the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CursosPack::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
