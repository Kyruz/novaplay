<?php $newQuery = mkQuery('produto', 'id_produto, nome_prod, preco', 'cod_categoria = 34 AND (tags LIKE ("%hdd%") AND tags LIKE ("%interno%"))', 'nome_prod');