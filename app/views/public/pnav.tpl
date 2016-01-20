	<nav id="pnav">
		{assign var="num" value="5"}
		<ul>
		{if $page neq 1}
			<li><a class="pnav-icon page-pre" href="/page/{$page-1}"><i class="icon-angle-left"></i></a></li>
		{/if}

		{php}
			$num   = $this->_tpl_vars[num];
			$page  = $this->_tpl_vars[page];
			$pages = $this->_tpl_vars[pages];

			if($page - $num <= 0 || $pages <= $num){
				$begin = 1;
				$end   = $pages;
				for($i=$begin; $i<=$end; $i++){
					if($i != $page){
						echo "<li><a href='/page/".$i."'>".$i."</a></li>";
					}else{
						echo "<li><a class='active' href='/page/".$i."'>".$i."</a></li>";
					}
				}
			}elseif($page+$num>=$pages){
				$begin = $pages - $num;
				$end   = $pages;
				for($i=$begin; $i<=$end; $i++){
					if($i != $page){
						echo "<li><a href='/page/".$i."'>".$i."</a></li>";
					}else{
						echo "<li><a class='active' href='/page/".$i."'>".$i."</a></li>";
					}
				}
			}else{
				$begin = $page - 2;	
				$end   = $page + 2;	
				for($i=$begin; $i<=$end; $i++){
					if($i != $page){
						echo "<li><a href='/page/".$i."'>".$i."</a></li>";
					}else{
						echo "<li><a class='active' href='/page/".$i."'>".$i."</a></li>";
					}
				}
			}
		{/php}

<!--
		{if $page neq $pages and $pages gt 5}
			<li><a href="#">...</a></li>
			<li><a href="#">{$pages}</a></li>
		{/if}
-->
		{if $page neq $pages}
			<li><a class="pnav-icon page-next" href="{$page+1}"><i class="icon-angle-right"></i></a></li>
		{/if}
		</ul>
	</nav>
