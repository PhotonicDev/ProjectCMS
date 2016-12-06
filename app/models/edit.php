<?php
 class edit extends model {

        function newProduct(){
            $filepath = $this->pictureLink($_FILES["uploadimage"]);
            $this->model->query('INSERT INTO `products` (name, price, description, manufacture, color, size, material ,stock, tags, images,views,upVote) 
VALUES (?,?,?,?,?,?,?,?,?,?,0,0)' ,
                array(
                    url::post("product_name"),
                    url::post("product_price"),
                    url::post("product_description"),
                    url::post("product_manufacture"),
                    url::post("product_color"),
                    url::post("product_size"),
                    url::post("product_category"),
                    url::post("product_stock"),
                    url::post("product_tags"),
                    $filepath
                ));
        }
        function delete_news($page) {
            $this->model->query("DELETE FROM `newspage` WHERE `Page_ID`=?",array($page));
        }
        function addNews(){
            $header = url::post("add_news_header");
            $text = url::post("add_news_text");

            $filepath = $this->pictureLink($_FILES["uploadimage"]);
            $this->model->query("INSERT INTO `newspage` 
(`Page_ID`, `Image`, `Description`, `DATE`, `Header`) 
VALUES (NULL, ?,?,NOW(),?)",array($filepath,$text,$header));

        }
        private function pictureLink($file)
        {
            $filepath = "";
            if (file_exists("/ProjectCMS/assets/web_images/" .$file["name"]) || is_uploaded_file($file["tmp_name"])) {


                if ($file['size'] > 0 &&
                    (($file["type"] == "image/gif") ||
                        ($file["type"] == "image/jpeg") ||
                        ($file["type"] == "image/pjpeg") ||
                        ($file["type"] == "image/png") &&
                        ($file["size"] < 2097152))
                ) {

                    $filepath = $file["name"];
                    move_uploaded_file($file["tmp_name"], 'C:/wamp64/www/ProjectCMS/assets/web_images/' . $filepath );

                }
                if ($file["error"] > 0) {
                    echo "Return Code: " . $file["error"] . "<br />";
                }
            }
            else {
                $filepath = $file["name"];
            }
            return $filepath;
        }
 }