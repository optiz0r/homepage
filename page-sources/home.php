<?php
    
    /*
     *    
     *    
     */
     
     $_template['title'] = 'Home';
    
?>
<div>
<img class="avatar" style="width: 10em;" src="<?php echo $_meta['base-dir']; ?>/files/me-300.png" alt="Photo of Ben Roberts" />
	<p>
		I have completed three years of a Master's degree in Computer Science (with Networks and Distributed Systems) at ECS, University of Southampton, UK. I am due to graduate in June 2010.
	</p>
	<p>
		I am currently working for <a href="http://www.netcraft.com/" title="Netcraft homepage">Netcraft</a> in Bath, while taking a year out from my studies. My roles include developing and running the <a href="http://news.netcraft.com/SSL-survey" title="Netcraft's SSL Server Survey">SSL Server Survey</a>, reviewing <a href="http://audited.netcraft.com/audited" title="Netcraft's Automated Vulnerability Scanning">Automated Vulnerability Scan</a> results, and doing the occasional <a href="http://audited.netcraft.com/web-application" title="Netcraft's Application Penetration & Security Testing">penetration test</a> against web applications for financial institutions.
	</p>
	<p>
		On this site you can find a copy of my <a href="<?php echo $_meta['base-dir']; ?>/files/BenRobertsCv.pdf" title="Curriculum Vitae">CV</a>,
		or see what <a href="<?php echo $_req->construct('page','projects'); ?>" title="Projects">projects</a> I have been working on in my spare time.
	</p>
	<p>
		You can contact me via bar105<img class="at" src="<?php echo $_meta['base-dir']; ?>/resources/at.png" alt="@" />ecs.soton.ac.uk.
	</p>
	
	
</div>
