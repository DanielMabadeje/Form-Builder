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
        if (isset($_GET['pages'])) {
            $page=$_GET['pages']
        } else {
            # code...
        }


        if (is_numeric($limit)) {
            // echo 'j';
            $pageno = $limit;
        } else {
            // echo 'uu';
            $pageno = 1;
        }
        $no_of_records_per_page = 12;
        // die($pageno - 1);
        $offset = ($pageno - 1) * $no_of_records_per_page;
        $total_rows = $this->blogModel->count();
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        
        
    }
}
