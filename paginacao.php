<?php 
// pega dados de paginacao
$dadosPaginacao = calculaEscala($produtos['pagina_atual'], $produtos['total_paginas']); 

?>

<div id="paginacao" class="content-fluid">
	<nav aria-label="Page navigation" class="row">
		<ul class="pagination">
			<li>
		    	<a class="paginator" href="javascript:void(0)" aria-label="Previous" data-page="<?php echo $dadosPaginacao['originalFirstPage']; ?>">
		        	<span aria-hidden="true">&laquo;</span>
		      	</a>
		    </li>
		    <li class="pageSetasOne">
		    	<a href="javascript:void(0)" class="paginator paginacao" data-page="<?php echo $dadosPaginacao['previousPage']; ?>">
		    		<span class="setaUnica" aria-hidden="true">&laquo;</span>
		    	</a>
		    </li>
		    
		    <?php if ($dadosPaginacao['initialSuspensionPoints'] == true) : ?>
		    	<li class="">
		    		<a class="paginator" href="javascript:void(0)" data-page="<?php echo $dadosPaginacao['originalFirstPage']; ?>">1</a>
		    	</li>
		    	<li class="">
		    		<a href="javascript:void(0)">...</a>
		    	</li>
		    <?php endif; ?>
		    
		    
		    <?php for ($x = $dadosPaginacao['firstPage']; $x <= $dadosPaginacao['lastPage']; $x++ ) : ?>
		    	<li>
		    		<a 	class="paginator" 
		    			href="javascript:void(0)" 
		    			style="<?php echo ($x == $dadosPaginacao['currentPage']) ? 'color: #f05a23;' : '' ;?>" 
		    			data-page="<?php echo ($x != $dadosPaginacao['currentPage']) ? $x : '0'; ?>">
		    			<?php echo $x ?>
		    		</a>
		    	</li>
		    <?php endfor; ?>
		    
		    <?php if ($dadosPaginacao['finalSuspensionPoints'] == true) : ?>
		    	<li class="">
		    		<a href="javascript:void(0)">...</a>
		    	</li>
		    	<li class="">
		    		<a class="paginator" href="javascript:void(0)" data-page="<?php echo $dadosPaginacao['originalLastPage']; ?>">
		    			<?php echo $dadosPaginacao['originalLastPage']; ?>
		    		</a>
		    	</li>
		    <?php endif; ?>
		    	
		    <li class="pageSetasOne">
		    	<a href="javascript:void(0)" class="paginator paginacao" data-page="<?php echo $dadosPaginacao['nextPage']; ?>">
		    		<span class="setaUnica" aria-hidden="true">&raquo;</span>
		    	</a>
		    </li>
		    <li>
		    	<a class="paginator" href="javascript:void(0)" aria-label="Next" data-page="<?php echo $dadosPaginacao['originalLastPage']; ?>">
		        	<span aria-hidden="true">&raquo;</span>
		      	</a>
		    </li>
		</ul>
	</nav>
</div>