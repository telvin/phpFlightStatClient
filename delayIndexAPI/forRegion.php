<?php
/**
 * 
 * 
 * @package
 * @copyright
 */
class forRegion {
  /* string */
  public $appId;
  /* string */
  public $appKey;
  /* string */
  public $region; //Region [Africa, Antarctica, Asia, Caribbean, Central-America, Europe, Middle-East, North-America, Oceania, South-America]
  /* string */
  public $classification; //Airport classification filter, used to restrict results to larger airports [1-5, 1=largest]
  /* string */
  public $score; //Delay index normalized score filter, used to restrict results to airports experiencing delays [0-5, 5=maximum delay]
  /* string */
  public $extendedOptions;
}

?>
