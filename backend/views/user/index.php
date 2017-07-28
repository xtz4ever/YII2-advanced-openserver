<?php
//
//use yii\helpers\Html;
//use yii\grid\GridView;
//
///* @var $this yii\web\View */
///* @var $searchModel common\models\UserSearch */
///* @var $dataProvider yii\data\ActiveDataProvider */
//
//$this->title = 'Users';
//$this->params['breadcrumbs'][] = $this->title;
//?>
<!--<div class="user-index">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!--    --><?php //// echo $this->render('_search', ['model' => $searchModel]); ?>
<!---->
<!--    <p>-->
<!--        --><?//= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'status',
//            'role',
//            'username',
//            'auth_key',
            // 'password_hash',
            // 'email:email',
            // 'password_reset_token:ntext',
            // 'created_at',
            // 'updated_at',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>
<!--</div>-->

<?php
//use kartik\dynagrid\DynaGrid;
//use kartik\grid\GridView;
//use yii\helpers\Html;
//use yii\bootstrap\Modal;
//
//$gridColumns = [
//    ['class' => 'kartik\grid\SerialColumn'],
//
//    'id',
//    'status',
//    'role',
//    'username',
//    'auth_key',
////    'password_hash',
//    'email:email',
//
//    'created_at',
//    'updated_at',
//
//    [
//        'class' => 'kartik\grid\EditableColumn',
//        'attribute' => 'username',
//        'pageSummary' => 'Page Total',
//        'vAlign'=>'middle',
//        'headerOptions'=>['class'=>'kv-sticky-column'],
//        'contentOptions'=>['class'=>'kv-sticky-column'],
//        'editableOptions'=>['header'=>'Name', 'size'=>'md']
//    ],
//    [
//        'attribute'=>'auth_key',
//        'value'=>function ($model, $key, $index, $widget) {
//            return "<span class='badge' style='background-color: {$model->auth_key}'> </span>  <code>" .
//                $model->auth_key . '</code>';
//        },
//        'filterType'=>GridView::FILTER_COLOR,
//        'vAlign'=>'middle',
//        'format'=>'raw',
//        'width'=>'150px',
//        'noWrap'=>true
//    ],
//    [
//        'class'=>'kartik\grid\BooleanColumn',
//        'attribute'=>'status',
//        'vAlign'=>'middle',
//    ],
//    [
//        'class' => 'kartik\grid\ActionColumn',
//        'dropdown' => true,
//        'vAlign'=>'middle',
//        'urlCreator' => function($action, $model, $key, $index) { return '#'; },
//        'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip'],
//        'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip'],
//        'deleteOptions'=>['title'=>$deleteMsg, 'data-toggle'=>'tooltip'],
//    ],
//    ['class' => 'kartik\grid\CheckboxColumn']
//];
//echo GridView::widget([
//    'dataProvider' => $dataProvider,
//    'filterModel' => $searchModel,
//    'columns' => $gridColumns,
//    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
//    'beforeHeader'=>[
//        [
//            'columns'=>[
//                ['content'=>'Header Before 1', 'options'=>['colspan'=>4, 'class'=>'text-center warning']],
//                ['content'=>'Header Before 2', 'options'=>['colspan'=>4, 'class'=>'text-center warning']],
//                ['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']],
//            ],
//            'options'=>['class'=>'skip-export'] // remove this row from export
//        ]
//    ],
//    'toolbar' =>  [
//        ['content'=>
//            Html::button('&lt;i class="glyphicon glyphicon-plus">&lt;/i>', ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Add Book'), 'class'=>'btn btn-success', /*'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");'*/]) . ' '.
//            Html::a('&lt;i class="glyphicon glyphicon-repeat">&lt;/i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
//        ],
//        '{export}',
//        '{toggleData}'
//    ],
//    'pjax' => true,
//    'bordered' => true,
//    'striped' => false,
//    'condensed' => false,
//    'responsive' => true,
//    'hover' => true,
//    'floatHeader' => true,
//    'floatHeaderOptions' => ['top' => $scrollingTop],
//    'showPageSummary' => true,
//    'panel' => [
//        'type' => GridView::TYPE_PRIMARY
//    ],
//]);
//
//?>










<?php
use yii\bootstrap\ButtonDropdown;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use common\models\User;
use kartik\grid\GridView;

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'ID',
        'label' =>'ID',
    ],
    [
        'attribute' => Yii::t('app', 'username'),
    ],

    'status',
    'role',

    'auth_key',
    [
        'attribute'=>'created_at',
        'filterType'=>GridView::FILTER_DATE,
        'format'=>'raw',
        'width'=>'170px',
        'filterWidgetOptions'=>[
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
    ],
    [
        'class'=>'kartik\grid\BooleanColumn',
        'attribute'=>'status',
        'vAlign'=>'middle',
    ],
    [
        'label' => Yii::t('app', 'Actions'),
        'format' => 'raw',
        'value' => function($model, $key, $index, $widget)
        {

            $status = [
                'encode' => false,
                'label' => '<span class="glyphicon glyphicon-eye-open"></span> '.Yii::t('app', 'view'),
                'url' => ['view', 'id'=>$model->ID],
            ];

            $update = [
                'encode' => false,
                'label' => '<span class="glyphicon glyphicon-pencil"></span> '.Yii::t('app', 'update'),
                'url' => ['update', 'id'=>$model->ID],
            ];

            $delete = [
                'encode' => false,
                'label' => '<span class="glyphicon glyphicon-trash"></span> '.Yii::t('app', 'Delete'),
                'url' => ['delete', 'id'=>$model->ID, ],
                'linkOptions'=>[
                    'aria-label' => 'Delete',
                    'data-confirm' => Yii::t('kvgrid', 'Are you sure to delete this item?'),
                    'data-method'=>'get',
                    'data-pjax'=>'0',
                ],
            ];

            $items [] = $status;
            $items [] = $update;
            $items [] = $delete;

            return ButtonDropdown::widget([
                'encodeLabel' => false,
                'label' => 'Actions',
                'options' => [
                    'class' => 'btn btn-default',
                    'role'=>"menu",
                ],
                'dropdown' => [
                    'items' => $items,
                ]
            ]);
        },
    ],
    [
        'class'=>'kartik\grid\CheckboxColumn',
        'headerOptions'=>['class'=>'kartik-sheet-style'],
    ],
];

echo GridView::widget([
    'id' => 'kv-grid-user',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,

    'panel'=>[
        'type'=>GridView::TYPE_PRIMARY,
        'heading'=>Yii::t('app', 'Users'),
    ],

    'toolbar' =>  [
        [
            'content'=>
                Html::a(    '<i class="glyphicon glyphicon-plus"></i>',
                    ['create'],
                    [
                        'class' => 'btn btn-success',
                        'title'=>Yii::t('app', 'Create').' '. Yii::t('app', 'User'),
                    ]
                )
                .' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>',
                    ['index'],
                    ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')]
                ),
        ],
        '{toggleData}'
    ],
    'pjax' => true,
    'pjaxSettings' => [
        'options' => [
            'enablePushState' => false,
        ],
    ],
    'bordered' => true,
    'striped' => false,
    'condensed' => false,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading'=>$this->title,
        'after' =>  Html::tag('div',
            Html::button(    '<i class="glyphicon glyphicon-saved"></i> '.Yii::t('app', 'Set Group Params'),
                [
                    'data-toggle' => 'modal',
                    'data-target' => '#group-dialog',
                                                    'class' => 'btn btn-primary',
                                                ]
                                            ),
                            ['class'=> 'text-right']
                        )

    ],
]);


?>
