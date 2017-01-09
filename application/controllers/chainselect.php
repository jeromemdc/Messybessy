<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Chainselect extends CI_Controller {
  
  private $bmw = array('1 series', '3 series', '5 series', '7 series', 'x3', 'x6');
  private $tesla = array('Model S', 'Roadster', 'Model X');
  private $honda = array('Civic', 'Fit', 'Accord', 'Pathfinder', 'Crossover');
  private $lexus = array('IS', 'ES', 'GS', 'LS', 'RX', 'LFA');


  /* The index() function gets called on page load. */
  public function index()
	{
    /* Load the view */
		$this->load->view('page_view');
	}
    
  
  public function models()
  {
    
    /* Get the model from the URI (/index.php/chainselect/models/{make}) */
    $make = $this->uri->segment(3);

    switch ($make) {
      case 'bmw': echo $this->makeOptions($this->bmw);break;
      case 'tesla': echo $this->makeOptions($this->tesla);break;
      case 'honda': echo $this->makeOptions($this->honda);break;
      case 'lexus': echo $this->makeOptions($this->lexus);break;
      default:break;
    }
  }
  
  /* The function used to wrap the models into <option> tags */
  public function makeOptions($make)
  {
    $options = '';
    
    foreach ($make as $key => $value) {
      $options .= "<option value='$key'>$value</option>";
    }
    return $options;
  }

  
}