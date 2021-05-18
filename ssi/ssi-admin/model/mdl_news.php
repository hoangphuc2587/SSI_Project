<?php
date_default_timezone_set('UTC');
include 'classes/TNews.php';

class NewsModel extends baseModel
{

    public function getListNews($record_skip, $limit)
    {

        $listNews = array();
        $sql = "SELECT * FROM t_news WHERE delete_flag=0  ORDER BY display_date DESC LIMIT " . $record_skip . "," . $limit . "";

        $result = $this->db->query($sql);

        if ($result['success'] == true) {
            $data =  $result['rows'];
            foreach ($data as $row) {

                $news = new TNews();
                $news->setId($row['id']);
                $news->setTitle($row['title']);
                if (strlen($row['content']) > 300) {
                    $excerpt   = mb_substr($row['content'], 0, 300 - 3);
                    $excerpt  .= '...';
                } else {
                    $excerpt = $row['content'];
                }
                $news->setContent($excerpt);
                $news->setImage($row['image']);
                $news->setDisplayFlag($row['display_flag']);
                $news->setCreateUser($row['create_user']);
                $news->setCreateDate($row['create_date']);
                $news->setUpdateUser($row['update_user']);
                $news->setUpdateDate($row['update_date']);
                // $news->setDisplayDate($row['display_date']);
                $news->setDisplayDate(date("Y/m/d", strtotime($row['display_date'])));
                $news->setDeleteFlag($row['delete_flag']);
                array_push($listNews, $news);
            }
        } else {
            echo "An error has occurred: " . $result['error'] . "<br />";
        }
        return $listNews;
    }
    public function findById($id)
    {
        $news = new TNews();
        $sql = "SELECT * FROM t_news WHERE id='" . $id . "' AND delete_flag='0'";
        $result = $this->db->query($sql);
        if ($result['success'] == true) {
            $data =  $result['rows'];
            //return $data;
            foreach ($data as $row) {

                $news->setId($row['id']);
                $news->setTitle(htmlspecialchars_decode($row['title']));
                $news->setContent($row['content']);
                $news->setImage($row['image']);
                $news->setCreateUser($row['create_user']);
                $news->setCreateDate($row['create_date']);
                $news->setUpdateUser($row['update_user']);
                $news->setUpdateDate($row['update_date']);
                // $news->setDisplayDate($row['display_date']);
                $news->setDisplayDate(date("Y/m/d", strtotime($row['display_date'])));
                $news->setDeleteFlag($row['delete_flag']);
            }
        } else {
            echo "An error has occurred: " . $result['error'] . "<br />";
        }
        return $news;
    }
    public function addNews($title, $content, $create_user, $image, $displayDate)
    {
        $result = $this->db->query("INSERT INTO t_news (`title`, `content`, `create_user`, `create_date`, `image`, `display_date` ) VALUES ('" . str_replace("'", "\'", $title) . "','" . str_replace("'", "\'", $content) . "','$create_user', NOW(), '$image' ,'$displayDate')");
    }
    public function editNews($id, $title, $content, $update_user, $image, $displayDate)
    {
        $sql = "UPDATE t_news SET title='" . str_replace("'", "\'", $title) . "', content='" . str_replace("'", "\'", $content) . "', update_user='$update_user', image='$image', update_date=NOW(), display_date='$displayDate' WHERE id='" . $id . "'";
        $result = $this->db->query($sql);
    }
    public function deleteNews($id, $update_user)
    {
        $result = $this->db->query("UPDATE t_news SET delete_flag='1', update_date=NOW(), update_user='$update_user' WHERE id='$id'");
        return $result;
    }
    public function updateDisplayFlag($id, $displayFlag, $currentUser)
    {
        $result = $this->db->update("UPDATE t_news SET display_flag='$displayFlag' , update_date=NOW() ,update_user='$currentUser' WHERE id='$id'");
        return $result;
    }
    public function getTotalPage($limit)
    {
        $total_records = $this->countPage();

        $total_page = ceil($total_records / $limit);
        return $total_page;
    }
    public function countPage()
    {

        $result = $this->db->query("SELECT COUNT(*) AS TOTAL FROM t_news WHERE delete_flag='0' ");
        if ($result['success'] == true && $result['count'] > 0) {
            $data =  $result['rows'][0];
            $count = $data['TOTAL'];
        }
        return $count;
    }
}
