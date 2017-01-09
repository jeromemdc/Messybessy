<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Chaincheckbox extends CI_Controller {

  private $classification = array('Filipino','Chinese','Japanese','American','Korean','European','Asean','Asian and Western');
  private $manufacturing = array('IFP-Bread and Cake','IFP-Ice Cream','IFP-Noodle');

  /* The index() function gets called on page load. */
  public function index()
	{
    /* Load the view */
		$this->load->view('page_view2');
	}
    
  
    public function models(){
    
        /* Get the model from the URI (/index.php/chainselect/models/{make}) */
        $make = $this->uri->segment(3);

        /*switch ($make) {
            case 1: echo $this->makeOptions($this->classification);break;
            case 2: echo $this->makeOptions($this->classification);break;
            case 3: echo $this->makeOptions($this->classification);break;
            case 4: echo $this->makeOptions($this->classification);break;
            case 5: echo $this->makeOptions($this->classification);break;
            case 6: echo $this->makeOptions($this->classification);break;
            case 7: echo $this->makeOptions($this->classification);break;
            case 8: echo $this->makeOptions($this->manufacturing);break;
            default:break;
        }*/

        if($make == 8){
          echo $this->makeOptions($this->manufacturing);
        }else{
          echo $this->makeOptions($this->classification);
        }
    }
  
    /* The function used to wrap the models into <option> tags */
    public function makeOptions($make){
        $options = '';
        
        foreach ($make as $key => $value) {
            $keyval = $key + 1;
            $required = ($keyval == 1 ? 'data-parsley-mincheck=1 required' : '');
            $options .= "<label class='checkbox-inline'><input type='checkbox' name='classification[]' value='$keyval' $required >$value</label>";
        }
        return $options;
    }

  
}