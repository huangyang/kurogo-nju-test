<?php
class BookHtmlDataParser extends DataParser
{
    public function parseData($data)
    {
        libxml_use_internal_errors(true);
        $start_index = strpos($data, "<body>");
        $data = substr_replace($data, "", $start_index, strlen("<body>"));
        $books = array();
        $dom = new domDocument;
        $dom->loadHTML($data);
        Kurogo::log(LOG_DEBUG, $data, "hy");
        $dom->preserveWhiteSpace = false; 
        $rows = $dom->getElementsByTagName('tr');
        Kurogo::log(LOG_DEBUG, sprintf("%d", $rows->length), "hy");
        for ($i=1; $i<$rows->length; $i++) {
            $cols = $rows->item($i)->getElementsByTagName('td');
            $book_index = $cols->item(0)->nodeValue;
            $book_link = sprintf("http://202.119.47.8:8080/opac/%s", $cols->item(1)->firstChild->getAttribute('href'));        
            $book_title = $cols->item(1)->nodeValue;
            $book_author = $cols->item(2)->nodeValue;
            $book_publisher = $cols->item(3)->nodeValue;
            $book_number = $cols->item(4)->nodeValue;
            $book_type = $cols->item(5)->nodeValue;
            $book = array();
            $book["index"] = $book_index;
            $book["title"] = $book_title;
            $book["author"] = $book_author;
            $book["publisher"] = $book_publisher;
            $book["number"] = $book_number;
            $book["type"] = $book_type;
            $book["link"] =$book_link;
            $books[] = $book;
        }   
        return $books;
    }
}