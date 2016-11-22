<?php
$delete = file_get_contents('data.json');
$data = $delete;
$data = array();
                if(mysqli_num_rows($products) > 0){

                    while($product = mysqli_fetch_array($products)) {
                        $blet = array(
                            'Product_ID' => $product['Product_ID'],
                            'name' => $product['name'],
                            'price' => $product['price'],
                            'description' => $product['description'],
                            'color' => $product['color'],
                            'size' => $product['size'],
                            'material' => $product['material'],
                            'images' => $product['images'],
                            'stock' => $product['stock'],
                            'tags' => $product['tags'],
                            'manufacture' => $product['manufacture'],
                            'upvotes' => $product['upVote']
                        );
                        array_push($data, $blet);
                    }
                }
$jso = json_encode($data);

file_put_contents('data.json', $jso);

                ?>