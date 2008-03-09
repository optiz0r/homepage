<?php
    
    /*
     *    
     *    
     */
     
     $_template['title'] = 'Home';
    
?>
<div>
	<img class="bio" src="<?php echo $_meta['base-dir']; ?>/resources/bios_scott.jpg" alt="Me?" />
	
	<p>
		I am a third year student at ECS in Southampton, studying for a Masters degree in Computer Science (with Networks and Distributed Systems).
	</p>
	<p>
		Here you can find a copy of my <a href="<?php echo $_req->construct('page','cv'); ?>" title="Curriculum Vitae">CV</a>,
		or you can contact me via bar105<img class="at" src="<?php echo $_meta['base-dir']; ?>/resources/at.png" alt="@" />ecs.soton.ac.uk.
	</p>
	
	
</div>