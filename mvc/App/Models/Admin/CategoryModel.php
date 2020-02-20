<?php
// Model :: Category
namespace App\Models\Admin;
use PDO;

class CategoryModel extends \Core\Model
{
	public static function getAllCategories(){
		try{
            $db = static::getDB();
            $stmt = $db->query('SELECT 
            						categories_id,
            						categories_categoryname, 
            						categories_urlkey, 
            						categories_image,
            						categories_status,
            						categories_description,
            						categories_parentcategory  
            					FROM categories');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }	
	}

	public static function getAllParentCategories(){
		try{
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM `categories` WHERE `categories_parentcategory` is null');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }	
	}
	

	public static function addCategory($dataArray){
		extract($dataArray);
		$urlkey = CategoryModel::getCategoryURLKey($txtCategoryName);
		if(!$urlkey){
			return false;
		}
		else{
			$txtCategoryName = CategoryModel::getCategoryNameStudlyCase($txtCategoryName);

			try{
				$db = static::getDB();

				$fileName = $_FILES["imgCategoryImage"]["name"];


				@$location = "src/images/categories/" . $_FILES["imgCategoryImage"]["name"];
	            if(move_uploaded_file(@$_FILES["imgCategoryImage"]["tmp_name"], $location)){
	            	$insertCategory = "INSERT INTO categories(
										categories_categoryname,
									    categories_urlkey,
									    categories_image,
									    categories_status,
									    categories_description,
									    categories_parentcategory
									)
									VALUES(
									    '$txtCategoryName',
									    '$urlkey',
									    '$fileName',
									    '$selectCategoryStatus',
									    '$txtCategoryDescription',
									     $txtCategoryParent
									);";
	            }

	            else{
	            	$insertCategory = "INSERT INTO categories(
										categories_categoryname,
									    categories_urlkey,
									    categories_status,
									    categories_description,
									    categories_parentcategory
									)
									VALUES(
									    '$txtCategoryName',
									    '$urlkey',
									    '$selectCategoryStatus',
									    '$txtCategoryDescription',
									     $txtCategoryParent
									);";
	            }
				$db->exec($insertCategory);
				return $txtCategoryName;
			}
			catch(PDOException $e){
				return false;
			}
		}
	}

	public static function getCategoryURLKey($txtCategoryName){
		try{
			$db = static::getDB();
			$txtCategoryName = strtolower((str_replace(' ', '-', $txtCategoryName)));
			return $txtCategoryName;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public static function getCategoryNameStudlyCase($txtCategoryName){
		return ucwords(str_replace('-', ' ', $txtCategoryName));
	}

	public static function deleteCategory($toBeDeleted){
		try{
			$db = static::getDB();
			$deleteCategory = "DELETE FROM categories WHERE categories_id=$toBeDeleted";
			$db->exec($deleteCategory);
		}
		catch(PDOException $e){
			return false;
		}
	}

	public static function getSpecificCategories($toBeUpdated){
		try{
            $db = static::getDB();
            $stmt = $db->query('SELECT 
            						categories_id,
            						categories_categoryname, 
            						categories_urlkey, 
            						categories_image,
            						categories_status,
            						categories_description,
            						categories_parentcategory  
            					FROM categories WHERE categories_id='.$toBeUpdated);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
	}

	public static function updateCategory($dataArray){
		extract($dataArray);
		$urlkey = CategoryModel::getCategoryURLKey($txtCategoryName);
		$txtCategoryName = CategoryModel::getCategoryNameStudlyCase($txtCategoryName);

		try{
			$db = static::getDB();

			$fileName = $_FILES["imgCategoryImage"]["name"];
			if($txtCategoryParent == "0"){
            	$txtCategoryParent = 'NULL';
            }

			if($fileName != ""){
				@$location = "src/images/categories/" . $_FILES["imgCategoryImage"]["name"];
	            if(move_uploaded_file(@$_FILES["imgCategoryImage"]["tmp_name"], $location)){
	            }

	            $updateCategory = "	UPDATE
									    categories
									SET
									    categories_categoryname = '$txtCategoryName',
									    categories_urlkey = '$urlkey',
									    categories_status = '$selectCategoryStatus',
									    categories_description = '$txtCategoryDescription',
									    categories_parentcategory = $txtCategoryParent,
									    categories_image = '$fileName'
									WHERE
									    categories_id = $txtHiddenId";
			}

			else{
				$updateCategory = "	UPDATE
									    categories
									SET
									    categories_categoryname = '$txtCategoryName',
									    categories_urlkey = '$urlkey',
									    categories_status = '$selectCategoryStatus',
									    categories_description = '$txtCategoryDescription',
									    categories_parentcategory = $txtCategoryParent
									WHERE
									    categories_id = $txtHiddenId";
			}
			$db->exec($updateCategory);
			return $txtCategoryName;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public static function getCategoryWithStatus($categories){
	
		for($i = 0; $i < sizeof($categories); $i++){
			if($categories[$i]['categories_status'] == 0){
				$categories[$i]['categories_status'] = "Not Available";
			}
			else if($categories[$i]['categories_status'] == 1){
						$categories[$i]['categories_status'] = "Available";
			}
		}
		return $categories;
	}

	public static function getCategoryWithParentCategory($categories){
		for($i = 0; $i < sizeof($categories); $i++){
			if(isset($categories[$i]['categories_parentcategory'])){
				$categories[$i]['categories_parentcategory'] = CategoryModel::getParentCategoryName($categories[$i]['categories_parentcategory']);
			}
		}
		return $categories;
	}

	public static function getParentCategoryName($id){
		try{
			
            $db = static::getDB();
            $select = 'SELECT 
            						categories_categoryname 
            						FROM categories WHERE categories_id = '.$id;
            $stmt = $db->query($select);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return @$results[0]['categories_categoryname'];
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
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

	public static function getSelectedCategories($id){
		try{
            $db = static::getDB();
            $stmt = $db->query('SELECT 
            						categories_id 
            					FROM products_categories WHERE products_id='.$id);
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

	public static function getProductsBasedOnCategory($url_key){
		try{
            $db = static::getDB();
            $stmt = $db->query("SELECT
								    p.*
								FROM
								    products p
								LEFT JOIN products_categories pc ON
								    p.products_id = pc.products_id
								LEFT JOIN categories c ON
								    c.categories_id = pc.categories_id
								WHERE
								    c.categories_urlkey = '$url_key'
								GROUP BY
								    p.products_id");
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