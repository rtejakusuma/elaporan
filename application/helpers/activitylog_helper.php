<?php
function activity_log($act = NULL, $id = NULL)
{
    $CI = &get_instance();

    if ($act == 'i') {
        $act = 'insert';
    } elseif ($act == 'u') {
        $act = 'update';
    } elseif ($act == 'd') {
        $act = 'delete';
    }

    $data['log_act'] = $act;
    $data['log_query'] = $CI->db->last_query();
    $data['log_userid'] = $CI->session->tempdata('id');
    $data['log_username']  = $CI->session->tempdata('username');

    $CI->load->model('activitylog_model');

    $CI->activitylog_model->save_log($data);
}
