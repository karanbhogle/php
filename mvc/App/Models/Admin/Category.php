<?php
// Model :: Category
namespace App\Models\Admin;
use PDO;

class Category extends \Core\Model
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

	public static function addCategory($dataArray){
		extract($dataArray);
		$urlkey = Category::getCategoryURLKey($txtCategoryName);
		$txtCategoryName = Category::getCategoryNameStudlyCase($txtCategoryName);

		try{
			$db = static::getDB();

			$fileName = $_FILES["imgCategoryImage"]["name"];

			@$location = "src/images/" . $_FILES["imgCategoryImage"]["name"];
            if(move_uploaded_file(@$_FILES["imgCategoryImage"]["tmp_name"], $location)){
            }

            if($txtCategoryParent == ""){
            	$txtCategoryParent = '0';
            }
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
								    '$txtCategoryParent'
								);";
			$db->exec($insertCategory);
			return $txtCategoryName;
		}
		catch(PDOException $e){
			return false;
		}
	}

	public static function getCategoryURLKey($txtCategoryName){
		try{
			$db = static::getDB();
			$txtCategoryName = strtolower((str_replace(' ', '-', $txtCategoryName)));
			$result = $db->query("SELECT * FROM categories WHERE categories_urlkey='$txtCategoryName'");
			if($result->rowCount() === 0){
				return $txtCategoryName;
			}
			else{
				$txtCategoryName = $txtCategoryName.rand(0,9999);
				return $txtCategoryName;
			}
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
		echo "<pre>";
		print_r($dataArray);
		echo "</pre>";
		extract($dataArray);
		$urlkey = Category::getCategoryURLKey($txtCategoryName);
		$txtCategoryName = Category::getCategoryNameStudlyCase($txtCategoryName);

		try{
			$db = static::getDB();

			$fileName = $_FILES["imgCategoryImage"]["name"];
			if($txtCategoryParent == ""){
            	$txtCategoryParent = '0';
            }

			if($fileName != ""){
				@$location = "src/images/" . $_FILES["imgCategoryImage"]["name"];
	            if(move_uploaded_file(@$_FILES["imgCategoryImage"]["tmp_name"], $location)){
	            }

	            $updateCategory = "	UPDATE
									    categories
									SET
									    categories_categoryname = '$txtCategoryName',
									    categories_urlkey = '$urlkey',
									    categories_status = '$selectCategoryStatus',
									    categories_description = '$txtCategoryDescription',
									    categories_parentcategory = '$txtCategoryParent',
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
									    categories_parentcategory = '$txtCategoryParent'
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
			foreach ($categories[$i] as $key => $value) {
				if($key === "categories_status"){
					if($categories[$i][$key] == 0){
						$categories[$i][$key] = "Not Available";
					}
					else if($categories[$i][$key] == 1){
						$categories[$i][$key] = "Available";
					}
				}
			}
		}
		return $categories;
	}
}

?>