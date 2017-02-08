<?php
namespace Home\Controller;
header('content-type:text/html;charset=utf-8');
use Think\Controller;
class IndexController extends BaseController {

    public function index(){
        $cycle = $this->cycleData();
        $book = $this->pagination();
        $loginArray = $this->isLogin();
        $p = $_REQUEST['p'];
        $array = array(
            'cycle' => $cycle,
            'p'     =>$p,
            'loginArray' => $loginArray,
        );
        $array = array_merge($array, $book);
//        var_dump($array);
//        die;
        $this->assign($array);
        $this->display();
    }

    //打开图书
    public function indexBook()
    {
        $book_id = $_GET['book_id'];
        $user_id = session('user_id');
        $book = $this->findBookById($book_id);
        $bookmark = $this->showBookmark($book_id,$user_id);
        $page = $this->getBookmarkByUid($book_id);
        $bookContent = $this->bookContent($book['book_content'], $page, 155);
        $loginArray = $this->isLogin();
        $array = array(
            'book_id'     => $_GET['book_id'],
            'bookContent' => $bookContent,
            'page'        => $page,
            'loginArray'  => $loginArray,
            'bookmark'    => $bookmark,
        );
        $this->assign($array);
        $this->display();
    }

    //异步打开图书
    public function ajaxIndexBook()
    {
        $book_id = $_GET['book_id'];
        $page = $_GET['page'];
        $book = $this->findBookById($book_id);
        $bookContent = $this->bookContent($book['book_content'], $page, 155);
        if($user_id = session('user_id'))
        {
            $this->saveBookmarkByUid($user_id, $book_id, $page);
        }
        $array = array(
            'book_id'     => $_GET['book_id'],
            'bookContent' => $bookContent,
            'page'        => $_GET['page']
        );
        die(json_encode($array));
    }

    //展示的图书内容
    public function bookContent($bookAddress, $page, $length)
    {
        $bookString = file_get_contents(ROOT.'/Library_of_lovely_xin/'.$bookAddress);
        if(json_encode($bookString) == 'null')
        {
            $bookString = iconv('gbk', 'utf-8//IGNORE', $bookString);
        }
        $start1 = ($page - 1) * $length * 2;
        $start2 = $start1 + $length;
        $pageCount = mb_strlen($bookString, 'utf-8')/($length * 2);
        $bookContent[] = mb_substr($bookString, $start1, $length, 'utf-8');
        $bookContent[] = mb_substr($bookString, $start2, $length, 'utf-8');
        $bookContent['pageCount'] = (int)$pageCount + 1;
        return $bookContent;
    }

    //获取书签
    public function getBookmarkByUid($book_id)
    {
        if(session('user_id'))
        {
            $where = array(
                'bookmark_uid' => session('user_id'),
                'bookmark_bid' => $book_id,
                'bookmark_status' => 0,
            );
            $bookmarkData = M('bookmark')->where($where)->find();
            if($bookmarkData['bookmark_page'] < 1)$bookmarkData['bookmark_page'] = 1;
            return $bookmarkData['bookmark_page'];
        }else
        {
            return $_GET['page'];
        }
    }

    //自动保存书签
    public function saveBookmarkByUid($user_id, $book_id, $page)
    {
        $idArray = array(
            'bookmark_uid' => $user_id,
            'bookmark_bid' => $book_id,
            'bookmark_status' => 0
        );
        $pageArray['bookmark_page'] = $page;
        $bookmarkObject = M('bookmark');
        if(!$bookmarkObject->where($idArray)->save($pageArray))
        {
            $addArray = array_merge($idArray, $pageArray);
            $bookmarkObject->add($addArray);
        }
    }

    //手动保存书签
    public function saveBookmarkByClick()
    {
        if(($user_id = session('user_id')) && ($book_id = $_POST['book_id']) && ($page = $_POST['page']))
        {
            $arrayFind = array(
                'bookmark_uid'    => $user_id,
                'bookmark_bid'    => $book_id,
                'bookmark_page'   => $page,
                'bookmark_status' => 1
            );
            $bookmarkObject = M('bookmark');
            if(!$bookmarkObject -> where($arrayFind) -> find())
            {
                $bookmarkObject ->add($arrayFind);
                die('书签保存成功');
            }else{
                die('书签已存在');
            }
        }else{
            die('尚未登录');
        }
    }

    //列出书签
    public function showBookmark($book_id,$user_id=null)
    {
        if($user_id)
        {
            $arraySelect = array(
                'bookmark_uid' => $user_id,
                'bookmark_bid' => $book_id,
                'bookmark_status' => 1
            );
            return M('bookmark')->where($arraySelect)->order('bookmark_id desc')->limit(5)->select();
        }
    }


    //查询轮播图
    public function cycleData(){
        return M('cycle')->select();
    }

    //按图书id查询图书信息
    public function findBookById($book_id)
    {
        $idArray['book_id'] = $book_id;
        return M('book')->where($idArray)->find();
    }

    //分页(按多个书架查询图书信息)
    public function pagination(){
        $bookObject = M('book');
        $count = $bookObject->where('book_status=1')->count();
        $Page = new \Think\Page($count, 32);
        $show = $Page->show();
        $totalPages = $Page->totalPages;
        $totalPages = (string)$totalPages;
        $book = $bookObject->where('book_status=1')->limit($Page->firstRow, $Page->listRows)->select();
        return array(
            'show'        => $show,
            'book'        => $book,
            'pages'       => $totalPages,
        );
    }

    //检测登录
    public function isLogin()
    {
        if(($user_id = session('user_id')) && ($user_name = session('user_name')))
        {
            return array('user_id' => $user_id, 'user_name' => $user_name, 'isLogin' => 1);
        }else
        {
            return array('isLogin' => 0);
        }
    }

    public function test()
    {
        $fileArray = file('./Public/book/5868f1ad94266.txt');
        print_r($fileArray);
    }


}