<?php

/* 
 * This widget was created to expand on the cmenu widget
 * To use this widget you will need to import the 3 sql files in the db folder
 * Examples of widget use are listed below.
 */

/* 
 *  Usage:  <?php $this->widget('ext.DBMenu.DBMenu',array('group_id'=>1)); ?> 
 *  You will need to generate with Gii the model and crud for menu, submenu and subsubmenu
 *  and create the relationships between them.  
 * 
 *  */
class DBMenu extends CWidget {
   //The group id defaults to 1 which includes the Home menu only.   You should create your menu groups and assign them based on your users needs. 
    public $group_id = 1;   
    public $assetsPath = '';
    
    
    
    public function init() {
    
        function subsubmenu($id){
         $subsubmenu = Yii::app()->db->createCommand()
                                ->select('sub_menu_id,url,linkOption,label,view,visibility,position')
                                ->from('subsubmenu')
                                ->where('sub_menu_id=:id', array(':id'=>$id))
								->order('position');
				
            $data = $subsubmenu->query();
             foreach($data as $key=> $value) {
                  $items[] =array(
                     'label'=>$value['label'],
                      'url'=>array(
                        $value['url'],
                         //'view'=>$value['view'],

                     ),
                      'linkOptions'=>array('onclick'=>$value['linkOption']),
                     'visible'=>$value['visibility']

                         );
           
             }
      
            if(isset($items)) {
                   return $items;
            }
        }

    
            function submenu($id){
                     $submenu = Yii::app()->db->createCommand()
                                            ->select('id,menu_id,url,linkOption,label,view,visibility,position')
                                            ->from('submenu')
                                            ->where('menu_id=:id', array(':id'=>$id))
                                                            ->order('position');

                   $data = $submenu->query();
                   
                   foreach($data as $key=> $value) {
                         $items[] =array(

                            'label'=>$value['label'],
                             'url'=>array(
                               $value['url'],
                                //'view'=>$value['view'],

                            ),
                             'linkOptions'=>array('onclick'=>$value['linkOption']),
                            'visible'=>$value['visibility'],
                            'items'=>subsubmenu($value['id']),

                                );

                    }

                  if(isset($items)) {
                         return $items;
                   }
            }

        function GetMenu($group_id) {
                $mainmenu = Yii::app()->db->createCommand()
                                        ->select('id,menu_group_id,url,linkOption,label,view,visibility,position')
                                        ->from('menu')
                                        ->where('menu_group_id=:id', array(':id'=>$group_id))
                                                                        ->order('position')
                                        ;

                                         ;
                $loginlogout = array( 
                                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                    );
               		
               $data = $mainmenu->query();
                foreach($data as $key=> $value) {
                    $items[] = array( 

                        'label'=>$value['label'],
                        'url'=>array(
                            $value['url'],
                            //'view'=>$value['view'],


                        ),
                        'linkOptions'=>array('onclick'=>$value['linkOption']),
                        'visible'=>$value['visibility'], 
                        'items'=>submenu($value['id']),

                   );

                 }


             return array_merge($items,$loginlogout);
            }   

        }
    
    protected function registerClientScripts()
    { // Register the jqueryslidemenu script and css.  Note you can customize the css to fit your color scheme.		
    	$cs = Yii::app()->clientScript;	
		$cs->registerCssFile($this->assetsPath . '/css/jquery-ui.css');
		$cs->registerCssFile($this->assetsPath . '/css/jqueryslidemenu.css');
		$cs->registerCoreScript('jquery'); 
		$cs->registerScriptFile($this->assetsPath . '/js/jquery-ui.js');
		$cs->registerScriptFile($this->assetsPath . '/js/jqueryslidemenu.js');
		
    }
	
		
    
    
    
    public function run() {
        
        $this->assetsPath = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets');
        $this->registerClientScripts();
        
        $this->render('DBMenu');
    }
    
    
}