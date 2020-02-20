<?php
// Model :: Category
namespace App\Models\Admin;
use PDO;

class Page extends \Core\Model
{
	public static function getAllPages(){
		try{
            $db = static::getDB();
            $stmt = $db->query('SELECT 
            						cms_pages_id,
            						cms_pages_pagetitle, 
            						cms_pages_urlkey, 
            						cms_pages_status,
            						cms_pages_content,
            						cms_pages_createdat,
            						cms_pages_updatedat  
            					FROM cms_pages');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }	
	}

	public static function addPage($dataArray){
		extract($dataArray);
		$urlkey = Page::getPageURLKey($txtCmsPageTitle);
		if(!$urlkey){
			return false;
		}
		else{
			$txtCmsPageTitle = Page::getPageTitleStudlyCase($txtCmsPageTitle);

			try{
				$db = static::getDB();

				$insertPage = "INSERT INTO cms_pages(
										cms_pages_pagetitle,
									    cms_pages_urlkey,
									    cms_pages_status,
									    cms_pages_content
									)
									VALUES(
									    '$txtCmsPageTitle',
									    '$urlkey',
									    '$selectCmsPageStatus',
									    '$txtCmsPageContent'
									);";
				$db->exec($insertPage);
				return $txtCmsPageTitle;
			}
			catch(PDOException $e){
				return false;
			}
		}
	}

	public static function getPageURLKey($txtCmsPageTitle){
		try{
			$db = static::getDB();
			$txtCmsPageTitle = strtolower((str_replace(' ', '-', $txtCmsPageTitle)));
			return $txtCmsPageTitle;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public static function getPageTitleStudlyCase($txtCmsPageTitle){
		return ucwords(str_replace('-', ' ', $txtCmsPageTitle));
	}

	public static function deletePage($toBeDeleted){
		try{
			$db = static::getDB();
			$deletePage = "DELETE FROM cms_pages WHERE cms_pages_id=$toBeDeleted";
			$db->exec($deletePage);
		}
		catch(PDOException $e){
			return false;
		}
	}

	public static function getSpecificPage($toBeUpdated){
		try{
            $db = static::getDB();
            $stmt = $db->query('SELECT 
            						cms_pages_id,
            						cms_pages_pagetitle, 
            						cms_pages_urlkey, 
            						cms_pages_status,
            						cms_pages_content,
            						cms_pages_createdat,
            						cms_pages_updatedat  
            					FROM cms_pages WHERE cms_pages_id='.$toBeUpdated);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
	}

	public static function getSpecificPageWithURLKey($url_key){
		try{
            $db = static::getDB();
            $stmt = $db->query("SELECT 
            						cms_pages_id,
            						cms_pages_pagetitle, 
            						cms_pages_urlkey, 
            						cms_pages_status,
            						cms_pages_content,
            						cms_pages_createdat,
            						cms_pages_updatedat  
            					FROM cms_pages WHERE cms_pages_urlkey='$url_key'");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
	}

	public static function updatePage($dataArray){
		extract($dataArray);
		$urlkey = Page::getPageURLKey($txtCmsPageTitle);
		$txtCmsPageTitle = Page::getPageTitleStudlyCase($txtCmsPageTitle);

		try{
			$db = static::getDB();

		    $updatePage = "	UPDATE
								    cms_pages
								SET
								    cms_pages_pagetitle = '$txtCmsPageTitle',
								    cms_pages_urlkey = '$urlkey',
								    cms_pages_status = '$selectCmsPageStatus',
								    cms_pages_content = '$txtCmsPageContent'
								WHERE
								    cms_pages_id = $txtHiddenId";
		
			$db->exec($updatePage);
			return $txtCmsPageTitle;
			
		}
		catch(PDOException $e){
			return false;
		}
	}

	public static function getPagesWithStatus($pages){
	
		for($i = 0; $i < sizeof($pages); $i++){
			if($pages[$i]['cms_pages_status'] == 0){
				$pages[$i]['cms_pages_status'] = "Not Available";
			}
			else if($pages[$i]['cms_pages_status'] == 1){
						$pages[$i]['cms_pages_status'] = "Available";
			}
		}
		return $pages;
	}

	
}

?>