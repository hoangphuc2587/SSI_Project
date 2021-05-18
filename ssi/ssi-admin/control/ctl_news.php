<?php
include 'model/mdl_news.php';
include 'model/mdl_login.php';
include_once 'directory/directory.php';

class NewsController extends baseController
{

    public function index()
    {

        /* Instantiate the template engine. */
        $this->registry->template = new Template($this->registry);

        $loginRole = (empty($_SESSION['loginRole'])) ? '' : $_SESSION['loginRole'];
        //Set list user to template
        $this->registry->template->loginRole = array(
            "name" => "loginRole",
            "value" => $loginRole
        );

        //Create model object
        $newsModel = new NewsModel();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;
        $total_records = $newsModel->countPage();

        if ($total_records != 0) {

            $total_page = $newsModel->getTotalPage($limit);
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }
            $record_skip = ($current_page * $limit) - $limit;
            $record_skip_page = 1;
            $nextpage = $current_page + 1;
            $previouspage = $current_page - 1;
        } else {
            $previouspage = 0;
            $nextpage = 0;
            $record_skip = 0;
            $total_page = 0;
            $record_skip_page = 0;
        }
        $listNews = array();
        $listNews = $newsModel->getListNews($record_skip, $limit);
        // $dir_img=DIR_NEWS_IMAGE;

        //Set list user to template
        $this->registry->template->listNews = array(
            "name" => "listNews",
            "value" => $listNews
        );
        $this->registry->template->imgPath = array(
            "name" => "imgPath",
            "value" => DIR_NEWS_IMAGE
        );
        $this->registry->template->total_page = array(
            "name" => "total_page",
            "value" => $total_page
        );
        $this->registry->template->limit = array(
            "name" => "limit",
            "value" => $limit
        );
        $this->registry->template->total_records = array(
            "name" => "total_records",
            "value" => $total_records
        );
        $this->registry->template->current_page = array(
            "name" => "current_page",
            "value" => $current_page
        );
        $this->registry->template->record_skip_page = array(
            "name" => "record_skip_page",
            "value" => $record_skip_page
        );
        $this->registry->template->previouspage = array(
            "name" => "previouspage",
            "value" => $previouspage
        );
        $this->registry->template->nextpage = array(
            "name" => "nextpage",
            "value" => $nextpage
        );
        $this->registry->template->class = array(
            "name" => "class",
            "value" => "active"
        );
        /* Load the login template. */
        $this->registry->template->show('listNews');
    }

    public function edit()
    {
        $this->registry->template = new Template($this->registry);
        $loginRole = (empty($_SESSION['loginRole'])) ? '' : $_SESSION['loginRole'];
        //Set list user to template
        $this->registry->template->loginRole = array(
            "name" => "loginRole",
            "value" => $loginRole
        );
        $newsModel = new NewsModel();
        if (isset($_GET['id'])) {
            $news = $newsModel->findById($_GET['id']);
            $this->registry->template->news = array(
                "name" => "news",
                "value" => $news
            );
            $this->registry->template->imgPath = array(
                "name" => "imgPath",
                "value" => DIR_NEWS_IMAGE
            );
            $this->registry->template->show('editNews');
        }
    }
    public function addNews()
    {
        $this->registry->template = new Template($this->registry);
        $loginRole = (empty($_SESSION['loginRole'])) ? '' : $_SESSION['loginRole'];
        //Set list user to template
        $this->registry->template->loginRole = array(
            "name" => "loginRole",
            "value" => $loginRole
        );
        $this->registry->template->show('addNews');
    }
    public function saveNews()
    {
        $newsModel = new NewsModel();
        $path = "";
        if (isset($_POST['submit'])) {
            $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
            $content = $_POST['content'];
            $displayDate = $_POST['displayDate'];
            if (empty($displayDate)) {
                $displayDate = date("Y/m/d");
            }
            $path = "";
            if (isset($_POST['imgPositionNew'])) {
                $path = $_POST['imgPositionNew'];
            }
            error_log($path);
            $imgUploadNameArr = explode(",", $path);

            $loginUser = new MLogin();
            if ($_SESSION["loginUserId"] != null) {
                $loginUser->setUserId($_SESSION["loginUserId"]);
                $loginUser->setPassword($_SESSION['loginPassword']);
                $loginUser->setMail($_SESSION['loginMail']);
                $loginUser->setRole($_SESSION['loginRole']);
            }

            $newImage = array();
            if (isset($_FILES['file'])) {
                for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                    $vpb_image_filename = $_FILES['file']['name'][$i];
                    if (in_array($vpb_image_filename, $imgUploadNameArr, TRUE)) {
                        $vpb_image_tmp_name = $_FILES['file']['tmp_name'][$i];
                        $image_type = pathinfo($vpb_image_filename, PATHINFO_EXTENSION);
                        $image_name = time() . $i . "." . $image_type;
                        if (move_uploaded_file($vpb_image_tmp_name,  $_SERVER['DOCUMENT_ROOT'] . '/' . UPLOAD_NEWS_DIR . $image_name)) {
                        }
                        array_push($newImage, $image_name);
                    }
                }
            }
            $imageList = implode(",", $newImage);
            $new = $newsModel->addNews($title, $content, $loginUser->getUserId(), $imageList, $displayDate);
        }
        $location = './?rt=news';
        header('location: ' . $location);
    }
    public function updateNews()
    {
        $newsModel = new NewsModel();
        // $news = new TNews();
        if (isset($_POST['submit'])) {

            $id = $_POST['id'];
            $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
            $content = $_POST['content'];
            $content = $_POST['content'];

            $displayDate = $_POST['displayDate'];
            if (empty($displayDate)) {
                $displayDate = date("Y/m/d");
            }

            $loginUser = new MLogin();
            if ($_SESSION["loginUserId"] != null) {
                $loginUser->setUserId($_SESSION["loginUserId"]);
                $loginUser->setPassword($_SESSION['loginPassword']);
                $loginUser->setMail($_SESSION['loginMail']);
                $loginUser->setRole($_SESSION['loginRole']);
            }
            $news = $newsModel->findById($id);

            $path = "";
            if (isset($_POST['imgPositionNew'])) {
                $path = $_POST['imgPositionNew'];
            }
            $pathNew = "";
            if (isset($_POST['imgPositionNewEdit'])) {
                $pathNew = $_POST['imgPositionNewEdit'];
            }
            $imgUploadNameNewArr = explode(",", $pathNew);

            $newImage = array();
            if (isset($_FILES['file'])) {
                for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                    $vpb_image_filename = $_FILES['file']['name'][$i];
                    if (in_array($vpb_image_filename, $imgUploadNameNewArr, TRUE)) {
                        $vpb_image_tmp_name = $_FILES['file']['tmp_name'][$i];
                        $image_type = pathinfo($vpb_image_filename, PATHINFO_EXTENSION);
                        $image_name = time() . $i . "." . $image_type;
                        if (move_uploaded_file($vpb_image_tmp_name,  $_SERVER['DOCUMENT_ROOT'] . '/' . UPLOAD_NEWS_DIR . $image_name)) {
                            array_push($newImage, $image_name);
                        }
                    }
                }
            }
            $imageList = implode(",", $newImage);
            error_log('imageList add new: ' . $imageList);
            $newImageArr = $path;
            if ($path != "") {
                if ($imageList != "") {
                    $newImageArr = $path . "," . $imageList;
                }
            } else {
                if ($imageList != "") {
                    $newImageArr = $imageList;
                }
            }
            error_log('newImageArr final: ' . $newImageArr);
            $new = $newsModel->editNews($id, $title, $content, $loginUser->getUserId(), $newImageArr, $displayDate);
        }
        $location = './?rt=news';
        header('location: ' . $location);
    }

    public function delete()
    {
        $loginUser = new MLogin();
        if ($_SESSION["loginUserId"] != null) {
            $loginUser->setUserId($_SESSION["loginUserId"]);
            $loginUser->setPassword($_SESSION['loginPassword']);
            $loginUser->setMail($_SESSION['loginMail']);
            $loginUser->setRole($_SESSION['loginRole']);
        }

        $id = $_GET['id'];
        $newsModel = new NewsModel();
        $news = $newsModel->deleteNews($id, $loginUser->getUserId());
        $link = "./?rt=news";

        header("Location: " . $link);
    }
    public function updateDisplay()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $id = $request['id'];
        $loginUser = new MLogin();
        if ($_SESSION["loginUserId"] != null) {
            $loginUser->setUserId($_SESSION["loginUserId"]);
            $loginUser->setPassword($_SESSION['loginPassword']);
            $loginUser->setMail($_SESSION['loginMail']);
            $loginUser->setRole($_SESSION['loginRole']);
        }
        $displayFlag = $request['displayFlag'];
        $newsModel = new NewsModel();
        $new = $newsModel->updateDisplayFlag($id, $displayFlag, $loginUser->getUserId());
        echo json_encode(array("result" => $new));
    }
}
