<?php

class BookWebModule extends WebModule
{
    protected $id='book';
    protected function initializeForPage() {
        $controller = DataRetriever::factory('BookDataRetriever', array());
        switch ($this->page) {
            case 'index':
                $books = $controller->hot_books();
                $bookList = array();
                foreach ($books as $bookData) {
                    $book = array(
                        'title' => $bookData['title'],
                        'subtitle' => $bookData['author'],
                        'url'=> $bookData['link']
                    );
                    $bookList[] = $book;
                }
                $this->assign('bookList', $bookList);
                break;
            case 'detail':
                
                break;
            case 'search':
                $searchTerms = $this->getArg('filter');
                $books = $controller->search_books($searchTerms);
                $bookList = array();
                foreach ($books as $bookData) {
                    $book = array(
                        'title' => $bookData['title'],
                        'subtitle' => $bookData['author'],
                        'url'=> $this->buildBreadcrumbURL('detail', array('id'=>$bookData['index']))
                    );
                    $bookList[] = $book;
                }
                $this->assign('bookList', $bookList);
                break;
        }
    }
    
}