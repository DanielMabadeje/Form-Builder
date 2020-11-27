<?php

/**
 * Every page loads from view folder concerning blog
 * in order to load a view inside a folder of the view folder
 * the folder/filename must be parsed
 */
class Blogs extends Controller
{
    public function __construct($var = null)
    {
        # code...
    }

    public function Index($var = null)
    {
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $pageno=$_GET['pages'];
        } else {
            $pageno=1;
        }

        $no_of_records_per_page = 15;
        // die($pageno - 1);
        $offset = ($pageno - 1) * $no_of_records_per_page;
        $total_rows = $this->blogModel->count();
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $posts = $this->blogModel->index($offset, $no_of_records_per_page);

        
        
        
    }
}
