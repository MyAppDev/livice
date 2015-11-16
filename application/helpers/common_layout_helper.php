<?php
/**
 * 共通レイアウトを適用する為のヘルパー
 *
 */
if ( ! function_exists('hospital_common_view'))
{
    function hospital_common_view($body, $data)
    {
      $CI = get_instance();
      $layout_data['content_header'] = $CI->load->view('common/hospital/dashboard_layout_header', array(), true);
      $layout_data['content_body'] = $CI->load->view($body, $data, true);
      $layout_data['content_footer'] = $CI->load->view('common/hospital/dashboard_layout_footer', array(), true);
      $layout_data = array_merge($layout_data, $data);
      $CI->load->view('common/hospital/dashboard_layout_main', $layout_data);
    }
}
?>
