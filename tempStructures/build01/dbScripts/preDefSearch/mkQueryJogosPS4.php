<?php $newQuery = mkQuery('produto', 'id_produto, nome_prod, preco', 'cod_categoria = 14 AND tags LIKE ("%4%") AND tags LIKE ("%playstation%")', 'nome_prod');
