<?php

class FantasyController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->view->setVar("pageTitle", 'FANTASY');
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
                        //
                        $this->__generateNormalNameAction($gender['type']);
                        //
                        $this->__generateAnotherNameAction();
                        //
                        $this->__generatePersonalityAction();
                        //
//                        $this->__generateCoinageWord();
                        $this->__generateFantasyName();
                        //
                        $this->__generateRace();
                        //
                        $this->__generateJobs();
                        //
                        $this->__generateAlignments();
                        //
                        $this->__generateLooksMetaphorWords();
                        //
                        $this->__generateLooksHairStyle();
                        //
                        $this->__generateLooksHairColor();
                        //
                        $this->__generateLooksEyeColor();
                        //
                        $this->__generateLooksSkinColor();
                        //
                        $this->__generateLooksFashion();
                        //
                        $this->__generateLooksFashionSense();
                        //
                        $this->__generateAccessory();
                        //
                        $this->__generateArmor();
                        //
                        $this->__generateItem();
                        //
                        $this->__generateWeapon();
                        //
                        $this->__generateBirth();
                        //
                        $this->__generateTrigger();
                        //
                        $this->__generateImportant();
                        //
                        $this->__generateStrongPoint();
                        //
                        $this->__generateWeakPoint();
                        //
                        $this->__generateCallNameFirstParson();
                        //
                        $this->__generateCallNameSecondParson();
                        break;
                    default:
                        // nothing to do.
                }
            }
        }
    }

    /**
     *
     */
    private function __generateBirth()
    {
        $model = new MasterBirthClasses();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('birth', $records);
    }

    /**
     *
     */
    private function __generateTrigger()
    {
        $model = new MasterTriggers();
        $records = $model->findFirst(array(
                "category = 'stem'",
                "order" => "rand()"
            )
        );
        $records2 = $model->findFirst(array(
                "category = 'suffix'",
                "order" => "rand()"
            )
        );
        $this->view->setVar('triggerStem', $records);
        $this->view->setVar('triggerSuffix', $records2);
    }
    /**
     *
     */
    private function __generateImportant()
    {
        $model = new MasterImportants();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('important', $records);
    }
    /**
     *
     */
    private function __generateStrongPoint()
    {
        $model = new MasterStrongAndWeakPoints();
        $records = $model->findFirst(array(
                "word_type = 'common' or word_type = 'strong'",
                "order" => "rand()"
            )
        );
        $this->view->setVar('strongPoint', $records);
    }
    /**
     *
     */
    private function __generateWeakPoint()
    {
        $model = new MasterStrongAndWeakPoints();
        $records = $model->findFirst(array(
                "category = 'common' or word_type = 'weak'",
                "order" => "rand()"
            )
        );
        $this->view->setVar('weakPoint', $records);
    }
    /**
     *
     */
    private function __generateCallNameFirstParson()
    {
        $model = new MasterCallPersonNames();
        $records = $model->findFirst(array(
                "category = 'common' or category = 'first'",
                "order" => "rand()"
            )
        );
        $this->view->setVar('firstParson', $records);
    }

    /**
     *
     */
    private function __generateCallNameSecondParson()
    {
        $model = new MasterCallPersonNames();
        $records = $model->findFirst(array(
                "category = 'common' or category = 'second'",
                "order" => "rand()"
            )
        );
        $this->view->setVar('secondParson', $records);
    }

    /**
     *
     */
    private function __generateAccessory()
    {
        $model = new MasterAccessories();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('accessory', $records);
    }

    /**
     *
     */
    private function __generateArmor()
    {
        $model = new MasterArmors();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('armor', $records);
    }

    /**
     *
     */
    private function __generateItem()
    {
        $model = new MasterItems();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('item', $records);
    }

    /**
     *
     */
    private function __generateWeapon()
    {
        $model = new MasterWeapons();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('weapon', $records);
    }

    /**
     *
     */
    private function __generateLooksHairStyle()
    {
        $model = new MasterLooksHairStyles();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('looksHairStyle', $records);
    }

    /**
     *
     */
    private function __generateLooksHairColor()
    {
        $model = new MasterLooksHairColors();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('looksHairColor', $records);
    }

    /**
     *
     */
    private function __generateLooksEyeColor()
    {
        $model = new MasterLooksEyeColors();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('looksEyeColor', $records);
    }

    /**
     *
     */
    private function __generateLooksSkinColor()
    {
        $model = new MasterLooksSkinColors();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('looksSkinColor', $records);
    }

    /**
     *
     */
    private function __generateLooksFashion()
    {
        $model = new MasterLooksFashions();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('looksFashion', $records);
    }

    /**
     *
     */
    private function __generateLooksFashionSense()
    {
        $model = new MasterLooksFashionSenses();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('looksFashionSense', $records);
    }

    /**
     *
     */
    private function __generateLooksMetaphorWords()
    {
        $model = new MasterLooksMetaphorWords();
        $records = $model->findFirst(array(
                "order" => "rand()"
            )
        );
        $this->view->setVar('looksMetaphorWord', $records);
    }

    /**
     *
     */
    private function __generateAlignments()
    {
        $model = new MasterAlignments();
        $records = $model->findFirst(array(
                "world_type = 'fantasy'",
                "order" => "rand()"
            )
        );
        $this->view->setVar('alignment', $records);
    }

    /**
     *
     */
    private function __generateRace()
    {
        $model = new MasterRaces();
        $records = $model->findFirst(array(
                "world_type = 'fantasy'",
                "order" => "rand()"
            )
        );
        $this->view->setVar('race', $records);
    }

    /**
     *
     */
    private function __generateJobs()
    {
        $model = new MasterJobs();
        $records = $model->findFirst(array(
                "order" => "rand()",
            )

        );
        $this->view->setVar('job', $records);
    }

    /**
     *
     */
    private function __generateFantasyName()
    {
        $this->view->setVar('humanName', $this->__getHumanName());
        $this->view->setVar('dwarfName', $this->__getDwarfName());
        $this->view->setVar('elfName', $this->__getElfName());
    }

    /**
     * @return array
     */
    private function __getHumanName()
    {
        $model = new MasterFantasyNames();
        //
        $first = $model->findFirst(array(
                "name_type = 'first' AND race = 'human'",
                "order" => "rand()"
            )
        );
        //
        $family = $model->findFirst(array(
                "name_type = 'family' AND race = 'human'",
                "order" => "rand()"
            )
        );
        return array(
            'first' => $first,
            'family' => $family
        );
    }

    /**
     * @return array
     */
    private function __getElfName()
    {
        $model = new MasterFantasyNames();
        $elfFirstFull = $model->findFirst(array(
                "word_type = 'full' AND name_type = 'first' AND race = 'elf'",
                "order" => "rand()"
            )
        );
        $results = array(
            'family' => array(
                'body' => '',
                'body_ja' => ''
            ),
            'first' => array(
                'body' => $elfFirstFull->body,
                'body_ja' => $elfFirstFull->body_ja
            )
        );
        return $results;
    }

    /**
     * @return array
     */
    private function __getDwarfName()
    {
        $model = new MasterFantasyNames();
        $dwarfFamilyPrefix = $model->findFirst(array(
                "word_type = 'prefix' AND name_type = 'family' AND race = 'dwarf'",
                "order" => "rand()"
            )
        );
        $dwarfFamilySuffix = $model->findFirst(array(
                "word_type = 'suffix' AND name_type = 'family' AND race = 'dwarf'",
                "order" => "rand()"
            )
        );
        $dwarfFirstPrefix = $model->findFirst(array(
                "word_type = 'prefix' AND name_type = 'first' AND race = 'dwarf'",
                "order" => "rand()"
            )
        );
        $dwarfFirstStem = $model->findFirst(array(
                "word_type = 'stem' AND name_type = 'first' AND race = 'dwarf'",
                "order" => "rand()"
            )
        );
        $dwarfFirstSuffix = $model->findFirst(array(
                "word_type = 'suffix' AND name_type = 'first' AND race = 'dwarf'",
                "order" => "rand()"
            )
        );
        // decide first name rules
        $firstNameRuleList = array('prefix', 'suffix');
        $firstNameRule = $firstNameRuleList[mt_rand(0, count($firstNameRuleList) - 1)];
        $results = array();
        switch ($firstNameRule) {
            case 'prefix':
                $results = array(
                    'family' => array(
                        'body' => $dwarfFamilyPrefix->body . $dwarfFamilySuffix->body,
                        'body_ja' => $dwarfFamilyPrefix->body_ja . $dwarfFamilySuffix->body_ja,
                    ),
                    'first' => array(
                        'body' => $dwarfFirstPrefix->body . $dwarfFirstStem->body,
                        'body_ja' => $dwarfFirstPrefix->body_ja . $dwarfFirstStem->body_ja
                    )
                );
                break;
            case 'suffix':
                $results = array(
                    'family' => array(
                        'body' => $dwarfFamilyPrefix->body . $dwarfFamilySuffix->body,
                        'body_ja' => $dwarfFamilyPrefix->body_ja . $dwarfFamilySuffix->body_ja,
                    ),
                    'first' => array(
                        'body' => $dwarfFirstStem->body . $dwarfFirstSuffix->body,
                        'body_ja' => $dwarfFirstStem->body_ja . $dwarfFirstSuffix->body_ja
                    )
                );
                break;
        }
        return $results;
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
    private function __generateNormalNameAction($gender = 'all')
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
    private function __generateAnotherNameAction()
    {
        $model = new MasterAnotherNames();
        $this->view->setVar('anotherNames', $model->findAnotherNames(1));
    }

    /**
     *
     */
    private function __generatePersonalityAction()
    {
        $model = new MasterPersonalities();
        $this->view->setVar('personalities', $model->findPersonalities(1));
    }

    /**
     *
     */
    private function __generateCoinageWord()
    {
        //
        $modelLatin = new MasterCoinageWords();
        $stemPools = $modelLatin->findFirst(array(
                "type = 'stem' AND language_type = 'latin'",
                "order" => "rand()"
            )
        );
        $prefixPools = $modelLatin->findFirst(array(
                "type = 'prefix' AND language_type = 'latin'",
                "order" => "rand()"
            )
        );
        $suffixPools = $modelLatin->findFirst(array(
                "type = 'suffix' AND language_type = 'latin'",
                "order" => "rand()"
            )
        );
        $coinages = array(
            'stem' => array(
                'body' => $stemPools->body,
                'body_ja' => $stemPools->body_ja,
                'mean' => $stemPools->mean
            ),
            'prefix' => array(
                'body' => $prefixPools->body,
                'body_ja' => $prefixPools->body_ja,
                'mean' => $prefixPools->mean
            ),
            'suffix' => array(
                'body' => $suffixPools->body,
                'body_ja' => $suffixPools->body_ja,
                'mean' => $suffixPools->mean
            ),
        );
        $this->view->setVar('coinagesLatin', $coinages);
        //
        $coinages = array();
        $modelEnglish = new MasterCoinageWords();
        $stemPools = $modelEnglish->findFirst(array(
                "type = 'stem' AND language_type = 'english'",
                "order" => "rand()"
            )
        );
        $prefixPools = $modelEnglish->findFirst(array(
                "type = 'prefix' AND language_type = 'english'",
                "order" => "rand()"
            )
        );
        $suffixPools = $modelEnglish->findFirst(array(
                "type = 'suffix' AND language_type = 'english'",
                "order" => "rand()"
            )
        );
        $coinages = array(
            'stem' => array(
                'body' => $stemPools->body,
                'body_ja' => $stemPools->body_ja,
                'mean' => $stemPools->mean
            ),
            'prefix' => array(
                'body' => $prefixPools->body,
                'body_ja' => $prefixPools->body_ja,
                'mean' => $prefixPools->mean
            ),
            'suffix' => array(
                'body' => $suffixPools->body,
                'body_ja' => $suffixPools->body_ja,
                'mean' => $suffixPools->mean
            ),
        );
        $this->view->setVar('coinagesEnglish', $coinages);
    }

}

