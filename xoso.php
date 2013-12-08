<?php
/**
 * @package XoSo
 * @version 1.0
 */
/*
  Plugin Name: Kết Quả Xổ Số
  Plugin URI: http://www.xoso.com
  Description: Plugin giúp bạn chèn kết quả Xổ Số từ xoso.com vào trang web cực kỳ dễ dàng.
  Author: baby2j
  Version: 1.0
  Author URI: http://profiles.wordpress.org/baby2j
  License: GNU/GPL
 */

define('BMW_PATH', ABSPATH . 'wp-content/plugins/xoso');
require_once(ABSPATH . 'wp-includes/pluggable.php');

class XoSo extends WP_Widget {

    function __construct() {
        $params = array(
            'description' => 'Hiển thị kết quả Xổ Số.', //plugin description
            'name' => 'Ket qua Xo So'  //title of plugin
        );

        parent::__construct('XoSo', '', $params);
    }

    public function form($instance) {
//        $instance = wp_parse_args((array) $instance, array('title' => ''));
//        $title = $instance['title'];

        if ($instance) {
            $titlexs = esc_attr($instance['titlexs']);
            $tinhx = esc_attr($instance['tinhx']);
            $title_bg = esc_attr($instance['title_bg']);
            $title_cl = esc_attr($instance['title_cl']);
            $db_cl = esc_attr($instance['db_cl']);
            $crong = esc_attr($instance['crong']);
            $csize = (int) esc_attr($instance['csize']);
            $tt = (int) esc_attr($instance['tt']);
            $show_calenda = (int) esc_attr($instance['show_calenda']);
        } else {
            $titlexs = 'KQXS';
            $tinhx = 'xo-so-mien-bac';
            $title_bg = '9C0303';
            $title_cl = 'FFFFFF';
            $db_cl = 'A80804';
            $crong = '100%';
            $csize = 12;
            $tt = 1;
            $show_calenda = 1;
        }
        ?>
        <p><label for="<?php echo $this->get_field_id('titlexs'); ?>">Tiêu đề: <input class="widefat" id="<?php echo $this->get_field_id('titlexs'); ?>" name="<?php echo $this->get_field_name('titlexs'); ?>" type="text" value="<?php echo attribute_escape($titlexs); ?>" /></label></p>
        <p>
            <label for="<?php echo $this->get_field_id('tinhx'); ?>">KQXS Tỉnh: </label>
            <select name="<?php echo $this->get_field_name('tinhx'); ?>" id="<?php echo $this->get_field_id('tinhx'); ?>" class="widefat">
                <option value="xo-so-mien-bac"<?php echo($tinhx == 'xo-so-mien-bac' ? ' selected="selected"' : '') ?>>Miền Bắc</option>
                <option value="xo-so-tp-ho-chi-minh"<?php echo($tinhx == 'xo-so-tp-ho-chi-minh' ? ' selected="selected"' : '') ?>>Tp. Hồ Chí Minh</option>
                <option value="xo-so-ca-mau"<?php echo($tinhx == 'xo-so-ca-mau' ? ' selected="selected"' : '') ?>>Cà Mau</option>
                <option value="xo-so-dong-thap"<?php echo($tinhx == 'xo-so-dong-thap' ? ' selected="selected"' : '') ?>>Đồng Tháp</option>
                <option value="xo-so-phu-yen"<?php echo($tinhx == 'xo-so-phu-yen' ? ' selected="selected"' : '') ?>>Phú Yên</option>
                <option value="xo-so-thua-thien-hue"<?php echo($tinhx == 'xo-so-thua-thien-hue' ? ' selected="selected"' : '') ?>>Thừa Thiên Huế</option>
                <option value="xo-so-bac-lieu"<?php echo($tinhx == 'xo-so-bac-lieu' ? ' selected="selected"' : '') ?>>Bạc Liêu</option>
                <option value="xo-so-ben-tre"<?php echo($tinhx == 'xo-so-ben-tre' ? ' selected="selected"' : '') ?>>Bến Tre</option>
                <option value="xo-so-vung-tau"<?php echo($tinhx == 'xo-so-vung-tau' ? ' selected="selected"' : '') ?>>Vũng Tàu</option>
                <option value="xo-so-quang-nam"<?php echo($tinhx == 'xo-so-quang-nam' ? ' selected="selected"' : '') ?>>Quảng Nam</option>
                <option value="xo-so-dac-lac"<?php echo($tinhx == 'xo-so-dac-lac' ? ' selected="selected"' : '') ?>>Đắc Lắc</option>
                <option value="xo-so-dong-nai"<?php echo($tinhx == 'xo-so-dong-nai' ? ' selected="selected"' : '') ?>>Đồng Nai</option>
                <option value="xo-so-soc-trang"<?php echo($tinhx == 'xo-so-soc-trang' ? ' selected="selected"' : '') ?>>Sóc Trăng</option>
                <option value="xo-so-can-tho"<?php echo($tinhx == 'xo-so-can-tho' ? ' selected="selected"' : '') ?>>Cần Thơ</option>
                <option value="xo-so-da-nang"<?php echo($tinhx == 'xo-so-da-nang' ? ' selected="selected"' : '') ?>>Đà Nẵng</option>
                <option value="xo-so-khanh-hoa"<?php echo($tinhx == 'xo-so-khanh-hoa' ? ' selected="selected"' : '') ?>>Khánh Hòa</option>
                <option value="xo-so-binh-thuan"<?php echo($tinhx == 'xo-so-binh-thuan' ? ' selected="selected"' : '') ?>>Bình Thuận</option>
                <option value="xo-so-an-giang"<?php echo($tinhx == 'xo-so-an-giang' ? ' selected="selected"' : '') ?>>An Giang</option>
                <option value="xo-so-tay-ninh"<?php echo($tinhx == 'xo-so-tay-ninh' ? ' selected="selected"' : '') ?>>Tây Ninh</option>
                <option value="xo-so-binh-dinh"<?php echo($tinhx == 'xo-so-binh-dinh' ? ' selected="selected"' : '') ?>>Bình Định</option>
                <option value="xo-so-quang-binh"<?php echo($tinhx == 'xo-so-quang-binh' ? ' selected="selected"' : '') ?>>Quảng Bình</option>
                <option value="xo-so-quang-tri"<?php echo($tinhx == 'xo-so-quang-tri' ? ' selected="selected"' : '') ?>>Quảng Trị</option>
                <option value="xo-so-binh-duong"<?php echo($tinhx == 'xo-so-binh-duong' ? ' selected="selected"' : '') ?>>Bình Dương</option>
                <option value="xo-so-tra-vinh"<?php echo($tinhx == 'xo-so-tra-vinh' ? ' selected="selected"' : '') ?>>Trà Vinh</option>
                <option value="xo-so-vinh-long"<?php echo($tinhx == 'xo-so-vinh-long' ? ' selected="selected"' : '') ?>>Vĩnh Long</option>
                <option value="xo-so-gia-lai"<?php echo($tinhx == 'xo-so-gia-lai' ? ' selected="selected"' : '') ?>>Gia Lai</option>
                <option value="xo-so-ninh-thuan"<?php echo($tinhx == 'xo-so-ninh-thuan' ? ' selected="selected"' : '') ?>>Ninh Thuận</option>
                <option value="xo-so-binh-phuoc"<?php echo($tinhx == 'xo-so-binh-phuoc' ? ' selected="selected"' : '') ?>>Bình Phước</option>
                <option value="xo-so-hau-giang"<?php echo($tinhx == 'xo-so-hau-giang' ? ' selected="selected"' : '') ?>>Hậu Giang</option>
                <option value="xo-so-long-an"<?php echo($tinhx == 'xo-so-long-an' ? ' selected="selected"' : '') ?>>Long An</option>
                <option value="xo-so-dac-nong"<?php echo($tinhx == 'xo-so-dac-nong' ? ' selected="selected"' : '') ?>>Đắc Nông</option>
                <option value="xo-so-quang-ngai"<?php echo($tinhx == 'xo-so-quang-ngai' ? ' selected="selected"' : '') ?>>Quảng Ngãi</option>
                <option value="xo-so-kien-giang"<?php echo($tinhx == 'xo-so-kien-giang' ? ' selected="selected"' : '') ?>>Kiên Giang</option>
                <option value="xo-so-lam-dong"<?php echo($tinhx == 'xo-so-lam-dong' ? ' selected="selected"' : '') ?>>Lâm Đồng</option>
                <option value="xo-so-tien-giang"<?php echo($tinhx == 'xo-so-tien-giang' ? ' selected="selected"' : '') ?>>Tiền Giang</option>
                <option value="xo-so-kon-tum"<?php echo($tinhx == 'xo-so-kon-tum' ? ' selected="selected"' : '') ?>>Kon Tum</option>
            </select>
        </p>
        <p><label for="<?php echo $this->get_field_id('title_bg'); ?>">Màu nền: <input class="widefat color" id="<?php echo $this->get_field_id('title_bg'); ?>" name="<?php echo $this->get_field_name('title_bg'); ?>" type="text" value="<?php echo attribute_escape($title_bg); ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('title_cl'); ?>">Màu tiêu đề: <input class="widefat color" id="<?php echo $this->get_field_id('title_cl'); ?>" name="<?php echo $this->get_field_name('title_cl'); ?>" type="text" value="<?php echo attribute_escape($title_cl); ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('db_cl'); ?>">Màu giải ĐB: <input class="widefat color" id="<?php echo $this->get_field_id('db_cl'); ?>" name="<?php echo $this->get_field_name('db_cl'); ?>" type="text" value="<?php echo attribute_escape($db_cl); ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('crong'); ?>">Chiều rộng (90%,200px...): <input class="widefat" id="<?php echo $this->get_field_id('crong'); ?>" name="<?php echo $this->get_field_name('crong'); ?>" type="text" value="<?php echo attribute_escape($crong); ?>" /></label></p>
        <p>
            <label for="<?php echo $this->get_field_id('csize'); ?>">Font size: </label>
            <select name="<?php echo $this->get_field_name('csize'); ?>" id="<?php echo $this->get_field_id('csize'); ?>" class="widefat">
                <?php
                for ($option = 8; $option <= 30; $option++) {
                    echo '<option value="' . $option . '"' . ($csize == $option ? ' selected="selected"' : '') . '>' . $option . '</option>';
                }
                ?>
            </select>
        </p>
        <p><input type="checkbox" name="<?php echo $this->get_field_name('tt'); ?>" id="<?php echo $this->get_field_id('tt'); ?>" class="checkbox" value="1" <?php checked('1', $tt); ?> /><label for="<?php echo $this->get_field_id('tt'); ?>">Hiển thị link Trực Tiếp Xổ Số</label></p>
        <p><input type="checkbox" name="<?php echo $this->get_field_name('show_calenda'); ?>" id="<?php echo $this->get_field_id('show_calenda'); ?>" class="checkbox" value="1" <?php checked('1', $show_calenda); ?> /><label for="<?php echo $this->get_field_id('show_calenda'); ?>">Hiển thị lịch</label></p>
        <?php
    }

    public function widget($args, $instance) {
        extract($args, EXTR_SKIP);

        $tinhx = empty($instance['tinhx']) ? 'xo-so-mien-bac' : $instance['tinhx'];
        $title_bg = empty($instance['title_bg']) ? '9C0303' : $instance['title_bg'];
        $title_cl = empty($instance['title_cl']) ? 'FFFFFF' : $instance['title_cl'];
        $db_cl = empty($instance['db_cl']) ? 'A80804' : $instance['db_cl'];
        $crong = empty($instance['crong']) ? '100%' : $instance['crong'];
        $csize = (int) $instance['csize'];
        $tt = (int) $instance['tt'];
        $show_calenda = (int) $instance['show_calenda'];

        echo $before_widget;

        $titlexs = empty($instance['titlexs']) ? '' : apply_filters('widget_title', $instance['titlexs']);

        if (!empty($titlexs))
            $title = $before_title . $titlexs . $after_title;

        $str = '<div id="box_kqxs">';
        $str .= '<script type="text/javascript">';
        $str .= 'var bgcolor="#' . $title_bg . '";';
        $str .= 'var titlecolor="#' . $title_cl . '";';
        $str .= 'var dbcolor="#' . $db_cl . '";';
        $str .= 'var fsize="' . $csize . '";';
        $str .= 'var kqwidth="' . $crong . '";';
        $str .= 'var tt=' . $tt . ';';
        $str .= 'var cal=' . $show_calenda . ';';
        $str .= 'var titlexs="' . $titlexs . '";';
        $str .= '</script>';
        $str .= '<a href="http://www.xoso.com/ket-qua.html">Kết quả Xổ Số</a> từ <a href="http://www.xoso.com/">XOSO.COM</a>';
        $str .= '<script type="text/javascript" src="http://www.xoso.com/getkqxswp-' . $tinhx . '.js"></script>';
        $str .= '</div>';

        echo $str;

        echo $after_widget;
    }

}

add_action('init', 'xoso_display_init');
add_action('widgets_init', 'register_xoso');

function register_xoso() {
    register_widget('XoSo');
}

function xoso_display_init() {
    wp_enqueue_script('jquery');

    if (defined('WP_ADMIN') && WP_ADMIN) {
        wp_enqueue_script('jscolor', WP_PLUGIN_URL . '/xoso/jscolor/jscolor.js', false, '1.0');
        wp_enqueue_script('xoso', WP_PLUGIN_URL . '/xoso/xoso.js', false, '1.0');
    } else {
        wp_enqueue_style('xoso', WP_PLUGIN_URL . '/xoso/xoso.css', false, '1.0');
    }
}
?>
