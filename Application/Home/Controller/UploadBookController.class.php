<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/31
 * Time: 19:28
 */
namespace Home\Controller;
use Think\Controller;
class UploadBookController extends Controller
{

    public function getBook(){
        $bookData = $_POST;
        $bookData['book_cover'] = $this->upCover();
        $bookData['book_content'] = $this->upBook();
        foreach ($bookData as $value){
            if(!$value){
                return 0;
            }
        }
        $bookObject = M('book');
        $insertId = $bookObject->add($bookData);
        echo $insertId;
    }

    //upload the cover
    public function upCover(){
        $congif = array(
            'maxSize'   =>  0,
            'rootPath'  =>  ROOT.'/Library_of_lovely_xin',
            'savePath'  =>  '/Public/image/cover',
            'exts'      =>  array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'   =>  true,
            'subName'   =>  array('data', 'Ymd')
        );
        $upCover = new \Think\Upload($congif);
        $infoCover = $upCover->upload();
        if(!$infoCover)
        {
            return 0;
        }else
        {
            return trim($infoCover['book_cover']['savepath'].$infoCover['book_cover']['savename'], '.');
        }
    }

    //上传文件
    public function upBook(){
        $congif = array(
            'maxSize'   =>  0,
            'rootPath'  =>  ROOT.'/Library_of_lovely_xin',
            'savePath'  =>  '/Public/book',
            'exts'      =>  array('txt'),
            'autoSub'   =>  true,
            'subName'   =>  array('data', 'Ymd')
        );
        $upBook = new \Think\Upload($congif);
        $infoBook = $upBook->upload();
        if(!$infoBook)
        {
            return 0;
        }else
        {
            return trim($infoBook['book_content']['savepath'].$infoBook['book_content']['savename'], '.');
        }
    }
}