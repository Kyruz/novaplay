<?php $newQuery = mkQuery('produto', 'id_produto, nome_prod, preco', 'cod_categoria = 14 AND tags LIKE ("%xbox%") AND tags LIKE ("%360%")', 'cod_categoria, nome_prod');
