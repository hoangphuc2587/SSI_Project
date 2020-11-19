<?php
include 'model/baseModel.php';
include 'classes/TNews.php';


class NewsModel extends baseModel
{
    public function getAllNewsHome()
    {
        $listNews = array();
        $sql = "SELECT * FROM t_news WHERE delete_flag = 0 AND display_flag=1 ORDER BY display_date DESC LIMIT 3";

        $result = $this->db->query($sql);
        if ($result['success'] == true) {
            $data =  $result['rows'];
            foreach ($data as $row) {

                $news = new TNews();
                $news->setId($row['id']);
                $stringTitle = strip_tags($row['title']);
                $lengthTitle = 70;

                $endTitle = '...';

                if (strlen($stringTitle) > $lengthTitle) {
                    // truncate stringTitle
                    $stringTitleCut = mb_substr($stringTitle, 0, $lengthTitle);
                    $stringTitle = $stringTitleCut . $endTitle;
                }

                $news->setTitle($stringTitle);
                $news->setContent($row['content']);
                $news->setImage($row['image']);
                $news->setCreateUser($row['create_user']);
                $news->setCreateDate($row['create_date']);
                $news->setUpdateUser($row['update_user']);
                $news->setUpdateDate($row['update_date']);
                $news->setDisplayDate($row['display_date']);
                $news->setDeleteFlag($row['delete_flag']);
                array_push($listNews, $news);
            }
        } else {
            echo "An error has occurred: " . $result['error'] . "<br />";
        }
        return $listNews;
    }

    public function getAllNews($record_skip, $limit)
    {
        $listNews = array();
        $sql = "SELECT * FROM t_news WHERE delete_flag = 0 AND display_flag=1 ORDER BY display_date DESC LIMIT " . $record_skip . "," . $limit . "";

        $result = $this->db->query($sql);
        if ($result['success'] == true) {
            $data =  $result['rows'];
            foreach ($data as $row) {

                $news = new TNews();
                $news->setId($row['id']);

                $news->setTitle($row['title']);
                $news->setContent($row['content']);
                $news->setImage($row['image']);
                $news->setCreateUser($row['create_user']);
                $news->setCreateDate($row['create_date']);
                $news->setUpdateUser($row['update_user']);
                $news->setUpdateDate($row['update_date']);
                $news->setDisplayDate($row['display_date']);
                $news->setDeleteFlag($row['delete_flag']);
                array_push($listNews, $news);
            }
        } else {
            echo "An error has occurred: " . $result['error'] . "<br />";
        }
        return $listNews;
    }



    private function convertDate($s)
    {
        $dt = new DateTime($s);
        $date = $dt->format('Y/m/d');
        return $date;
    }

    public function countNews()
    {
        $sql = "SELECT COUNT(*) AS TOTAL FROM t_news WHERE delete_flag=0 AND display_flag = 1";
        $result = $this->db->query($sql);
        if ($result['success'] == true && $result['count'] > 0) {
            $data =  $result['rows'][0];
            $count = $data['TOTAL'];
        }
        return $count;
    }
    public function convertSrcImage($listImageNew)
    {

        $imageList = explode("data:", $listImageNew);
        error_log($listImageNew);
        $imgArr = array();
        foreach ($imageList as $key => $value) {
            error_log($value);
            if ($value != "") {
                $value = rtrim($value, ','); //if last character is ",": delete it
                $value = "data:" . $value;
                array_push($imgArr, $value);
            }
        }
        error_log(var_dump($imgArr));
        return $imgArr;
    }
}
