<?php

namespace Cleaf\Controller;

use Cleaf\Config\Controller;
use Cleaf\Config\View;
use Cleaf\Model\Page;

class PageController extends Controller
{

    private $user_id;
    private $page;
    private $pages;

    public function __construct()
    {
        $this->user_id = $_SESSION['user_id'] ?? null;
        $this->page = new Page();
        $this->pages = $this->page->findByUserId($this->user_id);
    }

    public function index()
    {
        $title = 'Add Your Page';
        $pages = $this->pages;

        $countPages = 4 - (int)count($pages);

        View::render('pages', compact('title', 'pages', 'countPages'));
    }

    public function create()
    {
        $title = htmlspecialchars($_POST['title']);
        $slug = htmlspecialchars(strtolower(str_replace(' ', '-', $_POST['slug'])));
        $description = htmlspecialchars($_POST['description']);
        $user_id = $this->user_id;

        $page = $this->page;
        $pages = $this->pages;

        $countPages = count($pages);

        if (empty($title) || empty($slug) || empty($description)) {
            $errorData = [
                'title' => 'Error',
                'message' => 'All fields are required'
            ];
        } elseif (!preg_match('/^[a-z0-9-]+$/i', $slug)) {
            $errorData = [
                'title' => 'Error',
                'message' => 'Invalid slug'
            ];
        } elseif ($page->findBySlug($slug)) {
            $errorData = [
                'title' => 'Error',
                'message' => 'Slug already taken'
            ];
        } elseif ($countPages > 3) {
            $errorData = [
                'title' => 'Error',
                'message' => 'You can only have 4 pages'
            ];
        } else {
            try {
                $page->create($title, $slug, $description, $user_id);

                header('Location: /pages');
                exit();
            } catch (\Exception $e) {
                $errorData = [
                    'title' => 'Error',
                    'message' => $e->getMessage()
                ];
            }
        }

        if (isset($errorData)) {
            $errorData = array_merge($errorData, [
                'pages' => $pages
            ]);
            View::render('pages', $errorData);
        }
    }


    public function show($name)
    {
        $page = $this->page->findBySlug($name);
        $title = $name;
        if (!$page) {
            View::render('404');
            return;
        }

        $contents = $this->page->findContentsByPageId($page['id']);

        View::render('linktree', compact('title', 'page', 'contents'));
    }


    public function delete($id)
    {
        $page = $this->page;
        $page->delete($id);
        header('Location: /pages');
    }

    public function underconstruction()
    {
        $title = 'Under Construction';
        View::render('underconstruction', compact('title'));
    }
}
