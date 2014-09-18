<?php $newQuery = mkQuery('produto', 'id_produto, nome_prod, preco', 'cod_categoria IN (6, 14) AND tags LIKE ("%2%") AND tags LIKE ("%playstation%")', 'cod_categoria, nome_prod');
