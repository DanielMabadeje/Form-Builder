<?php

/**
 * Every page loads from view folder
 * in order to load a view inside a folder of the view folder
 * the folder/filename must be parsed
 */
class Pages extends Controller
{
    public function __construct()
    {
    }
    public function about($id = null)
    {
        $data = [
            'title' => "Mabadeje's Framework",
        ];
        $this->view('pages/about', $data);
        # code...
    }
    public function Index( $var = null)
    {

        $data = [
            'title' => "Mabadeje's Framework",
        ];
        $this->view('pages/index', $data);
    }


    public function contact()
    {
        
        $data = [
            'title' => "Mabadeje's Framework",
        ];
        $this->view('pages/contact', $data);
    }

    public function pricing( $var = null)
    {
        $data = [
            'title' => "Mabadeje's Framework",
        ];
        $this->view('pages/pricing', $data);
    }

    public function features( $var = null)
    {
        # code...
    }

    public function template()
    {
        $data = [
            'title' => "Mabadeje's Framework",
        ];
        $this->view('pages/template', $data);
    }
}
