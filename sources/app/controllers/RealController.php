<?php

class RealController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->view->setVar("pageTitle", 'REAL');
    }

    public function indexAction()
    {
        if ($this->request->isPost()) {
            if (empty($this->request->getPost("call_action"))) {
                // nothing to do
            } else {
                $callAction = $this->request->getPost("call_action");
                switch ($callAction) {
                    case 'generate_all':
                        // 生成する性別の取得
                        $gender = $this->__getGender();
                        $this->view->setVar('gender', $gender['body']);
                        // 生成する誕生日の取得
                        $birthdayInformation = $this->__getBirthdayInformation();
                        $this->view->setVar('birthdayInformation', $birthdayInformation);
                        // 生成する年齢の取得
                        $this->view->setVar('age', $this->__getAge());
                        $this->__generateNormalNameAction($gender['type']);
                        $this->__generateAnotherNameAction();
                        $this->__generatePersonalityAction();
                        break;
                    default:
                        // nothing to do.
                }
            }
        }
    }

    /**
     * @return array
     *
     * FIXME: gender model に移動
     */
    private function __getGender()
    {
        // ru語には女性苗字と男性苗字が存在するため、ここで男性女性をかならず決める
        $gender = (empty($this->request->getPost("gender")) ? '' : $this->request->getPost("gender"));
        if (empty($gender) || $gender == 'all') {
            $genderList = array('male', 'female');
            $gender = $genderList[mt_rand(0, count($genderList) - 1)];
        }
        $body = 'UNKNOWN';
        switch ($gender) {
            case 'male':
                $body = '男性';
                break;
            case 'female':
                $body = '女性';
                break;
            default:
                // nothing to do
        }
        return array('type' => $gender, 'body' => $body);
    }


    /**
     * @return array
     */
    private function __getBirthdayInformation()
    {
        //
        $modelMasterMonthdayAstrologies = new MasterMonthdayAstrologies();
        //
        $month = $this->choice(range(1, 12), 1);
        $day = $this->choice(range(1, 31), 1);
        //
        return array(
            'month' => $month[0],
            'day' => $day[0],
            'astrology' => $modelMasterMonthdayAstrologies->findFirst("month = '$month[0]' AND day = '$day[0]'"),
        );
    }

    /**
     * @return array
     */
    private function __getAge()
    {
        // 年齢制限ru語には女性苗字と男性苗字が存在するため、ここで男性女性をかならず決める
        $rangeOfAge = (empty($this->request->getPost("range_of_age")) ? '' : $this->request->getPost("range_of_age"));
        if (empty($rangeOfAge) || $rangeOfAge == 'all') {
            $agePool = range(0, 120);
        } else {
            switch ($rangeOfAge) {
                case 'infant':
                    $agePool = range(0, 4);
                    break;
                case 'school':
                    $agePool = range(5, 14);
                    break;
                case 'adolescent':
                    $agePool = range(15, 24);
                    break;
                case 'young':
                    $agePool = range(25, 44);
                    break;
                case 'middle':
                    $agePool = range(45, 64);
                    break;
                case 'late':
                    $agePool = range(65, 120);
                    break;
                default:
                    $agePool = range(15, 44);
            }
        }
        $age = $this->choice($agePool, 1);
        return $age[0];
    }

    /**
     * @param string $gender
     */
    private
    function __generateNormalNameAction($gender = 'all')
    {
        $nation = (empty($this->request->getPost("nation")) ? '' : $this->request->getPost("nation"));
        // 姓名データ生成
        $model = new MasterNormalNames();
        $names = $model->findNormalNames(1, $nation, $gender);
        $this->view->setVar('normalNames', $names);
        // 処理の都合上ここで出自(parent)のデータ生成
        $model2 = new MasterNations();
        $parent = array(
            'father' => 'UNKNOWN',
            'mother' => 'UNKNOWN',
        );
        if ($nation != 'all') {
            $parentRecord = $model2->findFirst("nation_id = '$nation'");
            $parent = array(
                'father' => $parentRecord->body_ja,
                'mother' => $parentRecord->body_ja
            );
        } else {
            foreach ($names as $name) {
                // 0 or 1
                $hash = array(0, 1);
                $keys = array_rand($hash, 2);
                shuffle($keys);
                $fatherRecord = $model2->findFirst("nation_id = '" . $name['nation'][$keys[0]] . "'");
                $motherRecord = $model2->findFirst("nation_id = '" . $name['nation'][$keys[1]] . "'");
                $parent = array(
                    'father' => $fatherRecord->body_ja,
                    'mother' => $motherRecord->body_ja
                );
            }
        }
        $this->view->setVar('parent', $parent);
    }

    /**
     *
     */
    private
    function __generateAnotherNameAction()
    {
        $model = new MasterAnotherNames();
        $this->view->setVar('anotherNames', $model->findAnotherNames(1));
    }

    /**
     *
     */
    private
    function __generatePersonalityAction()
    {
        $model = new MasterPersonalities();
        $this->view->setVar('personalities', $model->findPersonalities(1));
    }

}

