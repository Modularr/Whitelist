<?php
/**
 * This is a very simple PHP Whitelist Library.
 * 
 * @package Whitelist
 * @license http://unlicense.org UnLicense
 */
class Whitelist
{
    /**
     * WhiteList data.
     *
     * @var array
     * @access protected
     */
    protected $whitelisted = array();
    
    /**
     * Constructor
     *
     * @param $file NULL not required
     */
    public function __construct($file=NULL)
    {
        # Only if initialized by default.
        if($file != NULL)
        {
            # Load the File
            $this->Load($file);
        }
    }
    
    /**
     * Verification method.
     * 
     * This method verifies the input against the Whitelist.
     *
     * @param $input
     */
    public function Verify($input)
    {
        # Normalize data.
        $input = strtolower($input);
        
        # Verify the Input Against the Array
        if(in_array($input,$this->whitelisted))
        {
            return 1;
        }
    }
    
    /**
     * Add Method.
     * 
     * This method adds a new item in the WhiteList Array manually.
     *
     * @param $input
     */
    public function Add($input)
    {
        # Manually Add Item to the Array
        $this->whitelisted[] = $input;
    }
    
    /**
     * This method Loads a File, from that result it Splits and stores each newline into the WhiteList array.
     * 
     * @param $file
     * @return $whitelisted
     */
    public function Load($file)
    {
        # Read File
        $string = file_get_contents($file);
        
        # Split Items into the Array
        $this->whitelisted = array_map('trim', explode("\n", $string));
        
        # Lowercase all entries to Normalise data
        $this->whitelisted = array_map('strtolower', $this->whitelisted);
        
        # Return Whitelist in case someone wants to check it.
        return $this->whitelisted;
    }
}
