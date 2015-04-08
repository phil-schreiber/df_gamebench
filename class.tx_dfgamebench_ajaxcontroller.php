<?php
require_once(PATH_tslib.'class.tslib_pibase.php');
class tx_dfgamebench_ajaxcontroller extends tslib_pibase{
    public $cObj;    
    public $scriptRelPath = 'class.tx_dfgamebench_ajaxcontroller.php';
    
    public function main() {        
        $this->cObj = t3lib_div::makeInstance('tslib_cObj');
        $this->initTSFE();        
        $this->init();
        if($_POST['gameid']){
            if($_POST['result']){
                $this->addResult(intval($_POST['gameid']),intval($_POST['result']));
            }
            
            $average=$this->getAverage(intval($_POST['gameid']));
            
        }
        
        return($average);
    }
    
    private function addResult($gameid,$result){
        $insArray=array(
            'resultvalue'=>$result,
            'gameid'=>$gameid
        );
        $GLOBALS['TYPO3_DB']->exec_INSERTquery(
                'tx_dfgamebench_result',
                $insArray
                );
        
    }
    
    private function getAverage($gameid){
        $query=$GLOBALS['TYPO3_DB']->sql_query("SELECT AVG(resultvalue) AS average FROM tx_dfgamebench_result WHERE gameid=".$gameid." GROUP BY gameid");
        $average=$GLOBALS['TYPO3_DB']->sql_fetch_assoc($query);
        $averageVal=round($average['average'],2);
        
        return $averageVal;
    }
     private function init(){
             
            $this->pi_setPiVarDefaults();
            $this->pi_loadLL();
            $this->pi_USER_INT_obj = 1;	
            $this->pi_initPIflexForm();
            
            
        }
        
   
    
    protected function initTSFE() {         
        $GLOBALS['TSFE'] = t3lib_div::makeInstance('tslib_fe', $GLOBALS['TYPO3_CONF_VARS'], (int)t3lib_div::_GP('id'), (int)t3lib_div::_GP('type'));
        $GLOBALS['TSFE']->connectToDB(); 
        

       
    } 
        
    
    
}    

$output = new tx_dfgamebench_ajaxcontroller();
echo $output->main();
?>