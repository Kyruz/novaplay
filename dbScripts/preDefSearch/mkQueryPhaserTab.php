<?php $newQuery = mkQuery('produto', 'id_produto, nome_prod, preco', 'cod_categoria = 15 AND produtor LIKE ("%phaser%")', 'nome_prod');