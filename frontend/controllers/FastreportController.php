<?php

namespace frontend\controllers;

use \yii\web\Controller;
use common\helps\Tools;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/*
 * 深度报告 FastReport
 * */

class FastreportController extends Controller
{
    public $output;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }


    public function actionIndex()
    {
        /*
        $this->output = [
            'name' => '家之味',
            'score' => '5.2',
            'desc' => ['cost' => '成本率为60%属于偏高状态', 'profit' => '请降低成本率至40%达到最优状态！'],
        ];

        //business 营业情况定位
        $this->output['business'] = [
            //营业额
            'bvolume' => ['max' => '13360', 'min' => '6348', 'self' => '3246',],
            //利润
            'profit' => ['max' => '5344', 'min' => '1298', 'self' => '3540',]
        ];

        //dishes 菜品分析
        $this->output['dishes'] = [
            //菜品构成
            'form' => [
                ['name' => '葱油天鹅蛋', 'value' => '6'],
                ['name' => '油淋鸟贝', 'value' => '4'],
                ['name' => '鲅鱼水饺', 'value' => '6'],
                ['name' => '温伴海螺', 'value' => '2'],
                ['name' => '刺身海胆', 'value' => '6'],
            ],
            //菜品区分
            'division' => [
                'main' => [
                    ['name' => '葱油天鹅蛋', 'sales' => '100', 'profit' => '2000'],
                    ['name' => '油淋鸟贝', 'sales' => '100', 'profit' => '2000'],
                    ['name' => '鲅鱼水饺', 'sales' => '100', 'profit' => '2000'],
                    ['name' => '温伴海螺', 'sales' => '100', 'profit' => '2000'],
                    ['name' => '刺身海胆', 'sales' => '100', 'profit' => '2000'],
                ],
                'less' => [
                    ['name' => '野菜包子', 'sales' => '100', 'profit' => '2000'],
                    ['name' => '胶东皮冻', 'sales' => '100', 'profit' => '2000'],
                    ['name' => '蒸小生蚝', 'sales' => '100', 'profit' => '2000'],
                    ['name' => '胶东猪头肉', 'sales' => '100', 'profit' => '2000'],
                    ['name' => '蜂窝玉米', 'sales' => '100', 'profit' => '2000'],
                ],
            ],
        ];

        //单品Top5
        $this->output['single_top5'] = [
            //销量
            'sales' => [
                'trade' => [
                    ['name' => '刺身', 'order' => '1'],
                    ['name' => '海鲜疙瘩汤', 'order' => '2'],
                    ['name' => '鲅鱼水饺', 'order' => '3'],
                    ['name' => '蜂窝玉米', 'order' => '4'],
                    ['name' => '油淋鸟贝', 'order' => '5'],
                ],
                'self' => [
                    ['name' => '海鲜疙瘩汤', 'order' => '1'],
                    ['name' => '葱油天鹅蛋', 'order' => '2'],
                    ['name' => '刺身海胆', 'order' => '3'],
                    ['name' => '鱼锅饼子', 'order' => '4'],
                    ['name' => '葱油千层饼', 'order' => '5'],
                ],
            ],
            'profit' => [
                'trade' => [
                    ['name' => '刺身', 'order' => '1'],
                    ['name' => '海鲜疙瘩汤', 'order' => '2'],
                    ['name' => '鲅鱼水饺', 'order' => '3'],
                    ['name' => '蜂窝玉米', 'order' => '4'],
                    ['name' => '油淋鸟贝', 'order' => '5'],
                ],
                'self' => [
                    ['name' => '海鲜疙瘩汤', 'order' => '1'],
                    ['name' => '葱油天鹅蛋', 'order' => '2'],
                    ['name' => '刺身海胆', 'order' => '3'],
                    ['name' => '鱼锅饼子', 'order' => '4'],
                    ['name' => '葱油千层饼', 'order' => '5'],
                ],
            ],
        ];

        //套餐Top5
        $this->output['setmeal_top5'] = [
            //销量
            'sales' => [
                'trade' => [
                    ['name' => '刺身', 'order' => '1'],
                    ['name' => '海鲜疙瘩汤', 'order' => '2'],
                    ['name' => '鲅鱼水饺', 'order' => '3'],
                    ['name' => '蜂窝玉米', 'order' => '4'],
                    ['name' => '油淋鸟贝', 'order' => '5'],
                ],
                'self' => [
                    ['name' => '海鲜疙瘩汤', 'order' => '1'],
                    ['name' => '葱油天鹅蛋', 'order' => '2'],
                    ['name' => '刺身海胆', 'order' => '3'],
                    ['name' => '鱼锅饼子', 'order' => '4'],
                    ['name' => '葱油千层饼', 'order' => '5'],
                ],
            ],
            //利润
            'profit' => [
                'trade' => [
                    ['name' => '刺身', 'order' => '1'],
                    ['name' => '海鲜疙瘩汤', 'order' => '2'],
                    ['name' => '鲅鱼水饺', 'order' => '3'],
                    ['name' => '蜂窝玉米', 'order' => '4'],
                    ['name' => '油淋鸟贝', 'order' => '5'],
                ],
                'self' => [
                    ['name' => '海鲜疙瘩汤', 'order' => '1'],
                    ['name' => '葱油天鹅蛋', 'order' => '2'],
                    ['name' => '刺身海胆', 'order' => '3'],
                    ['name' => '鱼锅饼子', 'order' => '4'],
                    ['name' => '葱油千层饼', 'order' => '5'],
                ],
            ],
        ];

        //区间营业分析
        $this->output['btween_analyse'] = [
            'xAxis' => ['周一', '周二', '周三', '周四', '周五', '周六', '周日'],
            //利润
            'profit' => ['200', '400', '300', '600', '200', '300', '400'],

            //成本
            'costs' => ['200', '400', '300', '600', '200', '300', '400'],

            //营业额
            'bvolume' => ['200', '400', '300', '600', '200', '300', '400'],
        ];

        //酒水消费
        $this->output['drinks'] = [
            'self' => ['sales' => '30%', 'bvolume' => '40%', 'profit' => '52%'],  //本店
            'compete' => ['sales' => '30%', 'bvolume' => '40%', 'profit' => '52%'],   //竞选

            'singletop' => [
                //销量
                'sales' => [
                    'slef' => [
                        ['name' => '红星二锅头', 'num' => '100'],
                        ['name' => '三得利超爽', 'num' => '100'],
                        ['name' => '五粮液', 'num' => '100'],
                        ['name' => '江小白', 'num' => '100'],
                        ['name' => '劲酒', 'num' => '100'],
                    ],
                    'city' => [
                        ['name' => '红星二锅头', 'num' => '100'],
                        ['name' => '三得利超爽', 'num' => '100'],
                        ['name' => '五粮液', 'num' => '100'],
                        ['name' => '江小白', 'num' => '100'],
                        ['name' => '劲酒', 'num' => '100'],
                    ]
                ],
                //营业额
                'bvolume' => [
                    'slef' => [
                        ['name' => '红星二锅头', 'num' => '100'],
                        ['name' => '三得利超爽', 'num' => '100'],
                        ['name' => '五粮液', 'num' => '100'],
                        ['name' => '江小白', 'num' => '100'],
                        ['name' => '劲酒', 'num' => '100'],
                    ],
                    'city' => [
                        ['name' => '红星二锅头', 'num' => '100'],
                        ['name' => '三得利超爽', 'num' => '100'],
                        ['name' => '五粮液', 'num' => '100'],
                        ['name' => '江小白', 'num' => '100'],
                        ['name' => '劲酒', 'num' => '100'],
                    ]
                ],
                //利润
                'profit' => [
                    'slef' => [
                        ['name' => '红星二锅头', 'num' => '100'],
                        ['name' => '三得利超爽', 'num' => '100'],
                        ['name' => '五粮液', 'num' => '100'],
                        ['name' => '江小白', 'num' => '100'],
                        ['name' => '劲酒', 'num' => '100'],
                    ],
                    'city' => [
                        ['name' => '红星二锅头', 'num' => '100'],
                        ['name' => '三得利超爽', 'num' => '100'],
                        ['name' => '五粮液', 'num' => '100'],
                        ['name' => '江小白', 'num' => '100'],
                        ['name' => '劲酒', 'num' => '100'],
                    ]
                ],
            ],
        ];
        //成本分析
        $this->output['costs_analyse'] = [
            'dish' => ['competeMax' => '30%', 'best' => '27%', 'self' => '25%', 'competeMin' => '20%'],
            'drinks' => ['competeMax' => '80%', 'best' => '27%', 'self' => '25%', 'competeMin' => '20%'],
        ];

        //就餐人数customer
        $this->output['customer'] = [
            //最近一月
            'last_month' => [
                'legend' => ['1~2人就餐', '3~4人就餐', '5~6人就餐', '7~8人就餐', '其他'],
                'data' => [
                    ['value' => '335', 'name' => '1~2人就餐'],
                    ['value' => '310', 'name' => '3~4人就餐'],
                    ['value' => '234', 'name' => '5~6人就餐'],
                    ['value' => '135', 'name' => '7~8人就餐'],
                    ['value' => '1548', 'name' => '其他']
                ],
            ],
            //最近三月
            'last_three_month' => [
                'legend' => ['1~2人就餐', '3~4人就餐', '5~6人就餐', '7~8人就餐', '其他'],
                'data' => [
                    ['value' => '335', 'name' => '1~2人就餐'],
                    ['value' => '310', 'name' => '3~4人就餐'],
                    ['value' => '234', 'name' => '5~6人就餐'],
                    ['value' => '135', 'name' => '7~8人就餐'],
                    ['value' => '1548', 'name' => '其他']
                ],
            ],
            //最近三月
            'last_year' => [
                'legend' => ['1~2人就餐', '3~4人就餐', '5~6人就餐', '7~8人就餐', '其他'],
                'data' => [
                    ['value' => '335', 'name' => '1~2人就餐'],
                    ['value' => '310', 'name' => '3~4人就餐'],
                    ['value' => '234', 'name' => '5~6人就餐'],
                    ['value' => '135', 'name' => '7~8人就餐'],
                    ['value' => '1548', 'name' => '其他']
                ],
            ],
        ];

        //翻台率
        $this->output['turn_rate'] = [
            'self' => '50%',  //本店
            'compete' => '30%',   //竞店
            'same_series' => '50%',   //同系
            //趋势
            'trend' => ['100', '200', '150', '280', '300', '360', '420', '370', '300', '400', '500', '520'],
        ];

        //房租合理性
        $this->output['rationality'] = [
            'result' => '25%',
            'data' => [
                ['value' => '45', 'name' => '房租'],
                ['value' => '100', 'name' => '营业额']
            ],
        ];

        //评分详情
        $this->output['comment_dateil'] = [
            'frist' => [
                'environment' => [9, 8, 9],
                'service' => [10, 8, 9],
                'health' => [10, 8, 9],
                'cookstyle' => [8, 8, 9],
            ],
            'second' => [
                'environment' => [6, 7, 6],
                'service' => [5, 7, 6],
                'health' => [5, 7, 6],
                'cookstyle' => [7, 7, 6],
            ]
        ];

        //关键字
        $this->output['keywords'] = ['请客', '价格实惠', '干净卫生', '现做现卖', '干净卫生', '请客', '价格实惠', '干净卫生现做现卖', '干净卫生', '请客', '价格实惠', '干净卫生', '现做现卖', '干净卫生'];
        */
        $data = json_encode(array('orgID' => 'AAAAAAA', 'restaurantName' => '家之味', 'type' => '1'), JSON_UNESCAPED_UNICODE);
        $url = Yii::$app->params['apiHost'] . '/api/fastreport';
        $result = Tools::curl($url, $data, 10, 'json');

        $data = $result['result'];

        //1.菜品分析玫瑰图
        if($data['dishes']['form']){
            foreach ($data['dishes']['form'] as $val){
                $arr[]=array(
                    'name'=>$val['name'],
                    'value'=>intval($val['percent']),
                );
            }
            $data['dishes']['form']=$arr;
        }

        return $this->render('index', ['data' => $data]);
    }
}