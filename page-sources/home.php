<?php
    
    /*
     *    
     *    
     */
     
     $_template['title'] = 'Home';
    
?>
<div>
	<p>
		I am a third year student at ECS in Southampton, studying for a Master's degree in Computer Science (with Networks and Distributed Systems).
		I am about to start an Industrial Year out, working for <a href="http://www.netcraft.com/" title="Netcraft homepage">Netcraft</a> in Bath.
	</p>
	<p>
		On this site you can find a copy of my <a href="<?php echo $_meta['base-dir']; ?>/files/BenRobertsCv.pdf" title="Curriculum Vitae">CV</a>,
		or see what <a href="<?php echo $_req->construct('page','projects'); ?>" title="Projects">projects</a> I have been working on.
	</p>
	<p>
		You can contact me via bar105<img class="at" src="<?php echo $_meta['base-dir']; ?>/resources/at.png" alt="@" />ecs.soton.ac.uk.
	</p>
	
	
</div>