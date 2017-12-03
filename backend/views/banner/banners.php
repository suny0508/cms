<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-12-03 23:03
 */
/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ArrayDataProvider
 * @var $searchModel backend\models\search\MenuSearch
 */

use backend\grid\GridView;
use backend\grid\SortColumn;
use backend\widgets\Bar;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;

$this->title = "Banners";
$this->params['breadcrumbs'][] = ['label' => yii::t('app', 'Banner Types'), 'url' => Url::to(['index'])];
$this->params['breadcrumbs'][] = yii::t('app', 'Banner');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget([
                    'buttons' => [
                        'create' => function () {
                            return Html::a('<i class="fa fa-plus"></i> ' . yii::t('app', 'Create'), Url::to(['banner-create', 'id' => yii::$app->getRequest()->get('id')]), [
                                'title' => yii::t('app', 'Create'),
                                'data-pjax' => '0',
                                'class' => 'btn btn-white btn-sm',
                            ]);
                        },
                        'update' => function () {
                            return Html::a('<i class="fa  fa-sort-numeric-desc"></i> ' . yii::t('app', 'Sort'), Url::to(['banner-sort']), [
                                'title' => yii::t('app', 'Sort'),
                                'data-pjax' => '0',
                                'class' => 'btn btn-white btn-sm sort',
                            ]);
                        },
                        'delete' => function () {
                            return Html::a('<i class="fa fa-trash-o"></i> ' . yii::t('app', 'Delete'), Url::to(['banner-delete']), [
                                'title' => yii::t('app', 'Delete'),
                                'data-pjax' => '0',
                                'data-confirm' => yii::t('app', 'Realy to delete?'),
                                'class' => 'btn btn-white btn-sm multi-operate',
                            ]);
                        },
                    ]
                ])?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '{items}',
                    'columns' => [
                        [
                            'class' => CheckboxColumn::className(),
                        ],
                        [
                            'attribute' => 'img',
                            'format' => 'raw',
                            'value' => function($model){
                                return "<img style='max-width: 200px;max-height: 100px' src='{$model->img}'>";
                            }
                        ],
                        [
                            'attribute' => 'link',
                        ],
                        [
                            'attribute' => 'target',
                        ],
                        [
                            'class' => SortColumn::className(),
                        ],
                        [
                            'attribute' => 'desc',
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'width' => '190px',
                            'buttons' => [
                                'update' => function ($url, $model, $key, $index, $gridView) {
                                    return Html::a('<i class="fa fa-pencil"></i> ' . Yii::t('app', 'Update'), Url::toRoute(['banner-update', 'id'=>$model->id, 'img'=>$model->img]), [
                                        'title' => Yii::t('app', 'Update'),
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-white btn-sm',
                                    ]);
                                },
                                'delete' => function ($url, $model, $key, $index, $gridView) {
                                    return Html::a('<i class="glyphicon glyphicon-trash" aria-hidden="true"></i> ' . Yii::t('app', 'Delete'), Url::toRoute(['banner-delete', 'id'=>$model->id, 'img'=>$model->img]), [
                                        'title' => Yii::t('app', 'Delete'),
                                        'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-white btn-sm',
                                    ]);
                                }
                            ],
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>