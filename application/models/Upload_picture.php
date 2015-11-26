<?php

/**
 * 
 */
class Upload_Picture extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
    }

    public function update_member_picture($id, $img) {
        $this->db->set('pic', $img);
        $this->db->where('id', $id);
        $this->db->update('members');
    }

    public function resize($img, $height, $prefix, $delimiter) {

        $img_thumb = $img['full_path'];

        $img_thumb_name = $img['file_name'];

        $path_count = strlen($img_thumb) - strlen($img_thumb_name);

        $imgg = substr($img_thumb, $path_count);


        $thumb['image_library'] = 'gd2';
        $thumb['source_image'] = $img_thumb;
        //$thumb['create_thumb'] = TRUE;
        //$thumb['width'] = 250;
        $thumb['height'] = $height;
        $thumb['new_image'] = $prefix . $delimiter . $imgg;

        $thumb['img_src'] = base_url() . $thumb['new_image'];

        $this->image_lib->initialize($thumb);

        if (!$this->image_lib->resize()) {
            $this->image_lib->clear();
            return False;
        }
        $this->image_lib->clear();

        return $thumb;
    }
    public function resize_width($img, $width, $prefix, $delimiter) {

        $img_thumb = $img['full_path'];

        $img_thumb_name = $img['file_name'];

        $path_count = strlen($img_thumb) - strlen($img_thumb_name);

        $imgg = substr($img_thumb, $path_count);


        $thumb['image_library'] = 'gd2';
        $thumb['source_image'] = $img_thumb;
        //$thumb['create_thumb'] = TRUE;
        $thumb['width'] = $width;
        //$thumb['height'] = $height;
        $thumb['new_image'] = $prefix . $delimiter . $imgg;

        $thumb['img_src'] = base_url() . $thumb['new_image'];

        $this->image_lib->initialize($thumb);

        if (!$this->image_lib->resize()) {
            $this->image_lib->clear();
            return False;
        }
        $this->image_lib->clear();

        return $thumb;
    }

    public function crop($img_full_path, $img_file_name, $width, $height, $prefix, $delimiter) {

        list($lwidth, $lheight, $ltype, $lattr) = getimagesize($img_full_path);
        if ($width > $lwidth) { // проверяваме дали подадената ширина не надвишава реалната ширина на снимката
            $width = $lwidth;   // ако е така слагаме реалната ширина на снимката. Т.е няма кроп по ширина
        }
        if ($height > $lheight) { // проверяваме дали подадената височина не надвишава реалната височина на снимката
            $height = $lheight;   // ако е така слагаме реалната височина на снимката. Т.е няма кроп по височина
        }
        $x_axis = ($lwidth-$width)/2; // определяме офсета на ширината за да се кропва винаги от центъра
        $y_axis = ($lheight-$height)/2; // определяме офсета на височината за да се кропва винаги от центъра
        $img_thumb = $img_full_path;

        $img_thumb_name = $img_file_name;

        $path_count = strlen($img_thumb) - strlen($img_thumb_name);

        $imgg = substr($img_thumb, $path_count);

        $thumb['image_library'] = 'gd2';
        $thumb['source_image'] = $img_thumb;
        //$thumb['create_thumb'] = TRUE;
        $thumb['x_axis'] = $x_axis;
        $thumb['y_axis'] = $y_axis;
        $thumb['maintain_ratio'] = FALSE;
        $thumb['width'] = $width;
        $thumb['height'] = $height;
        $thumb['new_image'] = $prefix . $delimiter . $imgg;

        $thumb['img_src'] = base_url() . $thumb['new_image'];

        $this->image_lib->initialize($thumb);

        if (!$this->image_lib->crop()) {
            $this->image_lib->clear();
            return False;
        }
        $this->image_lib->clear();

        return $thumb;
    }

}
