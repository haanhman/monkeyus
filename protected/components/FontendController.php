<?php

require_once ROOT_PATH . '/lib/Mobile_Detect.php';

class FontendController extends CController {

    protected $is_mobile = false;

    /**
     * set meta tabe
     * @var type
     */
    public $metaTag = null;
    public $no_index = false;
    //set page noindex
    public $noIndex = false;
    public $fuck_ie = false;

    /**
     *
     * @var CDbConnection
     */
    protected $db;
    protected $url_download;
    protected $translate;
    protected $my_action;
    protected $current_url;
    protected $is_vn = 0;
    protected $active_language;
    protected $comingsoon_language;
    protected $render_meta = false;
    protected $is_iOS = false;
    protected $is_Android = false;

    private function checkCouponCode() {
        $coupon = strtoupper($_GET['coupon']);
        $url = CURL_VALIDATE_COUPON . '?json=1&coupon=' . $coupon;
        $response = $this->cURLLicence($url);
        if ($response['status'] == 1) {
            $this->trackingCouponCode($response['id']);
            $cookie = new CHttpCookie('coupon_code_cookie', $coupon);
            $cookie->expire = time() + (3600 * 24 * 30);
            Yii::app()->request->cookies['coupon_code_cookie'] = $cookie;
        } else {
            unset($_GET['coupon']);
            unset(Yii::app()->request->cookies['coupon_code_cookie']);
            $this->redirect($this->createUrl('index/index'));
        }
    }

    private function trackingCouponCode($id) {
        $crawler = crawlerDetect();
        if ($crawler) {
            return;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/gioi-thieu.html') === 0 | strpos($_SERVER['REQUEST_URI'], '/bang-gia.html') === 0) {
            //lay thoi gian gan day nhat
            $url_access = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            $query = "SELECT created FROM tbl_coupon_tracking WHERE url_access = :url_access AND agent_id = " . $id . " ORDER BY id DESC LIMIT 1";
            $last_access = $this->db->createCommand($query)->bindValues(array(':url_access' => $url_access))->queryScalar();
            $time = time();
            //10 phut
            if (($time - $last_access) > 600) {
                $values = array(
                    'agent_id' => $id,
                    'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                    'ip' => ip_address(),
                    'url_access' => $url_access,
                    'created' => time()
                );
                yii_insert_row('coupon_tracking', $values);
            }
        }
    }

    public function init() {
        parent::init();

        $ip = ip_address();
        $is_vn = detectIpVN2($ip);
        if ($_SERVER['SERVER_NAME'] != 'monkeyjunior.com.vn') {
            $uri = $_SERVER['REQUEST_URI'];
            $pos = strpos($uri, '/refer/');
            if ($pos === 0) {
                if ($is_vn) {
                    if ($_SERVER['SERVER_NAME'] == 'www.monkeyjunior.com') {
                        $this->redirect('http://www.monkeyjunior.vn' . $uri);
                    }
                } else {
                    if ($_SERVER['SERVER_NAME'] == 'www.monkeyjunior.vn') {
                        $this->redirect('http://www.monkeyjunior.com' . $uri);
                    }
                }
            } else {
                if ($_SERVER['SERVER_NAME'] == 'www.monkeyjunior.com') {
                    if ($_GET['us'] == 1) {
                        Yii::app()->session['no_redirect'] = 1;
                    }
                    if (empty(Yii::app()->session['no_redirect'])) {
                        $ip = ip_address();
                        $is_vn = detectIpVN2($ip);
                        if ($is_vn) {
                            $this->redirect('http://www.monkeyjunior.vn');
                        }
                    }
                }
            }
        }

        global $us_content;
        if ($us_content == 0) {
            $this->is_vn = 1;
        }

        $this->db = EduDataBase::getConnection('db');
        if (!empty($_GET['coupon'])) {
            $this->checkCouponCode();
        } else {
            if (!empty(Yii::app()->request->cookies['coupon_code_cookie'])) {
                $_GET['coupon'] = Yii::app()->request->cookies['coupon_code_cookie'];
                $this->checkCouponCode();
            }
//             elseif($this->is_vn == 1) {                
//                $_GET['coupon'] = 'NEWYEAR';
//                $this->checkCouponCode();
//            }
        }


        $detect = new Mobile_Detect();
        $is_mobile = $detect->isMobile();
        $is_tablet = $detect->isTablet();
        if ($is_mobile | $is_tablet) {
            $this->is_mobile = true;
        }

        if ($_GET['mobile'] == 1) {
            $this->is_mobile = true;
        }

        if ($this->is_mobile) {
            $this->is_iOS = $detect->is('iOS');
            $this->is_Android = $detect->is('AndroidOS');
            $this->layout = 'main_mobile';
        }

#define dict_language @{@"1":@"English US", @"4":@"Vietnamese", @"7":@"Chinese", @"8":@"French", @"9":@"Spanish", @"10":@"Russian",@"11":@"Janpanese",@"12":@"English UK",@"13":@"German",@"14":@"Italian",@"15":@"Dutch",@"16":@"Portuguese",@"17":@"Polish",@"18":@"Greek",@"19":@"Korean",@"20":@"English (AU)"}
#define dict_language_vi @{@"1":@"Tiếng Anh Mỹ", @"4":@"Tiếng Việt", @"7":@"Tiếng Trung", @"8":@"Tiếng Pháp", @"9":@"Tiếng Tây Ban Nha", @"10":@"Tiếng Nga",@"11":@"Tiếng Nhật",@"12":@"Tiếng Anh Anh",@"13":@"Tiếng Đức",@"14":@"Tiếng Ý",@"15":@"Tiếng Hà Lan",@"16":@"Tiếng Bồ Đào Nha",@"17":@"Tiếng Phần Lan",@"18":@"Tiếng Hi Lạp",@"19":@"Tiếng Hàn",@"20":@"Tiếng Anh Úc"}
#define dict_language_code @{@"1":@"us", @"4":@"vi", @"7":@"zh", @"8":@"fr", @"9":@"sp", @"10":@"ru",@"11":@"ja",@"12":@"uk",@"13":@"de",@"14":@"it",@"15":@"nl",@"16":@"pt",@"17":@"pl",@"18":@"el",@"19":@"ko",@"20":@"au"}

        $this->comingsoon_language = array(
            array(
                'code' => 'taybannha',
                'name' => 'Spanish',
                'name_vn' => 'Tây Ban Nha',
            ),
            array(
                'code' => 'cn',
                'name' => 'Chinese',
                'name_vn' => 'Tiếng Trung',
            ),
        );


        $this->active_language = array(
            'us' => array(
                'code' => 'us',
                'name' => 'English US',
                'name_vn' => 'Tiếng Anh - Mỹ',
            ),
            'uk' => array(
                'code' => 'uk',
                'name' => 'English US',
                'name_vn' => 'Tiếng Anh - Anh',
            ),
            'vn' => array(
                'code' => 'vn',
                'name' => 'Vietnamese (North)',
                'name_vn' => 'Tiếng Việt (giọng Bắc)',
            ),
            'fr' => array(
                'code' => 'fr',
                'name' => 'French',
                'name_vn' => 'Tiếng Pháp',
            )
        );



        $this->url_download = array(
            'ios' => array(
                'url' => 'https://itunes.apple.com/us/app/monkey-junior-teach-your-child/id930331514?mt=8',
                'url_store' => 'https://itunes.apple.com/us/app/monkey-junior-teach-your-child/id930331514?mt=8',
                'title' => 'Learn to read with Monkey Junior - a reading program with many reading games for kids',
                'youtube' => 'Uh7DRKGtiDA',
            ),
            'android' => array(
                'url' => 'https://play.google.com/store/apps/details?id=com.earlystart.android.monkeyjunior',
                'url_store' => 'https://play.google.com/store/apps/details?id=com.earlystart.android.monkeyjunior',
                'title' => 'Learn to read - Monkey Junior',
                'youtube' => 'TnTea71pQ3k',
            ),
            'amazon' => array(
                'url' => 'http://www.amazon.com/EARLY-START-Learn-Monkey-Junior/dp/B00QPWJJXG',
                'url_store' => 'http://www.amazon.com/EARLY-START-Learn-Monkey-Junior/dp/B00QPWJJXG',
                'title' => 'Learn to read with Monkey Junior',
                'youtube' => '',
            ),
            'laptop' => array(
                'url' => '/files/monkey-junior.exe',
                'url_store' => $this->createUrl('page/laptop'),
                'title' => 'Hướng dẫn cài đặt Monkey Junior trên PC, laptop',
                'youtube' => 'TEOafhmq35I',
            ),
            'mac' => array(
                'url' => 'https://itunes.apple.com/app/id1133076609?mt=12',
                'url_store' => 'https://itunes.apple.com/app/id1133076609?mt=12',
                'title' => 'Hướng dẫn cài đặt Monkey Junior trên PC, laptop',
                'youtube' => 'TEOafhmq35I',
            )
        );


        if ($this->is_vn) {
            $this->url_download['ios']['url'] = $this->createUrl('page/ios');
            $this->url_download['android']['url'] = $this->createUrl('page/android');

            $this->url_download['ios']['title'] = 'Monkey Junior:Bé học tiếng anh';
            $this->url_download['android']['title'] = 'Monkey Junior:Bé học tiếng anh';
            $this->url_download['amazon']['title'] = 'Monkey Junior:Bé học tiếng anh';
        }

        $this->current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        Yii::app()->setSystemViewPath(ROOT_PATH . '/protected/views/system');
        $this->registerCss();
        $this->registerJs();
    }

    public function registerCss() {
        $ctl = Yii::app()->controller->id;
        if ($ctl == 'pay') {
            return;
        }


        if ($this->is_mobile) {
            $listFile = array(
                'public/bootstrap/css/bootstrap.min.css',
                'monkeyweb/mobile/mobile.css',
//                'monkeyweb/css/dl.css'
            );
            if ($ctl == 'coupon') {                
                $listFile[] = 'images/coupon/style_mobile.css';
            }
        } else {
            $listFile = array(
                'monkeyweb/css/sprite1.css',
                'monkeyweb/css/style-new.css',
                'public/css/tooltipster.css',
                'monkeyweb/css/jquery-video-lightning.css',
                'monkeyweb/css/newfooter.css',
                'monkeyweb/css/dl2.css'
            );
            if ($ctl == 'coupon') {
                unset($listFile[2], $listFile[3]);
            }
            if ($this->is_vn == 0) {
                $listFile[] = 'monkeyweb/css/styleus.css';
            }

            if ($ctl == 'pricing' | $ctl == 'agent') {
                $listFile[] = 'public/js/bootstrap/bootstrap.min.css';
                $listFile[] = 'public/js/bootstrap/easyWizard.css';
            }
            iF ($ctl == 'page') {
                $listFile[] = 'public/js/bootstrap/bootstrap.min.css';
            }
            if ($ctl == 'coupon') {
                $listFile[] = 'public/js/bootstrap/bootstrap.min.css';
                $listFile[] = 'images/coupon/style.css';
            }
        }


        $listFile = array_unique($listFile);
        register_css_file($listFile);
    }

    public function registerJs() {
        $ctl = Yii::app()->controller->id;
        if ($ctl == 'pay') {
            return;
        }
        $act = Yii::app()->controller->action->id;
        if ($this->is_mobile) {
            $listFile = array(
                'public/js/jquery.cookie.js',
                'public/js/download_number.js',
            );
            if ($ctl == 'index' | $ctl == 'page') {
                $listFile[] = 'public/js/jquery.bxslider.min.js';
                $listFile[] = 'public/js/download_mobile.js';
            }
            if ($ctl == 'pricing') {
                $listFile[] = 'public/js/jquery.number.min.js';
            }
            if ($ctl == 'page') {
                $listFile[] = 'public/js/jquery.countdown.min.js';
            }
            if ($ctl == 'coupon') {
                $listFile[] = 'public/js/bootstrap/bootstrap.min.js';
                $listFile[] = 'public/js/jquery.countdown.min.js';
            }

            $listFile[] = 'monkeyweb/mobile/js/main.js';
        } else {
            $listFile = array(
                'public/js/jquery.cookie.js',
                'public/js/download_number.js',
                'monkeyweb/js/jquery-video-lightning.js',
                'public/js/jquery.tooltipster.min.js',
            );
            if ($ctl == 'index' | $ctl == 'page') {
                $listFile[] = 'public/js/jquery.bxslider.min.js';
            }
            if ($ctl == 'page') {
                $listFile[] = 'public/js/bootstrap/bootstrap.min.js';
                $listFile[] = 'public/js/jquery.countdown.min.js';
            }
            if ($ctl == 'pricing') {
                $listFile[] = 'public/js/bootstrap/bootstrap.min.js';
                $listFile[] = 'public/js/jquery.number.min.js';
                $listFile[] = 'public/js/muaban.js';
                $listFile[] = 'public/js/bootstrap/easyWizard.js';
            }
            if ($ctl == 'agent') {
                $listFile[] = 'public/js/bootstrap/bootstrap.min.js';
            }
            if ($ctl == 'coupon') {
                $listFile[] = 'public/js/bootstrap/bootstrap.min.js';
                $listFile[] = 'public/js/jquery.countdown.min.js';
            }

            $listFile[] = 'monkeyweb/js/main.js';
        }
        $listFile = array_unique($listFile);
        register_script_file($listFile);
    }

    protected function getTranslateText() {
        $data = array();
        $query = "SELECT page,postion_name, block, strtext FROM tbl_translate WHERE is_vn = " . $this->is_vn;
        $result = $this->db->createCommand($query)->queryAll();
        foreach ($result as $item) {
            if ($item['is_vn'] == 1) {
                $data[$item['page']][$item['block']][$item['postion_name']] = $item['strtext'];
            } else {
                $data[$item['page']][$item['block']][$item['postion_name']] = $item['strtext'];
            }
        }
        $this->translate = $data;
    }

    protected function beforeRender($view) {
        parent::beforeRender($view);
        $browser_info = get_browser(null, true);
        $browser = strtolower($browser_info['browser']);
        if ($browser == 'ie') {
            $arr = explode('.', $browser_info['version']);
            $version = intval($arr[0]);
            if ($version < 8) {
                $this->fuck_ie = true;
            }
        }


        $this->getTranslateText();

        if ($this->render_meta) {
            $ctl = Yii::app()->controller->id;
            $act = Yii::app()->controller->action->id;
            $query = "SELECT meta_title, meta_keywords, meta_description FROM tbl_metatag WHERE controller_id = :ctl AND action_id = :act";
            $values = array(
                ':ctl' => $ctl,
                ':act' => $act
            );
            $row = $this->db->createCommand($query)->bindValues($values)->queryRow();


            if (!empty($row)) {
                $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
                if ($page <= 0) {
                    $page = 1;
                }
                if ($page > 1) {
                    $row['meta_title'] .= ' - Trang ' . $page;
                    $row['meta_description'] .= ' - Trang ' . $page;
                    $row['meta_keywords'] .= ', trang ' . $page;
                }

                $this->setMetaTitle($row['meta_title']);
                $this->setMetaDescription($row['meta_description']);
                $this->setMetaKeywords($row['meta_keywords']);
            }
        }

        return true;
    }

    public function t($block, $postion_name, $page = 'index') {
        if ($this->is_vn) {
            return $this->translate[$page][$block][$postion_name];
        } else {
            return $this->translate[$page][$block][$postion_name];
        }
    }

    protected function setMetaTitle($str) {
        $this->metaTag['title'] = $str;
    }

    protected function setMetaKeywords($str) {
        $this->metaTag['keywords'] = $str;
    }

    protected function setMetaDescription($str) {
        $this->metaTag['description'] = $str;
    }

    protected function setMetaImage($str) {
        $this->metaTag['og_image'] = $str;
    }

    protected function validateEmailAddress($email) {
        $pattern = "/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}/ims";
        $matches = array();
        preg_match($pattern, $email, $matches);
        if (empty($matches)) {
            return false;
        }
        return true;
    }

    protected function getCountDown() {
        $start_str = strtotime('2015/11/19 00:00:00');
        $now = time();
        $days = ceil(($now - $start_str) / (60 * 60 * 24));
        $up = 0;
        if ($days > 0) {
            $up += (2500 * $days);
        }
        $start = 253704 + $up;
        return $start;
    }

    protected function getProductInfo($pid) {
        $data = array();
        if (!file_exists(ROOT_PATH . '/sync/sync_price.json')) {
            if (ROOT_PATH . '/sync') {
                mkdir(ROOT_PATH . '/sync');
            }
            $this->actionSyncPrice();
        }

        if (file_exists(ROOT_PATH . '/sync/sync_price.json')) {
            $response = file_get_contents(ROOT_PATH . '/sync/sync_price.json');
            $response = json_decode($response, true);
            foreach ($response as $item) {
                if ($item['product_id'] == $pid) {
                    return $item;
                }
            }
        }
    }

    protected function cURLLicence($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1');
        $response = curl_exec($ch);
        return json_decode($response, true);
    }

    protected function getOS()
    {

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $os_platform = "Unknown OS Platform";

        $os_array = array(
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );
        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }
        return $os_platform;
    }

}
