<?php

/* 
 * This widget was created to expand on the cmenu widget
 * To use this widget you will need to import the 3 sql files in the db folder
 * Examples of widget use are listed below.
 */

$this->widget('zii.widgets.CMenu',array(
			'items'=>GetMenu($this->group_id),
                                    
                        	
		
		));

