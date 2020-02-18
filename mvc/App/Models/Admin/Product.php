<?php
// Model :: Product
namespace App\Models\Admin;
use PDO;

class Product extends \Core\Model
{
	public static function getAllProducts(){
		try{
            $db = static::getDB();
            $stmt = $db->query('SELECT 
            						p.products_id,
            						p.products_name,
            						GROUP_CONCAT(c.categories_categoryname) "category_name", 
            						p.products_sku, 
            						p.products_urlkey,
            						p.products_image,
            						p.products_status,
            						p.products_description,  
            						p.products_shortdescription,  
            						p.products_price,  
            						p.products_stock 
            					FROM products p
            					LEFT JOIN products_categories pc ON
            						p.products_id = pc.products_id
            					LEFT JOIN categories c ON
            						c.categories_id = pc.categories_id
            					GROUP BY
            						p.products_id');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }	
	}

	public static function addProduct($dataArray){
		extract($dataArray);
		$urlkey = Product::getProductURLKey($txtProductName);
		if(!$urlkey){
			return false;
		}
		else{
			$txtProductName = Product::getProductNameStudlyCase($txtProductName);

			try{
				$db = static::getDB();

				$fileName = $_FILES["imgProductImage"]["name"];

				@$location = "src/images/products/" . $_FILES["imgProductImage"]["name"];
	            if(move_uploaded_file(@$_FILES["imgProductImage"]["tmp_name"], $location)){
	            }

				$insertProduct = "INSERT INTO products(
									    products_name,
									    products_sku,
									    products_urlkey,
									    products_image,
									    products_status,
									    products_description,
									    products_shortdescription,
									    products_price,
									    products_stock
									)
									VALUES(
									    '$txtProductName',
									    '$txtProductSKU',
									    '$urlkey',
									    '$fileName',
									    '$selectProductStatus',
									    '$txtProductDescription',
									    '$txtProductShortDescription',
									    '$txtProductPrice',
									    '$txtProductStock');";
				$db->exec($insertProduct);
				$lastId = $db->lastInsertId();

				if(is_array(@$txtProductParent)){
	            	foreach ($txtProductParent as $key => $value) {
	            		// echo $value."$<br>";
	            		$insertProduct = "INSERT INTO products_categories(
									    products_id,
									    categories_id
									)
									VALUES(
									    '$lastId',
									    '$value');";
						$db->exec($insertProduct);
	            	}
	            }
				return $txtProductName;
			}
			catch(PDOException $e){
				return false;
			}
		}
	}

	public static function getProductURLKey($txtCategoryName){
		try{
			$db = static::getDB();
			$txtCategoryName = strtolower((str_replace(' ', '-', $txtCategoryName)));
			return $txtCategoryName;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public static function getProductNameStudlyCase($txtCategoryName){
		return ucwords(str_replace('-', ' ', $txtCategoryName));
	}

	public static function deleteProduct($toBeDeleted){
		try{
			$db = static::getDB();
			$deleteProduct = "DELETE FROM products WHERE products_id=$toBeDeleted";
			$db->exec($deleteProduct);
		}
		catch(PDOException $e){
			return false;
		}
	}

	public static function getSpecificProduct($toBeUpdated){
		try{
            $db = static::getDB();

            $stmt = $db->query('SELECT 
            						products_id,
            						products_name, 
            						products_sku, 
            						products_urlkey,
            						products_image,
            						products_status,
            						products_description,  
            						products_shortdescription,  
            						products_price,  
            						products_stock 
            					FROM products WHERE products_id='.$toBeUpdated);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
	}

	public static function updateProduct($dataArray){
		extract($dataArray);
		
		$urlkey = Product::getProductURLKey($txtProductName);
		$txtProductName = Product::getProductNameStudlyCase($txtProductName);

		try{
			$db = static::getDB();

			$fileName = $_FILES["imgProductImage"]["name"];
			

			if($fileName != ""){
				@$location = "src/images/products/" . $_FILES["imgProductImage"]["name"];
	            if(move_uploaded_file(@$_FILES["imgProductImage"]["tmp_name"], $location)){
	            }

	            $updateProduct = "	UPDATE
									    products
									SET
									    products_name = '$txtProductName',
									    products_sku = '$txtProductSKU',
									    products_status = '$selectProductStatus',
									    products_description = '$txtProductDescription',
									    products_shortdescription = '$txtProductShortDescription',
									    products_price = '$txtProductPrice',
									    products_stock = '$txtProductStock',
									    products_image = '$fileName',
									    products_urlkey = '$urlkey'
									WHERE
									    products_id = $txtHiddenId";
			}

			else{
				$updateProduct = "	UPDATE
									    products
									SET
									    products_name = '$txtProductName',
									    products_sku = '$txtProductSKU',
									    products_status = '$selectProductStatus',
									    products_description = '$txtProductDescription',
									    products_shortdescription = '$txtProductShortDescription',
									    products_price = '$txtProductPrice',
									    products_stock = '$txtProductStock',
									    products_urlkey = '$urlkey'
									WHERE
									    products_id = $txtHiddenId";
			}
			echo $updateProduct."<br>";
			$db->exec($updateProduct);

			if(isset($txtProductParent)){
				$deleteProduct = "DELETE FROM products_categories WHERE products_id=$txtHiddenId";
				echo $deleteProduct."<br>";
				$db->exec($deleteProduct);

				foreach ($txtProductParent as $key => $value) {
	            	// echo $value."$<br>";
	            	$insertProduct = "INSERT INTO products_categories(
								    products_id,
								    categories_id
								)
								VALUES(
								    '$txtHiddenId',
								    '$value');";
					echo $insertProduct."<br>";
					$db->exec($insertProduct);
	            }
        	}
		
			return $txtProductName;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public static function getProductWithStatus($products){
	
		for($i = 0; $i < sizeof($products); $i++){
			if($products[$i]['products_status'] == 0){
				$products[$i]['products_status'] = "Not Available";
			}
			else if($products[$i]['products_status'] == 1){
						$products[$i]['products_status'] = "Available";
			}
		}
		return $products;
	}

	public static function getCategoryNames(){
		try{
            $db = static::getDB();
            $stmt = $db->query('SELECT 
            						categories_id,
            						categories_categoryname 
            						FROM categories');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0){
				return $results;
			}
			else{
				return false;
			}
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
	}
}

?>