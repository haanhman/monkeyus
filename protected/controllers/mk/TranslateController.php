<?php

class TranslateController extends MkController
{

    public function init()
    {
        parent::init();
    }

    public function actionIndex()
    {
        $data = array();
        $this->render('index', array('data' => $data));
    }

    private function getFieldByPage($page, $block)
    {
        $fields = array(
            'index' => array(
                1 => 'app_name,app_desc,start_download,total_download',
                2 => 'learn_now,coming_soon,learn_more,form_caption,text_placeholder,btn_title',
                3 => 'heading,easy_text,medium_text,advanced_text,easy_level,medium_level,advanced_level,lesson_1,lesson_2,lesson_3,sample_desc',
                4 => 'heading,desc,list',
                5 => 'heading,text',
                6 => 'heading,desc',
                7 => 'heading,title,text',
                8 => 'heading,title_1,text_1,title_2,text_2,title_3,text_3,title_4,text_4,title_5,text_5,title_6,text_6',
                9 => 'heading,desc',
                10 => 'heading_1,heading_2,btn_text',
                11 => 'heading,desc,list',
            ),
            'global' => array(
                1 => 'heading,desc,name_placeholder,email_placeholder,btn_free_update,txt_follow_us',
                2 => 'about,pricing,blog,faq,contact_us',
                3 => 'heading,title,desc,name_placeholder,email_placeholder,btn_text'
            ),
            'about' => array(
                1 => 'heading,heading_2',
                2 => 'form_catipon,name_placeholder,email_placeholder,btn_text,right_text',
                3 => 'heading_1,heading_2,text,name_placeholder,email_placeholder,btn_text,form_desc',
                4 => 'heading_1,group_1,group_2,group_3,group_4,text',
                5 => 'form_caption,name,email,subject,message'
            ),
            'faq' => array(
                1 => 'heading_1,heading_2'
            ),
            'blog' => array(
                1 => 'heading,email_placeholder,btn_text,form_desc,arow_text',
                2 => 'download_text,download_desc,total_download,popular_title,social_title,social_desc'
            ),
            'pricing' => array(
                1 => 'heading,plan_name,payment_1,payment_text_1,payment_2,payment_text_2,payment_3,payment_text_3,single_level,full_language,all_language,best_price',
                2 => 'heading',
                3 => 'single_heading,full_heading,all_heading,label_lesson,label_level,label_language,label_comingsoon,lbl_alllanguage,btn_text'
            ),
            'page' => array(
                1 => 'heading,but,html_content',
                2 => 'heading,block1,step1,step2',
                3 => 'heading_1,heading_2,html_content',
                4 => 'heading,but,html_content',
                5 => 'heading_text,name_placeholder,email_placeholder,btn_text,btn_desc',
                6 => 'title,meta_desc,meta_keyword,heading_text,desktop_tab,ios_tab,android_tab,amazon_tab,desktop_title,desktop_desc,ios_title,ios_desc,android_title,android_desc,amazon_title,amazon_desc,download_here,mac_title,mac_desc,mac_tab',
            )
        );
        return explode(',', $fields[$page][$block]);
    }

    public function actionTranslate()
    {
        $page = isset($_GET['action']) ? trim($_GET['action']) : 'index';
        $block = isset($_GET['block']) ? intval($_GET['block']) : 1;
        $us = intval($_GET['us']);
        $vn = intval($_GET['vn']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //`page`, `postion_name`, `text_us`, `text_vn`
            $params = array();
            foreach ($_POST as $key => $rows) {


                if ($us == 0 && $vn == 0) {
                    $params[] = array(
                        'page' => $page,
                        'postion_name' => $key,
                        'block' => $block,
                        'strtext' => trim($rows['us']),
                        'is_vn' => 0
                    );
                    $params[] = array(
                        'page' => $page,
                        'postion_name' => $key,
                        'block' => $block,
                        'strtext' => trim($rows['vn']),
                        'is_vn' => 1
                    );
                } elseif($us == 1) {
                    $params[] = array(
                        'page' => $page,
                        'postion_name' => $key,
                        'block' => $block,
                        'strtext' => trim($rows['us']),
                        'is_vn' => 0
                    );
                } elseif($vn == 1) {
                    $params[] = array(
                        'page' => $page,
                        'postion_name' => $key,
                        'block' => $block,
                        'strtext' => trim($rows['vn']),
                        'is_vn' => 1
                    );
                }


            }
            yii_insert_multiple('translate', $params, 'db', true);
            createMessage('Cập nhật thành công');
            $this->redirect($_SERVER['HTTP_REFERER']);
        }


        $query = "SELECT * FROM tbl_translate WHERE block = " . $block . " AND page = '" . $page . "'";
        $result = $this->db->createCommand($query)->queryAll();

        foreach ($result as $item) {
            if($item['is_vn'] == 1) {
                $data[$item['postion_name']]['vn'] = $item['strtext'];
            } else {
                $data[$item['postion_name']]['us'] = $item['strtext'];
            }

        }
        $data['field'] = $this->getFieldByPage($page, $block);
        $this->render('translate', array('data' => $data));
    }

}
