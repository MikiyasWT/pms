<?php
class Upload
{
    public $allowed_types;
    private $upload_dir;
    public $maxsize;
    public $files = array();
    private $errors = array();
    private $post_name;

    function __construct($post_name = 'files', $folder_name = 'resources')
    {    // Configure upload directory
        $this->upload_dir = 'uploads' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR;
        // Define maxsize for files i.e 5MB
        $this->maxsize = 5 * 1024 * 1024;
        $this->post_name = $post_name;
        $this->allowed_types = array('jpg', 'png', 'jpeg', 'gif', 'php', 'zip', 'rar', 'txt');
    }
    private function check_file()
    {
        return empty(array_filter($_FILES["{$this->post_name}"]['name']));
    }
    public function upload_files()
    {
        $error_files = array();
        if ($this->check_file()) {
            return [false, 'no files found'];
        }
        foreach ($_FILES["{$this->post_name}"]['tmp_name'] as $key => $value) {

            $file_tmpname = $_FILES["{$this->post_name}"]['tmp_name'][$key];
            $file_name = $_FILES["{$this->post_name}"]['name'][$key];
            $file_size = $_FILES["{$this->post_name}"]['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

            // Set upload file path
            $filepath = $this->upload_dir . $file_name;

            // Check file type is allowed or not
            if (in_array(strtolower($file_ext), $this->allowed_types)) {

                // Verify file size - 2MB max
                if ($file_size > $this->maxsize)
                    array_push($this->errors, "Error: File size is larger than the allowed limit for ${file_name}");
                // return [false, "Error: File size is larger than the allowed limit."];

                // If file with name already exist then append time in
                // front of name of the file to avoid overwriting of file
                if (file_exists($filepath)) {
                    $filepath = $this->upload_dir . time() . $file_name;

                    if (move_uploaded_file($file_tmpname, $filepath)) {
                        array_push($this->files, $filepath);
                        // return [true, "{$file_name} successfully uploaded"];
                    } else {
                        array_push($this->errors, "Error uploading {$file_name}");
                        // return [false, "Error uploading {$file_name}"];
                    }
                } else {

                    if (move_uploaded_file($file_tmpname, $filepath)) {
                        array_push($this->files, $filepath);
                        // return [true, "{$file_name} successfully uploaded"];
                        // echo "{$file_name} successfully uploaded <br />";
                    } else {
                        array_push($this->errors, "Error uploading {$file_name}");
                        // return [false, "Error uploading {$file_name}"];
                        // echo "Error uploading {$file_name} <br />";/
                    }
                }
            } else {

                // If file extension not valid
                // echo "Error uploading {$file_name} ";
                array_push($this->errors, "{$file_ext} file type is not allowed for {$file_name}");
                // return [false, "{$file_ext} file type is not allowed for {$file_name}"];
            }
        }
        // return $retVal = (count($this->errors)) ? [false, $this->errors] : true;
        // return $this->files;
        if (count($this->errors)) {
            foreach ($this->files as $key) {
                unlink($key);
            }
            return [false, $this->errors];
        }else{
            return [true];
        }
    }
    public function get_files()
    {
        return json_encode($this->files);
    }
}
