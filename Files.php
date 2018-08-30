<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Files management class created by CodexWorld
 */
//link notes
// https://www.codexworld.com/codeigniter-download-file-from-database/

class Files extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('file');
    }



    function image()
    {
        
        
        $file=$_FILES['file_name']['tmp_name'];
        $destination="uploads/files/".$_FILES['file_name']['name'];
        if(move_uploaded_file($file,$destination))
        {
             $img=$_FILES["file_name"]["name"];
        }
        $data=array('file_name'=>$img);
        $qry=$this->File->image_m($img,$data);
        
        redirect("Files");
    }




    
    public function index(){
        $data = array();
        
        //get files from database
        $data['files'] = $this->file->getRows();
        
        //load the view
        $this->load->view('files/index', $data);
    }
    
    public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->file->getRows(array('id' => $id));
            
            //file path
            $file = 'uploads/files/'.$fileInfo['file_name'];
            
            //download file from directory
            force_download($file, NULL);
        }
    }
}