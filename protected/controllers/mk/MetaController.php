<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 * @desc Quản lý ngôn ngữ
 * @author anhmantk
 */
class MetaController extends MkController
{

    public function init()
    {
        parent::init();
    }

    private function controllerIgnore()
    {
        return array(
            'fontend' => array(
                'cron'
            )
        );
    }

    public function actionIndex()
    {
        $data = array();
        $myPath = ROOT_PATH . '/protected/controllers/fontend';


        $controller_ignore = $this->controllerIgnore();


        $dir = new DirectoryIterator($myPath);
        $listClass = array();
        foreach ($dir as $fileinfo) {
            $pattern = '/.*\.(php)/i';
            if (!$fileinfo->isDot() && $fileinfo->isFile()) {
                if (preg_match($pattern, $fileinfo->getFilename())) {
                    $filename = $fileinfo->getFilename();
                    //var_dump(file_exists($path . '/' . $filename));
                    //echo $myPath . '/' . $filename . '<br />';
                    include_once $myPath . '/' . $filename;
                    $filename = substr($filename, 0, strlen($filename) - 4);
                    $filename_tmp = str_replace('Controller', '', $filename);
                    if (in_array(strtolower($filename_tmp), $controller_ignore['fontend'])) {
                        continue;
                    }
                    $listClass[] = $filename;
                }
            }
        }

        $listAction = array();
        foreach ($listClass as $class) {
            $controller = strtolower(str_replace('Controller', '', $class));

            $listAction[$controller]['name'] = $class;
            $refClass = new ReflectionClass($class);
            $doc = $refClass->getDocComment();
            preg_match_all('#@desc(.*?)\n#s', $doc, $desc);
            $listAction[$controller]['description'] = trim($desc[1][0]);
            $listAction[$controller]['controller'] = $controller;


            $actions = array();
            $class_methods = get_class_methods(new $class);
            foreach ($class_methods as $method) {
                $actionDoc = $refClass->getMethod($method)->getDocComment();
                if (!empty($actionDoc)) {
                    preg_match_all('#@meta(.*?)\n#s', $actionDoc, $res);
                    if ($res[1][0] == 1) {
                        $reflect = new ReflectionMethod($class, $method);
                        if (strpos($method, 'action') === 0 && $reflect->isPublic() && $method != 'actions') {
                            $actions[] = strtolower(substr($method, 6, strlen($method)));
                        }
                        $listAction[$controller]['actions'] = $actions;
                    }
                }

            }
        }


        $data['listItem'] = $listAction;
        $this->render('index', array('data' => $data));
    }

    public function actionAdd() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            yii_insert_row('metatag', $_POST, 'db', true);
            createMessage('Cập nhật thành công');
            $this->redirect($_SERVER['HTTP_REFERER']);
        }

        $data = array();
        $ctl = $_GET['ctl'];
        $act = $_GET['act'];

        $query = "SELECT meta_title, meta_keywords, meta_description FROM tbl_metatag WHERE controller_id = :ctl AND action_id = :act";
        $values = array(
            ':ctl' => $ctl,
            ':act' => $act
        );
        $data['row'] = $this->db->createCommand($query)->bindValues($values)->queryRow();


        $this->render('add', array('data' => $data));
    }

}
