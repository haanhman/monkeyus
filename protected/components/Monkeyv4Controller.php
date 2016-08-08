<?php

class Monkeyv4Controller extends WebserviceController
{
    protected $_sv;
    protected $version = 'monkeyv4';
    protected $lang;
    protected $domain = DOMAIN_MAIN;
    protected $domain_data = DOMAIN_DATA;
    protected $message = 'iosv2';
    protected $bucket = 'monkeyv4';
    protected $domain_zip_vn = DOMAIN_ZIP_VN;
    protected $service_stop = false;
    protected $app_version = '';

    public function init()
    {
        parent::init();
        if($_GET['ver'] >= 19) {
            $this->app_version = isset($_GET['ver']) ? trim($_GET['ver']) . '_' : '';
        }


        if (DOMAIN_ZIP_VN == 'http://zip.daybehoc.com') {
            $this->domain_zip_vn = 'http://zip.daybehoc.com/monkeyv4';
        }
        $sv = isset($_GET['sv']) ? intval($_GET['sv']) : 0;
        $this->_sv = $sv;
        $arrUrl = array(
            'onepay/return',
            'onepay/finish',
            'sticker/download',
            'sampledata/index',
            'sampledata/fb',
            'sampledata/bestserver',
            'sampledata/deviceserver',
            'sampledata/notfound',
            'sampledata/testfile',
            'sampledata/server',
            'sampledata/location',
            'push/register',
            'facebook/info',
            'feedback/index',
            'index/',
            'account/',
            'subscribe/',
            'upgrade/',
        );
        foreach ($arrUrl as $item) {
            $prefix_url = '/' . $this->version . '/' . $item;
            if (strpos($_SERVER['REQUEST_URI'], $prefix_url) === 0) {
                return;
            }
        }

        $this->firstRun();
    }

    protected function installApp()
    {
        $xml_id = $_REQUEST['xml_id'];
        if (empty($xml_id)) {
            die('Please input XMLID');
        }
        $query = "SELECT * FROM {{device_updated_xml}} WHERE id = " . $xml_id . " LIMIT 1";

        $row = Yii::app()->db_device->createCommand($query)->queryRow();
        if (empty($row)) {
            die(Yii::t($this->message, 'vui long cung cao xmlID'));
        }

        $install_time = time();
        //luu thong tin vao bang device app       
        $values = array(
            'device_id' => $this->device_id,
            'app_id' => $this->app_id,
            'xml_id' => $xml_id,
            'install_time' => $install_time,
            'os' => $this->device_os
        );
        yii_insert_row('device_app', $values, 'db_device', true);

        //update install time, ipvn
        $ip = ip_address();
        $ipvn = detectIpVN($ip, false);
        $device_info = $_REQUEST['info'];
        $values = array(
            ':install_time' => $install_time,
            ':ipvn' => $ipvn == true ? 1 : 0,
            ':id_address' => $ip,
            ':install_url' => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
            ':device_info' => $device_info
        );
        $query = "UPDATE {{device}} SET install_time = :install_time, device_info = :device_info, ipvn = :ipvn, id_address = :id_address, install_url = :install_url WHERE id = " . $this->device_id;
        Yii::app()->db_device->createCommand($query)->bindValues($values)->execute();

        //xoa nhung level cua app_id voi trang thai = view
        $query = "DELETE FROM {{device_level}} WHERE status = :status AND device_id = :device_id AND app_id = :app_id";
        $params = array(
            ':status' => 'view',
            ':device_id' => $this->device_id,
            ':app_id' => $this->app_id
        );
        Yii::app()->db_device->createCommand($query)->bindValues($params)->execute();


        //xoa sticker
        $query = "DELETE FROM tbl_device_sticker WHERE device_id = :device_id AND app_id = :app_id";
        $params = array(
            ':device_id' => $this->device_id,
            ':app_id' => $this->app_id
        );
        Yii::app()->db_device->createCommand($query)->bindValues($params)->execute();


        $xml_data = json_decode($row['xml_data'], true);

        if (!empty($xml_data['new_level'])) {
            $list_level_id = array();
            foreach ($xml_data['new_level'] as $item) {
                $list_level_id[] = $item['id'];
            }
            $query = "SELECT t1.id, t2.coins, t2.is_sale FROM {{level_language}} AS t1 "
                . "INNER JOIN edu_global.tbl_level_config AS t2 ON t1.id = t2.id "
                . "WHERE t1.id IN (" . implode(',', $list_level_id) . ") AND t1.lang_id = " . $this->lang_id;
            $list = Yii::app()->db->createCommand($query)->queryAll();
            $level_coins = array();
            $level_sale = array();
            if (!empty($list)) {
                foreach ($list as $item) {
                    $level_coins[$item['id']] = $item['coins'];
                    $level_sale[$item['id']] = $item['is_sale'];
                }
            }
            $params = array();
            foreach ($xml_data['new_level'] as $item) {
                $params[] = array(
                    'device_id' => $this->device_id,
                    'lang_id' => $item['lang_id'],
                    'level_id' => $item['id'],
                    'coins' => $item['coins'],
                    'new_coins' => isset($level_coins[$item['id']]) ? $level_coins[$item['id']] : $item['coins'],
                    'status' => 'view',
                    'server_sale' => 1,
                    'app_id' => $this->app_id
                );
            }
            yii_insert_multiple('device_level', $params, 'db_device');
        }

        //xoa het du lieu cu lien quan
        $db_device = EduDataBase::getConnection('db_device');
        $query = "DELETE FROM {{device_language}} WHERE device_id = " . $this->device_id . " AND app_id = " . $this->app_id;
        $db_device->createCommand($query)->execute();

        //insert moi
        if (!empty($xml_data['language'])) {
            $params = array();
            foreach($xml_data['language'] as $langInfo) {
                $langversion = Language::getFontAudioVersion($langInfo['lang_id']);
                $audio_version = $langversion['audio_version'];
                $font_version = $langversion['font_version'];
                $params[] = array(
                    'device_id' => $this->device_id,
                    'lang_id' => $langInfo['lang_id'],
                    'app_id' => $this->app_id,
                    'font_version' => intval($langInfo['font_version']) > $font_version ? 0 : intval($langInfo['font_version']),
                    'font_version_update' => $font_version,
                    'game_audio' => intval($langInfo['audio_version']) > $audio_version ? 0 : intval($langInfo['audio_version']),
                    'game_audio_update' => $audio_version
                );
            }
            if(!empty($params)) {
                yii_insert_multiple('device_language', $params, 'db_device', true);
            }
        }

        //neu co level_type thi update vao bang device
        if (!empty($_GET['level_type'])) {
            $query = "UPDATE {{device}} SET level_type = " . $_GET['level_type'] . " WHERE id = " . $this->device_id;
            $db_device->createCommand($query)->execute();
        }

        if (!empty($xml_data['sticker'])) {
            $params = array();
            foreach ($xml_data['sticker'] as $sticker_id) {
                $params[] = array(
                    'device_id' => $this->device_id,
                    'app_id' => $this->app_id,
                    'sticker_id' => $sticker_id
                );
            }
            yii_insert_multiple('device_sticker', $params, 'db_device');
        }
    }

    //render data
    protected function responseData($plist_data = array())
    {
        $controller = Yii::app()->controller->id;
        if (!isset($plist_data['status'])) {
            $plist_data['status'] = 1;
        }
        $plist_data['device_id'] = $this->device_id;
        $plist_data['multiple_language'] = $this->multiple_language;
        $plist_data['language_display'] = $this->language_display;

        if ($this->device_info['null_info'] == 1) {
            $plist_data['android_mac_address'] = $this->device_info['mac_address'];
        }
        plist_render($plist_data);
    }

    //lay code cua ngon ngu theo id
    protected function getLangIdByCode($code)
    {
        foreach ($this->lang as $item) {
            if ($item['code'] == $code) {
                return $item['id'];
            }
        }
    }

    //lay code cua ngon ngu theo id
    protected function getLangCode($id)
    {
        return $this->lang[$id]['code'];
    }

    /**
     * tra ve link download tuong ung voi server nguoi dung connect thanh cong
     * @param $sv
     * @param $file_name
     * @param $bucket
     * @param string $folder
     * @return string
     */
    protected function createUrlDownload($file_name, $folder = '')
    {
        if ($this->_sv == 1) {
            return cloud_Download::storage_signed_url_google($file_name, $this->bucket, $folder);
        } elseif ($this->_sv == 2) {
            return cloud_Download::storage_signed_url_amazon($file_name, $this->bucket, $folder);
        } elseif ($this->_sv == 3) {
            return cloud_Download::storage_signed_url_vn($file_name, $this->bucket, $folder);
        }

    }

}
