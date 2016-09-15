<?php
class Pager
{
	function findStart($limit)
	{
		if((!isset($_GET['page'])) || ($_GET['page'] == "1"))
		{
			$start = 0;
			$_GET['page'] = 1;
		}
		else
		{
			$start = ($_GET['page']-1)*$limit;
		}
		return $start;
	}
	function findPages($count, $limit)
	{
		//Tính tổng số trang hiển thị với $count là tổng số mẫu tin
		$pages = (($count % $limit) == 0) ? $count/$limit : ceil($count/$limit); //ham ceil lam tron len
		return $pages;
	}
	function pageLink($curpage,$pages,$url)
	{
		//$curpage: trang hiện tại $_GET['page'], $pages: tổng số trang
		$file = path.'/'.$url;
		$page_list="<ul class='pagination'>";
			if(($curpage!=1)&&($curpage))
			{
				$page_list.="<li><a href='".$file."/page".($curpage-1)."/'><</a></li>";
			}
				
			$vtdau=max($curpage-4,1);
			$vtcuoi=min($curpage+4,$pages);
			
				for($i=$vtdau;$i<=$vtcuoi;$i++)
				{
					if($i==$curpage)
					{
						$page_list.="<li class='active'><a>".$i."</a></li>";
					}
					else
					{
						$page_list.="<li><a href ='".$file."/page".$i."/' title='Trang ".$i."'>".$i."</a></li>";
					}
				}

			if(($curpage+1)<=$pages)
			{
				$page_list.="<li><a href ='".$file."/page".($curpage+1)."/'>></a></li>";
			}
			$page_list.='</ul>';
			return $page_list;
	}
	function nextPrev($curpage,$pages) 
	{
		//Chỉ hiển thị 2 nút Next và Prev
		$next_prev='';
		if(($curpage!=1))
		{
			$next_prev.="<a href =\"".$_SERVER['PHP_SELF']."/".($curpage-1)."\">Prev</a></span>";
		}
		$next_prev.=" | ";
		if(($curpage!=$pages))
		{
			$next_prev.="<a href =\"".$_SERVER['PHP_SELF']."/".($curpage+1)."\">Next</a></span>";
		}
		return $next_prev;
	}
}
?>