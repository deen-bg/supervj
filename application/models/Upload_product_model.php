<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_product_model extends CI_Model {

    public function fileUploaded($reqID)
    {
        
        require_once APPPATH.'third_party/upload/class.fileuploader.php';

        $product_id = $reqID;
       
        $filePath 	= 'assets/images/product/'.$product_id.'/';
        $path 		= realpath($filePath); // ex. 
        $updated 	= date('Y-m-d H:i:s');
                
        $appendedFiles = array();
        $uploadsFiles = array_diff(scandir($filePath), array('.', '..'));

        foreach($uploadsFiles as $file) {
            // skip if directory
            if(is_dir($file))
                continue;

            $url ='assets/images/product/'.$product_id.'/'.$file;
            $appendedFiles[] = array(
                "name" => $file,
                "type" => FileUploader::mime_content_type($filePath . $file),
                "size" => filesize($filePath . $file),
                "file" => $filePath . $file,
                "file" => 'https://'. $_SERVER['HTTP_HOST'] .'/salepage-plakaphng/'.$filePath . $file,
                "data" => array(
                    "url" => $url
                )
            );
        }

        // initialize FileUploader create Object
        $FileUploader = new FileUploader('productImg', array(
            // 'limit' => 4,
            // 'maxSize' => 4,
            // 'fileMaxSize' => 4,
            'extensions' => ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'],
            'required' => false,
            'uploadDir' => $filePath,
            'title' => 'name',
            'replace' => false,
            'listInput' => true,
            'files' => $appendedFiles
        ));
        

        // call to upload the files
         // call to upload the files
         $data = $FileUploader->upload();

         // get the fileList ฟังก์ชั่นสำหรับดึงไฟล์ และดึงไฟล์ที่ตาม id ที่ถูกส่งมา
         $fileList = $FileUploader->getFileList();	
        
         // ฟังก์ชั่นสำหรับสร้าง input
         $genInput = $FileUploader->generateInput();
       
        return $genInput;
       
        if(!empty($fileList) ) {

            $this->db->select('max(order_id) AS max_id');
            $this->db->from('tbl_product_image');
            $this->db->where('product_id', $product_id);
            $this->db->limit(1);
            $query = $this->db->get();
            $result_max = $query->result_array();


            if ($result_max[0]['max_id']) {
                $i = $result_max[0]['max_id'];
            } else {
                $i = 0;
            }
        }

        if($data['hasWarnings']) {
            $warnings = $data['warnings'];
        }
       
        foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {

            $this->db->where('product_id', $product_id);
            $this->db->where('img_name', $value['name']);
            $this->db->update('tbl_product_image');

            unlink($filePath . $value['name']);
        }
    }
}

?>