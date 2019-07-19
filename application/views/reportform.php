<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>

    <div id='header'></div>
    <div id='featurebar'></div>
    <div id='reporttypelist'>
        <ul>
            <?php
            require_once(APPPATH . "libraries/reporttypelist.php");
            $opd = $this->session->tempdata('opd');
            foreach ($reporttype[$opd] as $type) {
                echo "<li><a href='" . base_url() . "reportform/f/$type'>" . $type . "</a></li>";
            }
            ?>
        </ul>

    </div>
    <div id='reportform'></div>
    <?php // edit form here
    if ($data['fielddata'] != NULL && $data['formname'] != NULL) {
        // manual form edit -> uncomment yang file_get_content, comment yang bawahnya
        echo file_get_contents(APPPATH . "libraries/formtemplate/".$data['formname'].".php");
        // echo form_open('reportform/submit', '', array('formname' => $data['formname']));
        // foreach($data['fielddata'] as $f){
        //     echo "$f->name $f->type $f->max_length<br/>";
        // }
        // echo form_close();
        
    }
    ?>
    <br />
    <a href="<?php echo base_url('auth/logout') ?>">Logout</a>
</body>

</html>