<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDbooster;
use crocodicstudio\crudbooster\controllers\CBController;

class AdminCmsUsersController extends CBController {


    public function cbInit() {
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->table               = 'cms_users';
        $this->primary_key         = 'id';
        $this->title_field         = "name";
        $this->button_action_style = 'button_icon';
        $this->button_import 	   = FALSE;
        $this->button_export 	   = FALSE;
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = array();
        $this->col[] = array("label"=>"Photo","name"=>"photo","image"=>1);
        $this->col[] = array("label"=>"Name","name"=>"name");
        $this->col[] = array("label"=>"Email","name"=>"email");
        $this->col[] = ["label"=>"Numero de identidad","name"=>"identification_number"];
        $this->col[] = array("label"=>"Privilege","name"=>"id_cms_privileges","join"=>"cms_privileges,name");
        $this->col[] = ["label"=>"Sede","name"=>"stores_id",'type'=>'text',"join"=>'stores,name'];
        $this->col[] = ["label"=>"Codigo","name"=>"code",'type'=>'text'];
        $this->col[] = ["label"=>"Disponible","name"=>"available","callback" => function ($row) {
            if ($row->available == 1) {
                return 'Si';
            } else {
                return 'No';
            }
        }];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = array();
        $this->form[] = array("label"=>"Name","name"=>"name",'required'=>true,'validation'=>'required|alpha_spaces|min:3');
        $this->form[] = array("label"=>"Email","name"=>"email",'required'=>true,'type'=>'email','validation'=>'required|email|unique:cms_users,email,'.CRUDBooster::getCurrentId());
        $this->form[] = array("label"=>"Photo","name"=>"photo","type"=>"upload","help"=>"Recommended resolution is 200x200px",'required'=>true,'validation'=>'required|image|max:1000','resize_width'=>90,'resize_height'=>90);
        $this->form[] = array("label"=>"Privilege","name"=>"id_cms_privileges","type"=>"select","datatable"=>"cms_privileges,name",'required'=>true);
        // $this->form[] = array("label"=>"Password","name"=>"password","type"=>"password","help"=>"Please leave empty if not change");
        $this->form[] = array("label"=>"Password","name"=>"password","type"=>"password","help"=>"Please leave empty if not change");
        $this->form[] = array("label"=>"Password Confirmation","name"=>"password_confirmation","type"=>"password","help"=>"Please leave empty if not change");
        $this->form[] = ['label'=>'Sede','name'=>'stores_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'stores,name'];
        $this->form[] = ['label'=>'Codigo','name'=>'code','type'=>'text','width'=>'col-sm-10'];
        $this->form[] = ['label'=>'Numero de identidad','name'=>'identification_number','type'=>'text','validation'=>'','width'=>'col-sm-10'];

        # END FORM DO NOT REMOVE THIS LINE

    }

    public function getProfile() {

        $this->button_addmore = FALSE;
        $this->button_cancel  = FALSE;
        $this->button_show    = FALSE;
        $this->button_add     = FALSE;
        $this->button_delete  = FALSE;
        $this->hide_form 	  = ['id_cms_privileges'];

        $data['page_title'] = cbLang("label_button_profile");
        $data['row'] = CRUDBooster::first('cms_users',CRUDBooster::myId());

        return $this->view('crudbooster::default.form',$data);
    }
    public function hook_before_edit(&$postdata,$id) {
        unset($postdata['password_confirmation']);
    }
    public function hook_before_add(&$postdata) {
        unset($postdata['password_confirmation']);
    }
}
