<?php

namespace Cleaf\Controller;

use Cleaf\Config\Controller;
use Cleaf\Config\View;
use Cleaf\Model\Page;
use Cleaf\Model\Content;

class ContentController extends Controller
{

    private $user_id;
    private $page;
    private $pages;
    private $content;

    public function __construct()
    {
        $this->user_id = $_SESSION['user_id'];
        $this->page = new Page();
        $this->pages = $this->page->findByUserId($this->user_id);

        $this->content = new Content();
    }

    public function index($name)
    {
        $title = $name;

        $page = $this->page->findBySlug($name);

        $contents = $this->content->findByPageId($page['id']);
        $countContent = 10 - (int)count($this->content->findByPageId($page['id']));

        if (empty($page)) {
            View::render('404');
            return;
        }

        if ($page['user_id'] != $this->user_id) {
            View::render('404', [
                'message' => 'You do not have access to this page'
            ]);
            return;
        }

        View::render('content', compact('title', 'page', 'countContent', 'contents'));
    }

    public function create($name)
    {

        $page = $this->page->findBySlug($name);

        // var_dump($_POST);

        if (empty($page)) {
            View::render('404');
            return;
        }

        if ($page['user_id'] != $this->user_id) {
            View::render('404', [
                'message' => 'You do not have access to this page'
            ]);
            return;
        }

        $title = htmlspecialchars($_POST['title']);
        $url = htmlspecialchars($_POST['url']);
        $page_id = $page['id'];

        try {
            $this->content->create($page_id, $title, $url);
        } catch (\Exception $e) {
            View::render('content', compact('title', 'url', 'page_id'));
            return;
        }


        header('Location: /' . $name . '/content');
    }


    public function delete($name, $id)
    {

        $page = $this->page->findBySlug($name);

        if (empty($page)) {
            View::render('404');
            return;
        }

        if ($page['user_id'] != $this->user_id) {
            View::render('404', [
                'message' => 'You do not have access to this page'
            ]);
            return;
        }

        $this->content->delete($id);

        header('Location: /' . $name . '/content');
    }
}
