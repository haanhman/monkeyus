<?php

function base_url()
{
    return Yii::app()->baseUrl;
}

/**
 * @param type $msg
 * array | string
 * @param type $type
 * errormsg | success | info | warning
 */
function createMessage($msg, $type = 'success')
{
    Yii::app()->session['msg'] = $msg;
    Yii::app()->session['msg_type'] = $type;
}

function showMessage()
{
    $html = '';
    $msg = Yii::app()->session['msg'];
    if (!empty($msg)) {
        $type = Yii::app()->session['msg_type'];
        $html .= '<div class="message ' . $type . '">';
        if (is_array($msg)) {
            foreach ($msg as $m) {
                $html .= '<p>' . $m . '</p>';
            }
        } else {
            $html .= '<p>' . $msg . '</p>';
        }
        $html .= '</div>';
        unset(Yii::app()->session['msg']);
        unset(Yii::app()->session['msg_type']);
    }
    return $html;
}

function yii_insert_row($table, $params, $db = 'db', $replace = false)
{
    if (empty($table)) {
        throw new Exception('Vui long nhap ten bang');
    }
    if (empty($params)) {
        throw new Exception('Vui long nhap du lieu de insert');
    }
    $fields = array_keys($params);
    $query = "{{" . $table . "}} (`" . implode('`,`', $fields) . "`) VALUES ";
    if ($replace == true) {
        $query = "REPLACE INTO " . $query;
    } else {
        $query = "INSERT IGNORE INTO " . $query;
    }

    $i = 1;
    $query .= "(";
    foreach ($fields as $field) {
        $query .= ":" . $field . ",";
    }
    $query = trim($query, ',');
    $query .= ")";
    return Yii::app()->$db->createCommand($query)->bindValues($params)->execute();
}

function yii_update_row($table, $params, $condition = '1', $db = 'db')
{
    if (empty($table)) {
        throw new Exception('Vui long nhap ten bang');
    }
    if (empty($params)) {
        throw new Exception('Vui long nhap du lieu de thuc thi cau lenh update');
    }
    $fields = array_keys($params);
    $query = "UPDATE {{" . $table . "}} SET ";
    $tags = array();
    foreach ($fields as $field) {
        $tags[] = '`' . $field . '`' . ' = :' . $field;
    }
    $query .= implode(', ', $tags) . " WHERE " . $condition;
    $database = EduDataBase::getConnection($db);
    $values = array();
    foreach ($params as $key => $vl) {
        $values[':' . $key] = trim($vl);
    }
    return $database->createCommand($query)->bindValues($values)->execute();
}

/**
 * $params = array(
 * 'fields' => array('name', 'age'),
 * 'values' => array(
 * array('name' => 'Ha Anh Man', 'age' => 24),
 * array('name' => 'Ha Anh Man 2', 'age' => 25)
 * )
 * );
 * @param type $table
 * @param type $params
 * @param type $db
 * @throws Exception
 */
function yii_insert_multiple($table, $params = array(), $db = 'db', $replace = false)
{
    if (empty($table)) {
        throw new Exception('Vui long nhap ten bang');
    }
    if (empty($params)) {
        throw new Exception('Vui long nhap du lieu de insert');
    }
    $fields = array_keys($params[0]);
    $count = count($params);
    $query = "{{" . $table . "}} (`" . implode('`,`', $fields) . "`) VALUES ";
    if ($replace == true) {
        $query = "REPLACE INTO " . $query;
    } else {
        $query = "INSERT IGNORE INTO " . $query;
    }

    for ($i = 0; $i < $count; $i++) {
        $query .= "(";
        foreach ($fields as $field) {
            $query .= ":" . $field . "_" . $i . ",";
        }
        $query = trim($query, ',');
        $query .= "),";
    }
    $query = trim($query, ',');
    $command = Yii::app()->$db->createCommand($query);
    for ($i = 0; $i < $count; $i++) {
        foreach ($fields as $field) {
            $command->bindParam(':' . $field . '_' . $i, $params[$i][$field]);
        }
    }
    return $command->execute();
}

function vietdecode($value)
{
    $value = trim($value);
    $value = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $value);
    $value = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $value);
    $value = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $value);
    $value = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $value);
    $value = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $value);
    $value = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $value);
    $value = preg_replace("/(đ)/", 'd', $value);
    $value = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $value);
    $value = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $value);
    $value = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $value);
    $value = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $value);
    $value = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $value);
    $value = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $value);
    $value = preg_replace("/(Đ)/", 'D', $value);

    /**
     *   : = %3a   / = %2f   @ = %40
     *   + = %2b   ( = %28   ) = %29
     *   ? = %3f   = = %3d   & = %26
     */
    $trans = array(
        ':' => '', '/' => '', '@' => '', '+' => '', '(' => '', ')' => '', '?' => '', '=' => '', '&' => ''
    );
    $value = strtr($value, $trans);

    $value = trim($value, '-');
    return strtolower($value);
}

/**
 * function clean URL
 * return string url chi co cac ky tu tu a-z, 0-9 va khong chap nhan cac ky tu dac biet
 */
function change_url_seo($string, $file = false)
{
    $value = vietdecode($string);
    if ($file == false) {
        $value = preg_replace("/[^a-zA-Z0-9]/ism", '-', $value);
    } else {
        $value = preg_replace("/[^a-zA-Z0-9\.]/ism", '-', $value);
    }
    $value = preg_replace("/[\-]+/ism", '-', $value);
    if ($file == false) {
        preg_match_all('#[a-zA-Z0-9\s\-\+]+#im', $value, $matches);
    } else {
        preg_match_all('#[a-zA-Z0-9\s\-\+\.]+#im', $value, $matches);
    }
    $value = implode('', $matches[0]);
    $value = trim($value);
    $value = preg_replace('/\s+/', '-', $value);
    $value = preg_replace('/(\+)+/', '-', $value);
    $value = preg_replace('/(\-)+/', '-', $value);
    return trim($value, '-');
}

function general_character($length = 1)
{
    $character = 'qwertyuiopasdfghjklzxcvbnm1234567890';
    $character_length = strlen($character) - 1;
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $random = rand(0, $character_length);
        $str .= $character[$random];
    }
    return $str;
}

function create_folder($path, $sub)
{
    if (!is_dir($path)) {
        mkdir($path);
    }
    $sub_path = '';
    $strleng = strlen($sub);
    for ($i = 0; $i < $strleng; $i++) {
        $sub_path .= '/' . $sub[$i];
        if (!is_dir($path . $sub_path)) {
            mkdir($path . $sub_path);
        }
    }
    return $sub_path;
}

function create_sub_folder($path, $sub_folder)
{
    $sub_path = '';
    $arr = explode('/', trim($sub_folder, '/'));
    $strleng = count($arr);
    for ($i = 0; $i < $strleng; $i++) {
        $sub_path .= '/' . $arr[$i];
        if (!is_dir($path . $sub_path)) {
            mkdir($path . $sub_path);
        }
    }
    return $sub_path;
}

function copy_folder($source_folder, $dest_folder)
{
    try {
        if (!is_dir($dest_folder)) {
            mkdir($dest_folder);
        }

        $dir = new DirectoryIterator($source_folder);
        foreach ($dir as $fileinfo) {
            $file = $fileinfo->getFilename();
            if (!$fileinfo->isDot() && $fileinfo->isFile()) {
                $source = $source_folder . '/' . $file;
                $dest = $dest_folder . '/' . $file;
                @copy($source, $dest);
            } elseif (!$fileinfo->isDot() && $fileinfo->isDir()) {
                copy_folder($source_folder . '/' . $file, $dest_folder . '/' . $file);
            }
        }
    } catch (Exception $exc) {

    }
}

function get_image_file_ext_name($file_name)
{
    $arr = explode('.', $file_name);
    return array(
        'ext' => array_pop($arr),
        'file_name' => implode('.', $arr)
    );
}

/**
 *
 * @param type $file_name
 * @param type $size
 * full | large | medium | small
 */
function get_image_path($type, $file_name, $size = 'small')
{
    $url = Yii::app()->baseUrl;
    $arr = get_image_file_ext_name($file_name);
    $ext = $arr['ext'];
    if ($type == 'image') {
        $url = DOMAIN_DATA . '/image/' . $arr['file_name'] . '_' . $size . '.' . $arr['ext'];
    }
    return $url;
}

function get_doulingo_image($file_name, $source = false)
{
    if (!$source) {
        return DOMAIN_DATA . '/duolingo/image/' . $file_name;
    } else {
        return DOULINGO_IMAGE . '/' . $file_name;
    }
}

function get_doulingo_video($video_file, $source = false)
{
    if (!$source) {
        return DOMAIN_DATA . '/duolingo/video/' . $video_file;
    } else {
        return DOULINGO_VIDEO . '/' . $video_file;
    }
}

function get_video_path($file_name, $source = false, $hd = true)
{
    if ($source == true) {
        return ($hd == true ? PRIVATE_VIDEO_PATH : PRIVATE_VIDEO_SMALL_PATH) . '/' . get_file_name_path($file_name);
    }
    $url = DOMAIN_DATA . '/' . ($hd == true ? 'video' : 'video_small') . '/' . get_file_name_path($file_name);
    return $url;
}

function check_exits_small_video($video_file)
{
    $video_file = PRIVATE_VIDEO_PATH . '/' . str_replace('.mp4', '_small.mp4', $video_file);
    return file_exists($video_file);
}

function get_audio_path($file_name, $source = false, $fake = false)
{
    if ($source == true) {
        return ($fake == false ? PRIVATE_AUDIO_PATH : PRIVATE_AUDIO_FAKE_PATH) . '/' . get_file_name_path($file_name);
    }
    $url = DOMAIN_DATA . '/' . ($fake == false ? 'audio' : 'audio_fake') . '/' . get_file_name_path($file_name);
    return $url;
}

function get_file_name_path($file_name)
{
    return $file_name;
}

function image_source_path($file_name)
{
    return DOMAIN_DATA . '/source_picture/' . $file_name;
}

function remove_image($type = 'image', $filename)
{
    if ($type == 'image') {
        $path = PRIVATE_IMG_PATH;
    }
    $list_folder = array('large', 'medium', 'small');
    //unlink($path . '/original/' . $filename);
    $arr = get_image_file_ext_name($filename);


    foreach ($list_folder as $folder) {
        @unlink($path . '/' . $arr['file_name'] . '_' . $folder . '.' . $arr['ext']);
    }
}

function remove_video($filename, $hd = true)
{
    $filename = get_file_name_path($filename);
    if ($hd == true) {
        @unlink(PRIVATE_VIDEO_PATH . '/' . $filename);
        //xoa file video nho neu co
        $small_filename = str_replace('.mp4', '_small.mp4', $filename);
        @unlink(PRIVATE_VIDEO_PATH . '/' . $small_filename);
    } else {
        @unlink(PRIVATE_VIDEO_SMALL_PATH . '/' . $filename);
    }
}

function remove_audio($filename, $fake = false)
{
    return;
    $audio_android = str_replace('.mp3', ANDROID_PREFIX, $filename);
    $filename = get_file_name_path($filename);
    @unlink(($fake == false ? PRIVATE_AUDIO_PATH : PRIVATE_AUDIO_FAKE_PATH) . '/' . $filename);

    if (file_exists(PRIVATE_AUDIO_ANDROID . '/' . $audio_android)) {
        unlink(PRIVATE_AUDIO_ANDROID . '/' . $audio_android);
    }
}

/**
 *
 * @param type $source_image
 * @param type $file_name
 * @param type $sub_path
 * @param type $fullPath
 */
function upload_image($source_image, $file_name, $prefix, $fullPath, $original = false)
{
    //$name_original = $file_name;    
    //copy lai anh nguon cho vao 1 thu muc luu tru
    if (!is_dir($fullPath . '/original')) {
        mkdir($fullPath . '/original');
    }
    $path_upload_base = $fullPath . '/original/' . $file_name;
    move_uploaded_file($source_image, $path_upload_base);
    //end

    $arr = get_image_file_ext_name($file_name);
    $file_name = $arr['file_name'];
    $ext = $arr['ext'];

    //tao tai ten file lung tung chuong cho bon muon copy cua minh cung nan luon
    $file_name = general_character(10) . time();
    $file_name = md5($file_name);

    $list_folder = array('large' => 1, 'medium' => 2, 'small' => 4);
    if ($original) {
        $list_folder = array('large' => 1, 'small' => 4);
    }
    foreach ($list_folder as $folder => $percent) {
        create_folder($fullPath, $prefix);
        $path_upload = $fullPath . '/' . $prefix . '/' . $file_name . '_' . $folder . '.' . $ext;
        if (!$original) {
            image_handler($path_upload_base, $path_upload, IMG_WIDTH / $percent, IMG_HEIGHT / $percent, $folder);
        } else {
            image_handler($path_upload_base, $path_upload, 440 / $percent, 440 / $percent, $folder);
        }
    }
    @unlink($path_upload_base);
    return $file_name . '.' . $ext;
}

function get_image_real($filename, $real_file = false)
{
    if ($real_file == true) {
        return PRIVATE_IMG_PATH . '/' . $filename;
    }
    $list_folder = array('large', 'medium', 'small');
    $arr = explode('.', $filename);
    $ext = array_pop($arr);
    $filename = implode('.', $arr);
    $data = array();
    foreach ($list_folder as $folder) {
        $data[] = $filename . '_' . $folder . '.' . $ext;
    }
    return $data;
}

function upload_video($source_video, $file_name, $prefix, $hd = true)
{
    $fullPath = $hd == true ? PRIVATE_VIDEO_PATH : PRIVATE_VIDEO_SMALL_PATH;

    create_folder($fullPath, $prefix);

    $arr = get_image_file_ext_name($file_name);
    $file_name = $arr['file_name'];
    $ext = $arr['ext'];

    //tao tai ten file lung tung chuong cho bon muon copy cua minh cung nan luon
    $file_name = general_character(10) . time();
    $file_name = md5($file_name);

    $path_upload_base = $fullPath . '/' . $prefix . '/' . $file_name . '.' . $ext;
    move_uploaded_file($source_video, $path_upload_base);

    return $file_name . '.' . $ext;
}

function upload_audio($source_audio, $file_name, $prefix, $fake = false)
{
    $fullPath = $fake == false ? PRIVATE_AUDIO_PATH : PRIVATE_AUDIO_FAKE_PATH;
    create_folder($fullPath, $prefix);

    $arr = get_image_file_ext_name($file_name);
    $file_name = $arr['file_name'];
    $ext = $arr['ext'];

    //tao tai ten file lung tung chuong cho bon muon copy cua minh cung nan luon
    $file_name = general_character(10) . time();
    $file_name = md5($file_name);

    $path_upload_base = $fullPath . '/' . $prefix . '/' . $file_name . '.' . $ext;
    move_uploaded_file($source_audio, $path_upload_base);
    return $file_name . '.' . $ext;
}

function image_handler($source_image, $destination, $tn_w = 100, $tn_h = 100, $folder = '', $quality = 80)
{
    #find out what type of image this is    
    $info = getimagesize($source_image);
//    if ($info[0] == IMG_WIDTH && $info[1] == IMG_HEIGHT && $folder == 'large') {
//        copy($source_image, $destination);
//        return false;
//    }
    $imgtype = image_type_to_mime_type($info[2]);

    #assuming the mime type is correct
    switch ($imgtype) {
        case 'image/jpeg':
            $source = imagecreatefromjpeg($source_image);
            break;
        case 'image/gif':
            $source = imagecreatefromgif($source_image);
            break;
        case 'image/png':
            $source = imagecreatefrompng($source_image);
            break;
        default:
            die('Invalid image type.');
    }
    #Figure out the dimensions of the image and the dimensions of the desired thumbnail
    $src_w = imagesx($source);
    $src_h = imagesy($source);
    $src_ratio = $src_w / $src_h;
    #Do some math to figure out which way we'll need to crop the image
    #to get it proportional to the new size, then crop or adjust as needed
//    if ($tn_w / $tn_h > $src_ratio) {
//        $new_h = $tn_w / $src_ratio;
//        $new_w = $tn_w;
//    } else {
//        $new_w = $tn_h * $src_ratio;
//        $new_h = $tn_h;
//    }
//
//    if ($tn_w > $src_w | $tn_h > $src_h) {
//        $tn_w = $new_w = $src_w;
//        $tn_h = $new_h = $src_h;
//    }
    $new_w = $tn_w;
    $new_h = $tn_h;
    $x_mid = $new_w / 2;
    $y_mid = $new_h / 2;

    $newpic = imagecreatetruecolor(round($new_w), round($new_h));
    // preserve transparency
    if ($imgtype == 'image/png') {
        imagecolortransparent($newpic, imagecolorallocatealpha($newpic, 0, 0, 0, 127));
        imagealphablending($newpic, false);
        imagesavealpha($newpic, true);
    }
    imagecopyresampled($newpic, $source, 0, 0, 0, 0, $new_w, $new_h, $src_w, $src_h);
    $final = imagecreatetruecolor($tn_w, $tn_h);
    imagecopyresampled($final, $newpic, 0, 0, ($x_mid - ($tn_w / 2)), ($y_mid - ($tn_h / 2)), $tn_w, $tn_h, $tn_w, $tn_h);

    switch ($imgtype) {
        case 'image/jpeg':
            return imagejpeg($final, $destination, $quality);
        case 'image/gif':
            return imagegif($final, $destination);
        case 'image/png':
            return imagepng($newpic, $destination);
    }
    return false;
}

/**
 * kiem tra dinh dang file anh truoc khi upload
 *
 * @param string $pattern
 * @param string $filename
 * @param string $tmp_file
 * @return boolean @date 22/04/2012
 */
function image_match($filename, $tmp_file, $pattern = 'png|jpe?g|gif')
{
    $pattern = '/^.*\.(' . $pattern . ')$/is';
    if (preg_match($pattern, $filename)) {
        if (getimagesize($tmp_file)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

//auto detect duration
function auto_detect_duration($filename)
{
    $duration = 0;
    require_once(LIB_PATH . '/getid3/getid3.php');
    $getID3 = new getID3;
    // Analyze file and store returned data in $ThisFileInfo
    $ThisFileInfo = $getID3->analyze($filename);

    if (!empty($ThisFileInfo['playtime_seconds'])) {
        $duration = $ThisFileInfo['playtime_seconds'] * 1000;
    }
    return intval($duration);
}

function stock_preview_image($url)
{
    $pattern = '/pic-([0-9]+)\//ims';
    preg_match_all($pattern, $url, $matches);
    return 'http://image.shutterstock.com/display_pic_with_logo/1/1/a-' . $matches[1][0] . '.jpg?time=' . time();
}

function remove_query_string_url($url)
{
    if (empty($url)) {
        return '';
    }
    $arr = parse_url($url);
    if (isset($arr['query'])) {
        unset($arr['query']);
    }
    $url = $arr['scheme'] . '://' . $arr['host'] . $arr['path'];
    return $url;
}

function check_access_action($controller, $action, $permission, $admin_system)
{
    if ($admin_system == 1) {
        return true;
    }
    $access = in_array($action, $permission[$controller]);
    return $access;
}

function google_save_audio($text, $lang_id = 1)
{
    return '';
    if ($_GET['test'] == 1) {
        echo 'Lay audio google: ' . $text . '<br />';
    }
    global $english_id;
    if (in_array($lang_id, $english_id)) {
        $code = 'en';
    } else {
        //Phap fr
        $query = "SELECT code FROM {{languages}} WHERE id = " . $lang_id;
        $code = Yii::app()->db_global->createCommand($query)->queryScalar();
        if (empty($code)) {
            $code = 'en';
        }
    }
    $url = 'http://translate.google.com/translate_tts?ie=UTF-8&q=' . urlencode($text) . '&tl=' . $code;
    $prefix = general_character();
    $filename = time() . '_' . change_url_seo($text) . '.mp3';
    $fullPath = PRIVATE_AUDIO_FAKE_PATH;
    create_folder($fullPath, $prefix);
    $path_upload_base = $fullPath . '/' . $prefix . '/' . $filename;

    $ch = curl_init($url);

//    curl_setopt($ch, CURLOPT_PROXY, '84.253.120.4');
//    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);

    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1');
    $response = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_status == 302) {
        //echo $response;die;
        echo $url . '<br />';
        die('Google baner');
    }

    file_put_contents($path_upload_base, $response);
    return $prefix . '/' . $filename;
}

function rrmdir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    rrmdir($dir . "/" . $object);
                else
                    unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

function sync_text_audio($sync_data)
{
    $data = array();
    $text = trim($sync_data);
    if (empty($sync_data)) {
        return '';
    }
    $arr = explode('{', $text);
    $arr = array_filter($arr);

    $tmp = array();
    $i = 1;
    foreach ($arr as $item) {
        $item = trim($item);
        $row = str_replace('\k', '', $item);
        $path = explode('}', $row);
        if (!empty($path[1])) {
            $tmp[] = array(
                'word' => $path[1],
                'time' => $path[0]
            );
        } else {
            $tmp[] = array(
                'word' => 's' . $i++,
                'time' => $path[0]
            );
        }
    }

    $pattern = '/^s\d+$/';
    $start = 0;
    $w_start = 0;
    foreach ($tmp as $item) {
        $word = $item['word'];
        $time = $item['time'];
        if (!preg_match($pattern, $word)) {
            $wlen = strlen($word);
            $data[] = array(
                'w' => $word,
                'ts' => $w_start,
                'te' => $w_start + ($wlen - 1),
                's' => $start * 10,
                'e' => ($start + $time) * 10
            );
            $w_start += ($wlen + 1);
        }
        $start += $time;
    }
    /*
     * $data[] = array(
      'w' => $word,
      's' => $s,
      'e' => $e,
      'ts' => $ts,
      'te' => $te
      );
     */
    return json_encode($data);
}

/**
 * tao du lieu phonic
 * @param type $sync_data
 * @param type $hcolor
 * @param type $ncolor
 * @return string
 */
function phonic_synctext($sync_data, &$data = array(), $hcolor = '1,0,1', $ncolor = '1,1,1')
{
    $text = trim($sync_data);
    if (empty($sync_data)) {
        return '';
    }
    $text = str_replace(' ', '', $text);
    $arr = explode('{', $text);
    $arr = array_filter($arr);

    $index = 0;
    $start = 0;

    foreach ($arr as $item) {
        $item = trim($item);
        $row = str_replace('\k', '', $item);
        $path = explode('}', $row);

        //check xem co ky tu [] hay khong
        $append = '';
        $pos = strpos($path[1], '[');
        if ($pos !== false) {
            $append = substr($path[1], $pos, strlen($path[1]));
            $path[1] = substr($path[1], 0, $pos);

            $append = str_replace(array('[', ']'), '', $append);
        }


        $chars = array();
        $length = strlen($path[1]);
        for ($i = 0; $i < $length; $i++) {
            $chars[] = $index++;
        }

        if (strlen($append) > 0) {
            $arr_append = explode(',', $append);
            foreach ($arr_append as $index) {
                $chars[] = $index;
            }
        }

        $start = ($path[0] * 10);
        $time = $start / 1000;
        if ($time > 0) {
            $data[] = array(
                'time' => $time,
                'chars' => $chars,
                'hcolor' => $hcolor,
                'ncolor' => $ncolor,
            );
        }
    }
    $data[] = array(
        'time' => 1,
        'chars' => array(),
        'hcolor' => $hcolor,
        'ncolor' => $ncolor,
    );
}

function phonic_audio_fast($card_name, $duration, &$data = array(), $hcolor = '1,0,1', $ncolor = '1,1,1')
{

    $chars = array();
    $length = strlen($card_name);
    $index = 0;
    for ($i = 0; $i < $length; $i++) {
        $chars[] = $index++;
    }

    $data[] = array(
        'time' => $duration / 1000,
        'chars' => $chars,
        'hcolor' => $hcolor,
        'ncolor' => $ncolor,
    );
    $data[] = array(
        'time' => 1,
        'chars' => array(),
        'hcolor' => $hcolor,
        'ncolor' => $ncolor,
    );
}

function plist_create_file($structure, $dest)
{
    require_once(ROOT_PATH . '/lib/cfpropertylist/CFPropertyList.php');
    /*
     * create a new CFPropertyList instance without loading any content
     */
    $plist = new CFPropertyList();

    $td = new CFTypeDetector();
    $guessedStructure = $td->toCFType($structure);
    $plist->add($guessedStructure);
    $plist->saveXML($dest);
}

function plist_render($structure)
{
    if ($_GET['test'] == 1) {
        echo '<pre>' . print_r($structure, true) . '</pre>';
        return;
    }
    require_once(ROOT_PATH . '/lib/cfpropertylist/CFPropertyList.php');
    /*
     * create a new CFPropertyList instance without loading any content
     */
    $plist = new CFPropertyList();

    $td = new CFTypeDetector();
    $guessedStructure = $td->toCFType($structure);
    $plist->add($guessedStructure);
    echo $plist->toXML(true);
}

function copy_category_thumbnail($thumb_file, $type, &$zip, $zip_level = false)
{
    $folder_device = 'resources-' . ($type == 'phonehd' ? 'tablet' : $type);
    $folder_dest = 'resources-' . $type;

    //copy anh khong lock
    $path = PUBLIC_IMG_CATEGORY . '/' . $folder_device . '/' . $thumb_file;
    $file_dest = $thumb_file;
    if ($type == 'phonehd') {
        $file_dest = str_replace('tablet', 'phonehd', $file_dest);
    }

    $file_dest = str_replace('_' . $type, '', $file_dest);
    $dest = 'cards/category/' . $folder_dest . '/' . $file_dest;
    $zip->addFile($path, $dest);


    //copy anh lock                
//    if (!$zip_level) {
//        $arr = explode('_', $thumb_file);
//        $thumb_file = $arr[0] . '_' . $arr[2];
//        $arr[1] = str_replace('.png', '_lock.png', $arr[1]);
//        $thumb_file = implode('_', $arr);
//        $path = PUBLIC_IMG_CATEGORY . '/' . $folder_device . '/' . $thumb_file;
//
//        $file_dest = $thumb_file;
//        if ($type == 'phonehd') {
//            $file_dest = str_replace('tablet', 'phonehd', $file_dest);
//        }
//        $file_dest = str_replace('_' . $type, '', $file_dest);
//        $dest = 'cards/category/' . $folder_dest . '/' . $file_dest;
//        $zip->addFile($path, $dest);
//    }
}

function convert_time($date, $granularity = 1)
{
    $retval = '';
    //return date('d/m/Y H:i:s', $date);
    //$date = strtotime($date);
    $difference = time() - $date;
    if ($difference <= 1) {
        return '1 second ago';
    }
    $periods = array('decade' => 315360000,
        'year' => 31536000,
        'month' => 2628000,
        'week' => 604800,
        'day' => 86400,
        'hour' => 3600,
        'minute' => 60,
        'second' => 1);

    if ($difference > $periods['month']) {
        return date('F, d, Y', $date);
    } else {
        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = floor($difference / $value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '') . $time . ' ';
                $retval .= (($time > 1) ? $key . 's' : $key);
                $granularity--;
            }
            if ($granularity == '0') {
                break;
            }
        }
        return $retval . ' ago';
    }
}

/**
 * lay IP cua client
 * - hien server lom dung tam ham nay
 * - khi nao server hon thi dung ham cua drupal core: ip_address()
 * @staticvar string $ip_address
 * @return string
 */
function ip_address()
{
    $ip_address = NULL;
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address_parts = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        foreach ($ip_address_parts as $ip) {
            if ($ip != '127.0.0.1') {
                $ip_address = $ip;
                return $ip;
            }
        }
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }

//    if ($ip_address == '113.190.238.64') {
//        return '200.179.192.4';
//    }

    return $ip_address;
}

function detectIpVN($ip, $break = true)
{
    if ($break) {
        if ($_GET['us'] == 1 || DOWNLOAD_US == 1) {
            return false;
        }
        if (DOWNLOAD_VN == 1) {
            return true;
        }
    }
    if ($ip == '127.0.0.1') {
        return true;
    }
    $parts = explode('.', $ip);
    foreach ($parts as $index => $sub) {
        $parts[$index] = str_pad($sub, 3, '0', STR_PAD_LEFT);
    }
    $ip = implode('', $parts);
    $db_global = EduDataBase::getConnection('db_global');
    $query = "SELECT id,code FROM {{ip_vn}} WHERE range_start <= :ip AND range_end >= :ip";
    $row = $db_global->createCommand($query)->bindValues(array(':ip' => $ip))->QueryRow();
    if ($row['code'] == 'VN') {
        return true;
    }
    return false;
}

function detectIpVN2($ip)
{
    if ($_GET['us'] == 1 || DOWNLOAD_US == 1) {
        return false;
    }
    if (ONEPAY_OPEN == FALSE) {
        return 0;
    }
    $parts = explode('.', $ip);
    foreach ($parts as $index => $sub) {
        $parts[$index] = str_pad($sub, 3, '0', STR_PAD_LEFT);
    }
    $ip = implode('', $parts);
    $query = "SELECT id,code FROM {{ip_vn}} WHERE range_start <= :ip AND range_end >= :ip";
    $row = Yii::app()->db_global->createCommand($query)->bindValues(array(':ip' => $ip))->queryRow();
    if (!empty($row)) {
        if ($row['code'] == 'VN') {
            return 1;
        }
    }
    return 0;
}

function send_html_mail($to_email, $subject, $content_html, $attachment = '')
{
    $rn = "\r\n";
    $boundary = md5(rand());
    $MAIL_FROMNAME_CONTACT = 'noreply@daybehoc.com';
    $MAIL_FROM_CONTACT = 'noreply@daybehoc.com';
    $headers = 'MIME-Version: 1.0' . "\r\n";
    //$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'Content-Type: multipart/related;boundary=' . $boundary . $rn;
    $headers .= "From: " . $MAIL_FROMNAME_CONTACT . " <" . $MAIL_FROM_CONTACT . "> \r\n" . "Reply-To: " . $MAIL_FROMNAME_CONTACT . " <" . $MAIL_FROM_CONTACT . "> \r\n" . "CC: " . $MAIL_FROMNAME_CONTACT . " <" . $MAIL_FROM_CONTACT . "> \r\n";

    //if attachement
    if ($attachment != '' && file_exists($attachment)) {
        $conAttached = prepareAttachment($attachment);
        if ($conAttached !== false) {
            $headers .= $rn . '--' . $boundary . $rn;
            $headers .= $conAttached;
        }
    }

    $send = mail($to_email, $subject, $content_html, $headers);
    return $send;
}

/**
 *
 * send mail
 * @param string $from Email nguoi gui
 * @param string $to Email nguoi nhan
 * @param string $subject Tieu de mail
 * @param string $content Noi dung email (Chap nhan ca HTML)
 * @param string $fromName Ten nguoi gui (option)
 * @param int $server
 * @return boolean
 * @author anhmantk
 */
function send_mail($from = null, $to, $subject, $content, $cc = array(), $fromName = 'Monkeyjunior.vn', $mail_server = 1, $attachment = '')
{
    if ($_SERVER['SERVER_NAME'] == 'monkeyjunior.com.vn') {
        return;
    }
    if (empty($to)) {
        return -1;
    }
    $mail_server = 2;
    require_once ROOT_PATH . '/lib/phpmailer/class.phpmailer.php';
    $server = array('email' => 'noreply.littlestar@gmail.com', 'password' => 'edu123!@#');
    if ($mail_server == 2) {
        $server = array('email' => 'noreply.earlystart@gmail.com', 'password' => 'EarlyStart2015');
    }

    if ($from == null) {
        $from = $server['email'];
    }
    if ($mail_server == 2) {
        $from = 'contact.earlystart@gmail.com';
    }
    $mail = new PHPMailer();
    // set charset cho noi dung mail
    $mail->CharSet = "UTF8";
    // noi dung mail
    $body = $content;
    // khoi tao send mail voi SMTP
    // khoi tao send mail voi SMTP
    $mail->IsSMTP();
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
    $mail->Port = 465;                   // set the SMTP port for the GMAIL server
//    $mail->SMTPDebug = true;


    $mail->Username = $server['email'];  // GMAIL username
    $mail->Password = $server['password'];            // GMAIL password
    // add Reply khi an vao Reply

    $mail->AddReplyTo($from, $fromName);
    if ($attachment != '' && file_exists($attachment)) {
        $mail->AddAttachment($attachment);
    }
    // Email nguoi gui
    $mail->From = $mail_server;
    // Ten nguoi gui
    $mail->FromName = $fromName;
    // Tieu de thu
    $mail->Subject = $subject;

    $mail->WordWrap = 50; // set word wrap
    // Noi dung mail co the de dang HTML
    $mail->MsgHTML($body);
    // email nguoi gui
    $mail->AddAddress($to);
    if (!empty($cc)) {
        foreach ($cc as $c) {
            $mail->AddCC($c);
        }
    }
    if ($to != 'hoangdaoxuan@gmail.com') {
//        $mail->AddBCC('hoangdaoxuan@gmail.com');
        $mail->AddBCC('contact.earlystart@gmail.com');
    }
    // Attachment
    //$mail->AddAttachment("images/phpmailer.gif");             // attachment
    // send as HTML
    $mail->IsHTML(true);
    if (!$mail->Send()) {
        if ($_GET['a'] == 1) {
            return "Mailer Error: " . $mail->ErrorInfo;
        }
        return false; // send error
    } else {
        return true; // send success
    }
}

function random_array_function($list)
{
    $count = count($list);
    if (count($list) > 1) {
        $tmp = array();
        for ($i = 0; $i < $count; $i++) {
            $index = array_rand($list);
            $tmp[] = $list[$index];
            unset($list[$index]);
        }
        $list = $tmp;
    }
    return $list;
}

function get_audio_android($filename, $source = false)
{
    $file = str_replace('.mp3', ANDROID_PREFIX, $filename);
    if ($source) {
        $file = PRIVATE_AUDIO_ANDROID . '/' . $file;
    }
    return $file;
}

function get_card_path(&$paths, $folder, $device, $os = OS_IOS, $full = true)
{

    if ($full) {
        $card_path = $folder . '/full_path.json';
    } else {
        $card_path = $folder . '/fast_path.json';
    }

    $result = file_get_contents($card_path);
    $result = json_decode($result, true);


    //loai bo anh khong tuong thich voi device
    foreach ($result as $index => $file) {
        if (strpos($file, 'image') === 0) {

            if ($device == 'tablethd') {
                if (strpos($file, '_small') | strpos($file, '_medium')) {
                    unset($result[$index]);
                }
            } elseif ($device == 'phone') {
                if (strpos($file, '_medium') | strpos($file, '_large')) {
                    unset($result[$index]);
                }
            } else {
                if (strpos($file, '_small') | strpos($file, '_large')) {
                    unset($result[$index]);
                }
            }
        }
    }

    //neu os = android thi lay audio android
    if ($os == OS_ANDROID) {
        foreach ($result as $index => $file) {
            if (strpos($file, 'audio') === 0) {
                $f = str_replace('.mp3', ANDROID_PREFIX, $file);
                $check = str_replace('audio', 'audio_android', $f);
                $result[$index] = $check;
            }
            if (strpos($file, 'duolingo/mp3') === 0) {
                if (strpos($file, '_android.mp3') !== false) {
                    $result[$index] = $file;
                } else {
                    unset($result[$index]);
                }
            }
        }
    } else {
        foreach ($result as $index => $file) {
            if (strpos($file, 'duolingo/mp3') === 0) {
                if (strpos($file, '_android.mp3') !== false) {
                    unset($result[$index]);
                } else {
                    $result[$index] = $file;
                }
            }
        }
    }

    foreach ($result as $index => $file) {
        $result[$index] = $folder . '/' . $file;
    }
    $result[] = $folder . '/card_info.txt';
    $paths[$folder . '/'] = $result;
}

/**
 * kiem tra ngon ngu co thuoc tieng anh hay khong
 * @global type $english_id
 * @param type $lang_id
 * @return type
 */
function is_english($lang_id)
{
    global $english_id;
    return in_array($lang_id, $english_id);
}

function scan_folder($folder, &$paths)
{
    if (!is_dir($folder)) {
        return array();
    }
    $dir = new DirectoryIterator($folder);
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot() && $fileinfo->isFile()) {
            $paths[] = $folder . '/' . $fileinfo->getFilename();
        } elseif (!$fileinfo->isDot() && $fileinfo->isDir()) {
            $d = $fileinfo->getFilename();
            $fd = $folder . '/' . $d;
            scan_folder($fd, $paths);
        }
    }
}

function get_all_image($img)
{
    $source = PRIVATE_IMG_PATH . '/' . $img;
    $parts = explode('.', $img);
    $ext = array_pop($parts);

    $size = array('small', 'medium', 'large');
    $arr = array();
    foreach ($size as $s) {
        $arr[] = str_replace('.' . $ext, '_' . $s . '.' . $ext, $source);
    }
    return $arr;
}

/**
 * Copy a file, or recursively copy a folder and its contents
 * @param       string $source Source path
 * @param       string $dest Destination path
 * @param       string $permissions New folder creation permissions
 * @return      bool     Returns true on success, false on failure
 */
function xcopy($source, $dest, $permissions = 0755)
{
    // Check for symlinks
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }

    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest, $permissions);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        xcopy("$source/$entry", "$dest/$entry", $permissions);
    }

    // Clean up
    $dir->close();
    return true;
}

function getShutterstockImage($shutterstock_id)
{
    if (!is_dir(SHUTTERSTOCK_IMAGE)) {
        mkdir(SHUTTERSTOCK_IMAGE);
    }

    $save_path = SHUTTERSTOCK_IMAGE . '/' . $shutterstock_id . '.jpg';
    if (!file_exists($save_path)) {
        $img_path = 'http://image.shutterstock.com/display_pic_with_logo/1/1/a-' . $shutterstock_id . '.jpg';
        $data = file_get_contents($img_path);
        file_put_contents($save_path, $data);
    }
    return DOMAIN_DATA . '/shutterstock_tmp/' . $shutterstock_id . '.jpg';
}

function checkSyncText($text, $sync)
{
    $text = trim($text);

    if (strpos($text, 'p_') !== false | strpos($text, 's_') !== false) {
        return true;
    }

    $arr = explode('}', $sync);
    $arr2 = array();
    foreach ($arr as $item) {
        $item = trim($item);
        $postion = strpos($item, "{\\");
        if ($postion === 0) {
            continue;
        }
        $ex = explode('{\k', $item);
        $t = array_shift($ex);
        $arr2[] = trim($t);
    }
    $text2 = implode(' ', $arr2);
    $text2 = trim($text2);
    $len1 = strlen($text);
    $len2 = strlen($text2);
    if (($len1 - $len2) == 1) {
        $text = substr($text, 0, $len2);
    }

    if (strtolower($text) == strtolower($text2)) {
        return true;
    }
    return false;
}

function generateCouponCode($length = 5)
{
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $coupon = '';
    for ($i = 0; $i < $length; ++$i) {
        $random = str_shuffle($chars);
        $coupon .= $random[0];
    }

    $query = "SELECT id FROM tbl_agent WHERE coupon = :coupon";
    $exits = Yii::app()->db_agent->createCommand($query)->bindValues(array(':coupon' => $coupon))->queryScalar();
    if (!empty($exits)) {
        generateCouponCode();
    }
    return $coupon;
}

function matchSentenceWord($lang_id)
{

    if ($lang_id == 1 | $lang_id == 12) {
        return true;
    }
    return false;
}

/**
 * Registers a javascript file.
 * @param string $url URL of the javascript file
 * @param integer $position the position of the JavaScript code. Valid values include the following:
 * <ul>
 * <li>CClientScript::POS_HEAD : the script is inserted in the head section right before the title element.</li>
 * <li>CClientScript::POS_BEGIN : the script is inserted at the beginning of the body section.</li>
 * <li>CClientScript::POS_END : the script is inserted at the end of the body section.</li>
 * </ul>
 * @return CClientScript the CClientScript object itself (to support method chaining, available since version 1.1.5).
 */
function register_script_file($listFile = array(), $position = CClientScript::POS_END)
{
    if (!empty($listFile)) {
        foreach ($listFile as $js) {
            Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/' . $js, $position);
        }
    }
}

/**
 * Registers a CSS file
 * @param string $url URL of the CSS file
 * @param string $media media that the CSS file should be applied to. If empty, it means all media types.
 * @return CClientScript the CClientScript object itself (to support method chaining, available since version 1.1.5).
 */
function register_css_file($listFile = array(), $media = '')
{
    if (!empty($listFile)) {
        foreach ($listFile as $css) {
            Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl . '/' . $css, $media);
        }
    }
}

function strpos_all($haystack, $str)
{

    $kytusautext = array(' ', '; ', ', ', '. ', ': ');
    $allpos = array();

    $haystack = ' ' . trim($haystack) . ' ';
    foreach ($kytusautext as $char) {
        $needle = ' ' . trim($str) . $char;
        $offset = 0;

        while (($pos = strpos($haystack, $needle, $offset)) !== FALSE) {
            $offset = $pos + 1;
            $allpos[] = $pos;
        }
    }
    return $allpos;
}

function generalLicence($length = 5)
{
    //0123456789
    $chars = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    $licence = '';
    for ($i = 0; $i < $length; ++$i) {
        $random = str_shuffle($chars);
        $licence .= $random[0];
    }
//    $licence .= '-';
//    for ($i = 0; $i < $length; ++$i) {
//        $random = str_shuffle($chars);
//        $licence .= $random[0];
//    }
    $db_global = EduDataBase::getConnection('db_global');
    $query = "SELECT id FROM tbl_licence WHERE licence = :licence";
    $exits = $db_global->createCommand($query)->bindValues(array(':licence' => $licence))->queryScalar();
    if (!empty($exits)) {
        return generalLicence();
    }
    return $licence;
}

/**
 * @return string
 * ES0191-001-998
 */
function generateSerial()
{
    $serial = 'ES';
    //ramdom 4 so dau tien
    $number = rand(0, 9999);
    $number = str_pad($number, 4, '0', STR_PAD_LEFT);
    $serial .= $number . '-';

    //ramdom 3 so tiep theo
    $number = rand(0, 999);
    $number = str_pad($number, 3, '0', STR_PAD_LEFT);
    $serial .= $number . '-';

    //ramdom 3 so cuoi cung
    $number = rand(0, 999);
    $number = str_pad($number, 3, '0', STR_PAD_LEFT);
    $serial .= $number;

    $db_global = EduDataBase::getConnection('db_global');
    $query = "SELECT id FROM tbl_licence WHERE serial = :serial";
    $exits = $db_global->createCommand($query)->bindValues(array(':serial' => $serial))->queryScalar();
    if (!empty($exits)) {
        return generateSerial();
    }

    return $serial;
}

function sort_by_checked($a, $b)
{
    if ($a['checked'] == $b['checked']) {
        return 0;
    }
    return $a['checked'] < $b['checked'] ? 1 : -1;
}

function removePath(&$path, $prefix)
{
    foreach ($path as $index => $rows) {
        foreach ($rows as $index2 => $pp) {
            if (strpos($pp, $prefix)) {
                unset($rows[$index2]);
            }
        }
        $path[$index] = $rows;
    }
}

function processJsonData(&$json, $level_type = 1)
{
    $audio_file = $video_file = $img_file = array();
    $image_id_audio = array();
    $sentence_use = array();
    $card_text_id = $json['jsdata']['id_text'];
    $sentence_use[] = $card_text_id;
    $max_audio_for_card = 2;
    if ($json['jsdata']['sight_word'] == 1 | $json['jsdata']['is_phonic'] == 1) {
        $max_audio_for_card = 1;
    }

    $audio = $json['jsdata']['audio'];
    $audio_card = array();
    foreach ($audio as $item) {
        if ($item['id_text'] == $card_text_id && $item['fast'] == 0) {
            $audio_card[] = $item['id'];
        }
    }
    $audio_2 = array_slice($audio_card, 0, $max_audio_for_card);

    foreach ($audio_2 as $aid) {
        $image_id_audio[] = $aid;
    }


    //lay 2 anh
    //$json['jsdata']['image']['normal']
    if (!empty($json['jsdata']['image']['normal'])) {
        $list_image = array_slice($json['jsdata']['image']['normal'], 0, 2);

        $allKeys = array('easy', 'medium', 'hard');


        //chi lay 1 sentence thoi
        $sid = 0;
        $arr_sentence_img = array();
        foreach ($list_image as $index => $item) {
            $img_file[] = $item['file_name'];
            foreach ($allKeys as $key) {
                if (isset($item[$key])) {
                    $allSentence = array_keys($item[$key]);
                    if ($sid != 0 && in_array($sid, $allSentence)) {
                        $item[$key] = $arr_sentence_img;
                        $item['level_key'][$key] = array_keys($item[$key]);
                        $list_image[$index] = $item;
                        continue;
                    }
                    $i = 0;
                    foreach ($item[$key] as $sentence_id => $vl) {
//                        if($i > 0) {
//                            unset($item[$key][$sentence_id]);
//                            continue;
//                        }
//                        if ($sentence_id < 0) {
//                            $audio_ids = array_slice($vl, 0, 1);
//                        } elseif($sid == 0 | $sentence_id == $sid) {
//                            $sid = $sentence_id;
//                            $audio_ids = array_slice($vl, 0, $max_audio_for_card);
//                            //kiem tra neu text_id = text_id cua card thi lay 2 audio
//                            $aid = $audio_ids[0];
//                            if(!in_array($aid, $audio_card)) {
//                                $audio_ids = array_slice($vl, 0, 1);
//                            }
//                        }

                        $audio_ids = $vl;
                        $sid = $sentence_id;
                        foreach ($audio_ids as $audio_id) {
                            $image_id_audio[] = $audio_id;
                        }
                        $item[$key][$sentence_id] = $audio_ids;
                        $sentence_use[] = $sentence_id;
                        $i++;
                    }

                    if (empty($arr_sentence_img)) {
                        $arr_sentence_img = $item[$key];
                    }

                    $item['level_key'][$key] = array_keys($item[$key]);
                    $list_image[$index] = $item;
                }
            }
        }
        $json['jsdata']['image']['normal'] = $list_image;
    }

    //lay 1 video
    $sentence_video = array();
    if (!empty($json['jsdata']['video'])) {
        foreach ($json['jsdata']['video'] as $key => $list_videos) {
            $one_video = array_shift($list_videos);
            $video_file[] = str_replace('.mp4', '', $one_video['file_name']);
            if (!empty($one_video['image'])) {
                $video_image = array_shift($one_video['image']);
                $one_video['image'] = array($video_image);
            }
            $json['jsdata']['video'][$key] = array($one_video);

            if (!empty($one_video['text_sentence'])) {
                foreach ($one_video['text_sentence'] as $vl) {
                    if ($vl['id'] > 0) {
                        $sentence_use[] = $vl['id'];
                        if ($level_type > 1) {
                            $sentence_video[] = $vl['id'];
                        }
                    }
                }
            }
        }
        foreach ($json['jsdata']['video'] as $key => $list_videos) {
            $json['jsdata']['video'][$key] = array_values($list_videos);
        }
    }


    //xu ly dong video config
    if (!empty($json['jsdata']['video_config'])) {
        $list_video_config_sudung = array();
        foreach ($json['jsdata']['video'] as $key => $list_videos) {
            foreach ($list_videos as $vd) {
                if (!empty($vd['config'])) {
                    foreach ($vd['config'] as $video_config_id) {
                        $list_video_config_sudung[] = $video_config_id;
                    }
                }
            }
        }
        foreach ($json['jsdata']['video_config'] as $key => $vl) {

            if (!in_array($key, $list_video_config_sudung)) {
                unset($json['jsdata']['video_config'][$key]);
            } else {
                foreach ($vl['config'] as $index => $config_item) {
                    $sentence_use[] = $config_item['id_text'];

                    $chon_audio_id = array();

                    //kiem tra neu text_id = text_id cua card thi lay 2 audio
                    $aid = $config_item['audio_id'][0];
                    if (!in_array($aid, $audio_card)) {
                        $audio_id = array_shift($config_item['audio_id']);
                        $chon_audio_id[] = $audio_id;
                    } else {
                        $chon_audio_id = $audio_2;
                    }
                    foreach ($chon_audio_id as $aid) {
                        $image_id_audio[] = $aid;
                    }

                    $config_item['audio_id'] = $chon_audio_id;
                    $vl['config'][$index] = $config_item;
                }

                $json['jsdata']['video_config'][$key] = $vl;
            }
        }
    }


    //anh sau video
    if (!empty($json['jsdata']['image_video'])) {
        $list_video_image_sudung = array();
        foreach ($json['jsdata']['video'] as $key => $list_videos) {
            foreach ($list_videos as $vd) {
                if (!empty($vd['image'])) {
                    foreach ($vd['image'] as $video_image_id) {
                        $list_video_image_sudung[] = $video_image_id;
                    }
                }
            }
        }

        foreach ($json['jsdata']['image_video'] as $key => $list_video_images) {

            foreach ($list_video_images as $index => $vl) {
                if (!in_array($vl['image_card'], $list_video_image_sudung)) {
                    unset($json['jsdata']['image_video'][$key][$index]);
                } elseif (!empty($vl['text_sentence'])) {
                    $img_file[] = $vl['file_name'];
                    foreach ($vl['text_sentence'] as $sentence_id) {
                        if ($sentence_id > 0) {
                            $sentence_use[] = $sentence_id;
                        }
                    }
                }
            }
        }
        foreach ($json['jsdata']['image_video'] as $key => $list_video_images) {
            $json['jsdata']['image_video'][$key] = array_values($list_video_images);
        }
    }

    //anh dung nhu video
    //lay 1 video
    if (!empty($json['jsdata']['image_same_video'])) {
        foreach ($json['jsdata']['image_same_video'] as $key => $list_videos) {
            $one_video = array_shift($list_videos);
            $img_file[] = $one_video['file_name'];
            foreach ($one_video['text_sentence'] as $sentence_id) {
                if ($sentence_id > 0) {
                    $sentence_use[] = $sentence_id;
                }
            }

            $json['jsdata']['image_same_video'][$key] = array($one_video);
        }
    }

    //chi lay 1 audio fast
    if (!empty($json['jsdata']['fast_audio'])) {

        $fast_audios = array_slice($json['jsdata']['fast_audio'], 0, $max_audio_for_card);

        foreach ($fast_audios as $aid) {
            $image_id_audio[] = $aid;
        }

        $json['jsdata']['fast_audio'] = $fast_audios;
    }

    $sentence_use = array_unique($sentence_use);

    //xu ly phan text
    $text = $json['jsdata']['text'];
    foreach ($text as $index => $item) {
        if ($item['id_text'] > 0 && !in_array($item['id_text'], $sentence_use)) {
            unset($text[$index]['id_audio']);
        } else {
            if ($item['id_text'] == $card_text_id) {
                $item['id_audio'] = $audio_2;
                $text[$index] = $item;
                continue;
            }

            $id_audio = $item['id_audio'];
            $ok = false;
            foreach ($id_audio as $aid) {
                if (in_array($aid, $image_id_audio)) {
                    $item['id_audio'] = array($aid);
                    $text[$index] = $item;
                    $ok = true;
                    break;
                }
            }
            if (!$ok) {

                if (in_array($item['id_text'], $sentence_video)) {
                    $aids = array_slice($id_audio, 0, 2);
                } else {
                    $aids = array_slice($id_audio, 0, 1);
                }

                foreach ($aids as $aid) {
                    $image_id_audio[] = $aid;
                }

                $item['id_audio'] = $aids;
                $text[$index] = $item;
            }
        }
    }
    $json['jsdata']['text'] = array_values($text);


    $image_id_audio = array_unique($image_id_audio);

    if (!empty($image_id_audio)) {
        $audio = $json['jsdata']['audio'];
        foreach ($audio as $index => $item) {
            if (!in_array($item['id'], $image_id_audio)) {
                unset($audio[$index]);
            } else {
                if (strlen($item['audio_file']) > 32) {
                    $afile = str_replace('.mp3', '', $item['audio_file']);
                    $audio_file[] = str_replace('audio/', '', $afile);
                }
            }
        }
        $json['jsdata']['audio'] = array_values($audio);
    }
    if ($_GET['test'] == 1) {
//        echo "<pre>" . print_r($audio_2, true) . "<pre>";

        echo json_encode($json);
        die;
        echo "<pre>" . print_r($json, true) . "<pre>";
        die;
    }
    return array(
        'audio_file' => !empty($audio_file) ? $audio_file : array(),
        'video_file' => !empty($video_file) ? $video_file : array(),
        'image_file' => !empty($img_file) ? $img_file : array()
    );
}

function alphabetLanguageAudio()
{
    return array(1 => 6, 12 => 7);
}

/* * *
 * @param $media_folder
 * @param $zip ZipArchive
 * @param $device_type
 * @param $os
 */

function getInstallMedia($media_folder, $zip, $device_type, $os = OS_IOS, $app_version)
{
    $paths = array();
    scan_folder(INSTALL_MEDIA, $paths);
    foreach ($paths as $index => $item) {
        if (strpos($item, '/resources-') !== false) {
            if (strpos($item, '/' . $media_folder . '/') === false) {
                unset($paths[$index]);
            }
        }
    }
    if (!empty($paths)) {
        foreach ($paths as $path_url) {
            $dest = str_replace(INSTALL_MEDIA . '/', '', $path_url);
            $zip->addFile($path_url, $dest);
        }


        if ($os == OS_IOS) {
            $zipf = PRIVATE_ZIP_PATH . '/' . $app_version . '_upgrade_' . $device_type . '.zip';
            $zip2 = new ZipArchive();
            $zip2->open($zipf, ZipArchive::CREATE);

            foreach ($paths as $path_url) {
                $dest = str_replace(INSTALL_MEDIA . '/', '', $path_url);
                $zip->addFile($path_url, $dest);
                $zip2->addFile($path_url, $dest);
            }
            $zip2->close();
            echo $zipf . '<br />';
        }
    }
}

function removeCouplet($cate_name)
{
    if (strpos($cate_name, 'Couplets') !== false) {
        $cate_name = 'Couplets';
    }
    return $cate_name;
}

function getCardInLesson($level_id)
{
    $db = EduDataBase::getConnection();
    $query = "SELECT lession FROM tbl_level_language WHERE id = " . $level_id;
    $lession = $db->createCommand($query)->queryScalar();
    $lession = json_decode($lession, true);
    $data = array();
    foreach ($lession['lession'] as $ls) {
        foreach ($ls['groups'] as $groups) {
            foreach ($groups['cards'] as $item) {
                $data[] = $item['card_id'];
            }
        }
    }
    $data = array_unique($data);
    return $data;
}


function blogFormatData($format_date, $created, $is_vn = false)
{
    if ($is_vn) {
        $format_date = 'd F Y';
    }
    $search = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
    $replace = array('Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12');
    $str = date($format_date, $created);
    if ($is_vn == true) {
        $str = strtolower($str);
        $str = str_replace($search, $replace, $str);
    }
    return $str;
}

function getLanguageTitle($lang, $is_vn = true)
{
    $name = $lang['name'];
    if ($is_vn) {
        $name = $lang['name_vn'];
    }
    return $name;
}

function filterContentImage($content)
{
    $content = str_replace('../../uploader/', '/uploader/', $content);
    $pattern = '/<img(.*?)src=("|\'|)(.*?)("|\'| )(.*?)>/s';
    preg_match_all($pattern, $content, $images);
    if (!empty($images)) {
        $search = $images[0];
        $replace = array();
        $listUrl = $images[3];
        foreach ($listUrl as $img) {
            $replace[] = '<img class="img-responsive" src="' . $img . '" alt="" />';
        }
        $content = str_replace($search, $replace, $content);
    }
    return $content;
}

function tinhToanTienAo(&$package)
{
    $tienao = $package['tienvn'] / 0.7;
    $tienao -= $tienao % 1000;
    $tienao = intval($tienao);
    $package['tienao'] = $tienao;

    //40%
    $tien40 = $tienao * 0.6;
    $tien40 -= $tien40 % 1000;
    $tien40 = intval($tien40);
    $package['giam40'] = $tien40;
    $package['giam30'] = $package['tienvn'];
}

function crawlerDetect()
{

    $crawlers = array(
        'Google' => 'Google',
        'MSN' => 'msnbot',
        'Rambler' => 'Rambler',
        'Yahoo' => 'Yahoo',
        'AbachoBOT' => 'AbachoBOT',
        'accoona' => 'Accoona',
        'AcoiRobot' => 'AcoiRobot',
        'ASPSeek' => 'ASPSeek',
        'CrocCrawler' => 'CrocCrawler',
        'Dumbot' => 'Dumbot',
        'FAST-WebCrawler' => 'FAST-WebCrawler',
        'GeonaBot' => 'GeonaBot',
        'Gigabot' => 'Gigabot',
        'Lycos spider' => 'Lycos',
        'MSRBOT' => 'MSRBOT',
        'Altavista robot' => 'Scooter',
        'AltaVista robot' => 'Altavista',
        'ID-Search Bot' => 'IDBot',
        'eStyle Bot' => 'eStyle',
        'Scrubby robot' => 'Scrubby',
        'Facebook' => 'facebookexternalhit',
        'AddThis' => 'AddThis.com'
    );


    // to get crawlers string used in function uncomment it
    // it is better to save it in string than use implode every time
    // global $crawlers
    $USER_AGENT = strtolower($_SERVER['HTTP_USER_AGENT']);

    foreach ($crawlers as $item) {
        $item = strtolower($item);
        if (strpos($USER_AGENT, $item) !== false)
            return true;
        else {
            return false;
        }
    }
}