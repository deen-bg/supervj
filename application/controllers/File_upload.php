<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload'); // lib upload
        $this->load->library('session');
        // Load model
	}
    // display product html form
	public function upfile(){
        $this->security->get_csrf_token_name(); // initial CSRF name
		$this->security->get_csrf_hash(); // get CSRF Token generate

        if($this->input->get('action') == 'upload_image')
        {
            if(!empty($_FILES['file']))
            {
                $config['upload_path'] = './assets/images/description/'.$this->input->get('path').'/';
                $config['file_name']        = $_FILES['file']["name"];
                $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
                $config['file_ext_tolower'] = TRUE; 
                $config['overwrite']        = TRUE; 
                $config['max_size']         = '0';  
                $config['max_width']        = '0';  
                $config['max_height']       = '0';
                $config['max_filename']       = '0';
                $config['remove_spaces']    = TRUE;
                $config['detect_mime']    = TRUE;
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config); 
                $this->upload->do_upload('file'); 
                    
                $file_upload=$this->upload->data('file_name');
                if($this->upload->display_errors()){ 
                    echo $this->upload->display_errors();  
                    $data['message'] = 'Ooops! Your upload triggered the following error.';
                }else{  
                    
                    $image_type=$this->upload->data('image_type');
                    $file_size=$this->upload->data('file_size');
                    //$file_path=$this->upload->data('file_path');
                    
                    $file_name		= $file_upload; 
                    $storage_path	= $this->storage_path($this->input->get('path'));
                    $file_url		= $storage_path . $file_name;
    
                    // 'image_url'	=> $this->storage_url($this->input->get('path')).$file_name,
                    $data = array(
                        'success'		=> 1,
                        'image_url'	=> $file_url,
                        'message'		=> null
                    );
                }
                // 
            }
        }

        // unlink file name where dir name/file name
        if($this->input->get('action') == 'delete_image')
        {
            $file_url = $this->input->post('file_url');
            $get_path = $this->input->get('path');

            if(!empty($file_url))
            {
                $_file	= explode('/', $file_url);
                $fileName	= end($_file);
                $d_name = './assets/images/description/'.$get_path.'/'.$fileName;
                
                if(unlink($d_name)){
                    $data = array(
                        'success'		=> true,
                        'image_url'	    => $d_name,
                        'message'		=> 'deleted successfully'
                    );
                } else {
                    $data = array(
                        'success'		=> false,
                        'image_url'	    => $d_name,
                        'message'		=> 'errors occured'
                    );
                }
            }
        }

        echo json_encode($data);
        exit;
    }

    public function uploadedProduct()
    {
        $product_id = $this->uri->segment(3);
        return $product_id;
        // include('vendor/upload/class.fileuploader.php');

        // $filePath 	= '../assets/images/product/' . $product_id . '/';
        // $path 		= realpath($filePath);
        // $updated 	= date('Y-m-d H:i:s');

        // if ( !is_dir($path) ) {
        //     mkdir($filePath);
        // }
                
        // // create an empty array
        // $appendedFiles = array();

        // // scan uploads directory
        // $uploadsFiles = array_diff(scandir($filePath), array('.', '..'));

        // // add files to our array with
        // // made to use the correct structure of a file
        // foreach($uploadsFiles as $file) {
        //     // skip if directory
        //     if(is_dir($file))
        //         continue;

        //     // add file to our array
        //     // !important please follow the structure below
        //     $appendedFiles[] = array(
        //         "name" => $file,
        //         "type" => FileUploader::mime_content_type($filePath . $file),
        //         "size" => filesize($filePath . $file),
        //         "file" => $filePath . $file,
        //         "data" => array(
        //             "url" => 'http://localhost/fileuploader/examples/php-generated-input/uploads/' . $file
        //         )
        //     );
        // }

        // // initialize FileUploader
        // $FileUploader = new FileUploader('productImg', array(
        //     // 'limit' => 4,
        //     // 'maxSize' => 4,
        //     // 'fileMaxSize' => 4,
        //     'extensions' => ['jpg', 'jpeg', 'png'],
        //     'required' => false,
        //     'uploadDir' => $filePath,
        //     'title' => 'name',
        //     'replace' => false,
        //     'listInput' => true,
        //     'files' => $appendedFiles
        // ));

        // // call to upload the files
        // $data = $FileUploader->upload();

        // // get the fileList
        // $fileList = $FileUploader->getFileList();			

        // if ( !empty($fileList) ) {
        //     $sql_max	= "SELECT max(order_id) AS max_id
        //                 FROM tbl_product_image
        //                 product_id = '{$product_id}'
        //                 LIMIT 1";
            
        //     $result_max = mysqli_query($db_connected, $sql_max);

        //     if ($result_max) {
        //         $i = $result_max['max_id'];
        //     } else {
        //         $i = 0;
        //     }

        //     foreach ($fileList as $img) {
        //         $i++;

        //         $sql = "INSERT INTO tbl_product_image (product_id, img_name,order_id, create_date) VALUE ('{$product_id}', '{$img['name']}', '{$i}', '{$updated}')";
                
        //         mysqli_query($db_connected, $sql);
        //     }
        // }

        // if($data['hasWarnings']) {
        //     $warnings = $data['warnings'];
            
        //     echo '<pre>';
        //     print_r($warnings);
        //     echo '</pre>';
        // }

        // // print_r($FileUploader);
        // // exit;

        // // unlink the files
        // // !important only for appended files
        // // you will need to give the array with appendend files in 'files' option of the fileUploader
        // foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
        //     $sqlDel = "DELETE FROM tbl_product_image WHERE product_id = '{$product_id}' AND img_name = '{$value['name']}'";
        //     $result = mysqli_query($db_connected, $sqlDel);

        //     unlink($filePath . $value['name']);
        // }
    }

    function storage_path($destination = null)
    {
        if(!empty($destination))
            {
                $destination = $destination . str_replace("\\", '/', DIRECTORY_SEPARATOR);
            }

            // ttps://localhost/teddyautosale-demo/assets/admin/assets/css/bootstrap.css
        base_url('assets/images/description/'.$destination);
        // return preg_replace('/((\\\|\/)admin)/', DIRECTORY_SEPARATOR, __DIR__) . 'assets/images/description' . DIRECTORY_SEPARATOR . $destination;
        return base_url('./assets/images/description/'.$destination);
    }

    // ไม่ได้ใช้ 
    function storage_url($destination = null)
    {
        if(!empty($destination))
        {
            $destination = $destination . '/';
        }

        $_uri = explode('/', $_SERVER['PHP_SELF']);
        print_r($_uri);
        die();
        
        array_pop($_uri);
        array_pop($_uri);
        
        $_uri[0]= $_SERVER['HTTP_HOST'];
        $_uri[] = 'assets/images/description';
        $uri = implode('/', $_uri);

        return "https://{$uri}/{$destination}";
    }

}
