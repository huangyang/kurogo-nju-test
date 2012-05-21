<?php
class BookDataRetriever extends URLDataRetriever
{
    protected $DEFAULT_PARSER_CLASS = 'BookHtmlDataParser';

    public function hot_books() {
        $this->setBaseURL('http://202.119.47.8:8080/opac/book_rank.php');
        $data = $this->getData();
        return $data;
    }
    
    public function search_books($keyword) {
        $this->setBaseURL('http://202.119.47.8:8080/opac/search_adv_result.php');
        $this->addParameter('sType0', 'any');
        $this->addParameter('q0', $keyword);
        $data = $this->getData();
        return $data;
    }
    
}