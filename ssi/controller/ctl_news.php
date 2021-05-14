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
    public function getNews($id)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->getNews($id);
        return $news;
    }
    public function getNewsNext($id)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->getNewsNext($id);
        return $news;
    }
    public function getNewsPrevious($id)
    {
        $newsModel = new NewsModel();
        $news = $newsModel->getNewsPrevious($id);
        return $news;
    }
    public function getNewsAllId()
    {
        $newsModel = new NewsModel();
        $news = $newsModel->getAllNewsId();
        return $news;
    }
}
