<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected $config;

    public function initialize()
    {
        $this->config = $this->di->get('config');
        $this->view->setVar("siteTitle", $this->config->general->siteTitle);
        $this->view->setVar("pageTitle", $this->config->general->pageTitle);
    }

    /**
     * 渡された配列要素からランダムに $numberOf 個の値を抽出する
     *
     * @param array $seeds
     * @param int $numberOf
     * @return array
     */
    public function choice($seeds = array(), $numberOf = 1)
    {
        $items = array();
        // 配列外エラー回避のため、$numberOfよりも小さな配列の場合は配列の最大値に設定
        $max = count($seeds);
        if ($numberOf > $max ) {
            $numberOf = $max;
        }
        shuffle($seeds);
        for ($i = 0; $i < $numberOf; $i++) {
            $items[] = $seeds[$i];
        }
        return $items;
    }
}
