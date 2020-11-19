<?php
include 'model/mdl_news.php';


class NewsController
{

    public function getListNews($record_skip, $limit)
    {
        $newsModel = new NewsModel();
        $listNews = $newsModel->getAllNews($record_skip, $limit);
        return $listNews;
    }
    public function getListNewsHome()
    {
        $newsModel = new NewsModel();
        $listNews = $newsModel->getAllNewsHome();
        return $listNews;
    }
}
